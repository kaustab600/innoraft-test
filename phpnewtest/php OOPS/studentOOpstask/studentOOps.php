<?php
class students{
    public $sid;
    public $sname;
    public $dob;
    public $grade;
    //public $marksobtained = [];
    

    function __construct($arr){
        $this->sid = $arr['sid'];
        $this->sname = $arr['sname'];
        $this->dob = $arr['dateofB'];
        $this->grade = $arr['grad'];

    }
    
}

//data of students
$tmpstudent = array(array('sid'=>'std1','sname'=>'john','dateofB'=>'22-12-97','grad'=>'12'),array('sid'=>'std2','sname'=>'sally','dateofB'=>'12-10-02','grad'=>'10'),array('sid'=>'std3','sname'=>'rahul','dateofB'=>'25-06-04','grad'=>'8'),array('sid'=>'std4','sname'=>'trina','dateofB'=>'6-4-09','grad'=>'5'));

//print_r($tmpstudent);

foreach($tmpstudent as $key => $value){

$student1[] = new students($tmpstudent[$key]);

} 

echo "<pre>";
print_r($student1);
echo "</pre>";

class subject{
  public $name;
  public $subjectcode;
  public $mm;
  //private $array =[];

  function __construct($sname,$ssubjectcode,$smm){
    $this->name=$sname;
    $this->subjectcode=$ssubjectcode;
    $this->mm=$smm;
  }



}

//data for subjects
$tmpsubMinimumMarks = array("physics"=>array("subject code"=>"PHY12","mm"=>20),"chemistry"=>array("subject code"=>"CHEM12","mm"=>25),"biology"=>array("subject code"=>"BIO12","mm"=>30),"math"=>array("subject code"=>"M","mm"=>35),"science"=>array("subject code"=>"SC","mm"=>20),"socialscience"=>array("subject code"=>"SCS","mm"=>35),"lifescience"=>array("subject code"=>"LYS","mm"=>30),"eniviromentalscience"=>array("subject code"=>"EVS","mm"=>25),"english"=>array("subject code"=>"ENG","mm"=>30),"hindi"=>array("subject code"=>"HD","mm"=>25));

foreach($tmpsubMinimumMarks as $key => $value){
   
   $subMinimumMarks1[$key] = new subject($key,$value['subject code'],$value['mm']);
   
}

echo "<pre>";
print_r($subMinimumMarks1);
echo "</pre>";


class marks{

  public $sid;
  public $submarks =[];
  function __construct($studid,$arr){
    $this->sid=$studid;
    $this->submarks=$arr;
  }
}


//marks obtained by student data
$tmpmarksobtained = array("std1"=>array("PHY12"=>21,"M"=>50,"CHEM12"=>42,"BIO12"=>33),"std2"=>array("SC"=>60,"M"=>25,"SCS"=>60,"ENG"=>80),"std3"=>array("LYS"=>35,"M"=>25,"EVS"=>70,"ENG"=>65),"std4"=>array("LYS"=>40,"M"=>80,"ENG"=>67,"HD"=>34));

foreach($tmpmarksobtained as $key => $value){
  
   $marksobtained1[$key] = new marks($key,$tmpmarksobtained[$key]);
   
}

echo "<pre>";
print_r($marksobtained1);
echo "</pre>";


class grade{
  public $grad;
  public $scores = [];

  function __construct($Grade,$arr){
      $this->grad=$Grade;
      $this->scores=$arr; 
  }
}
//subject data
$tmpSubjects = array("12"=>array("physics","math","chemistry","biology"),"10"=>array("science","math","socialscience","english"),"8"=>array("lifescience","math","eniviromentalscience","english"),"5"=>array("lifescience","math","english","hindi"));

foreach($tmpSubjects as $key => $value){
  $Subjects1[$key] = new grade($key,$tmpSubjects[$key]);
}

echo "<pre>";
//print_r($Subjects1);
echo "</pre>";

class operations{
  public $student =[];
  public $Subjects =[];
  public $marksobtained =[];
  public $subMinimumMarks =[];

  function __construct($arr1,$arr2,$arr3,$arr4){
    $this->student = $arr1;
    $this->Subjects = $arr2;
    $this->marksobtained = $arr3;
    $this->subMinimumMarks = $arr4;
    
  }

  function getarray(){
    print_r($this->subMinimumMarks);
  }

  //------------------functions for operation------------------------------------------------//

  //function to return subject code , subject minimum marks
function subjectdetails($grad){
  //$grade = $grad;

  echo "<table cellspacing='0px' border ='1px solid black'>";
  echo"<tr><th>Subject</th><th>Subject code</th><th>Minimmum Marks</th></tr>";
  foreach($this->Subjects as $key => $value){
      if($key == $grad){
        foreach($value as $k => $v){
            if($k == 'scores'){
              foreach($v as $k1 => $v1){
                echo "<tr><td>".$v1."</td>";
                  foreach($this->subMinimumMarks as $k2 => $v2){
                    if($k2 == $v1){
                      echo "<td>".$v2->subjectcode."</td>";
                      echo "<td>".$v2->mm."</td></tr>";
                      
                    }
                }
              }
            }
          }
      }
  }
  echo "</table>";
}

//---function to take student id & return subject code and marks 
function obtainedmarks($studid){

  
  foreach($this->student as $studdetail => $val){
    foreach($val as $key => $value){
      //echo $key."<br>";
      if($key =="sid"){
       if($val->sid==$studid ){
          
          echo "<table cellspacing='0px' cellpadding='10px' border='1px solid black'>";
          foreach($this->marksobtained[$studid] as $k => $v){
            if($k == 'submarks'){
              foreach($v as $k1 => $v1){
                echo "<tr><td>".$k1."</td>";
                echo "<td>".$v1."</td></tr>";
              }

            }
              
            }
            //echo "<td>".$v."</td></tr>";
          }
          echo "</table>";
       }

      }
     
    }
  }


//---------function to take student id and return passed or failed-------------------------------//

  function result($stdid){
  
$counter = 0;
$num_of_subjects =0;
foreach($this->marksobtained[$stdid] as $key => $value){// $key is subject code
  //echo $key."<br>";
  if($key == 'submarks')
  {
    foreach($value as $j1 => $e1){
    $num_of_subjects++;
    //echo $j1."<br>";
    $tempMarks = $e1;//marks obtained for each subject

    foreach($this->subMinimumMarks as $k => $v){
      //echo $k."<br>";
    foreach($v as $k1 => $v1){
      //echo $k1."<br>";
      if($k1 == "subjectcode"){
        if($v1 == $j1){
           $min = $this->subMinimumMarks[$k]->mm;
           //echo $min."<br>";
           if($tempMarks>=$min){
            $counter++;

           }
        }
      }
    }
    //break;
  }
  
    }
  }
   
  
}

//checking if the student has passed 40% of his subjects
$percentage = $num_of_subjects*0.4;
if($counter >=intval($percentage)){
  return "passed";
}
else{
  return "failed";
}

}

//--------------function to print student data in tabular format------------------------------//

function display(){

echo "<table cellspacing='0px' cellpadding='10px' border='1px solid black' >";
echo "<tr><th>name</th><th>DoB</th><th>Grade</th><th>Subjects</th><th>Results</th></tr>";
//to display the student details in tabular form 
foreach($this->student as $key => $value){
  echo "<td>".$value->sname."</td>";
  echo "<td>".$value->dob."</td>";
  echo "<td>".$value->grade."</td>";
  
  foreach($this->marksobtained[$value->sid] as $k => $v){
          if($k =="submarks"){
              echo "<td>";
              foreach($v as $k1=>$v1)
              {
                echo $k1."(".$v1;
                foreach($this->subMinimumMarks as $k2 => $v2 )
                {
                  if($v2->subjectcode == $k1)
                  {
                    foreach($v2 as $k3 =>$v3)
                    {
                      if($k3 == 'mm'){

                      echo ",".$v3.")<br>";
                      }
                    }
                  }
                }

              }
              echo "</td>";
          }
      }
  echo "<td>".$this->result($value->sid)."</td></tr>";
    }
  


  


echo "</table>";

}





}


  


$obj12 = new operations($student1,$Subjects1,$marksobtained1,$subMinimumMarks1);


//$obj12->subjectdetails("10");

//$obj12->obtainedmarks("std1");

//echo $obj12->result('std1');

$obj12->display();


?>