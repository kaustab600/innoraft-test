<?php
require_once('data.php');
require './vendor/autoload.php';
use studentclasses\students;
use studentclasses\marks;
use studentclasses\grade;
use studentclasses\subject;


//creating objects for student class
foreach($tmpstudent as $key => $value){
$student1[] = new students($tmpstudent[$key]);
} 

//creating objects for subject details
foreach($tmpsubMinimumMarks as $key => $value){
   $subMinimumMarks1[$key] = new subject($key,$value['subject code'],$value['mm']);   
}

//creating objects for obtainedmarks class
foreach($tmpmarksobtained as $key => $value){
  $marksobtained1[$key] = new marks($key,$tmpmarksobtained[$key]);   
}

//creating objects for grade class
foreach($tmpSubjects as $key => $value){
  $Subjects1[$key] = new grade($key,$tmpSubjects[$key]);
}

class operations{
  private $student =[];
  private $Subjects =[];
  private $marksobtained =[];
  private $subMinimumMarks =[];

  function __construct($arr1,$arr2,$arr3,$arr4){
    $this->student = $arr1;
    $this->Subjects = $arr2;
    $this->marksobtained = $arr3;
    $this->subMinimumMarks = $arr4;
  }


  //------------------functions for operation------------------------------------------------//

  //function to return subject code , subject minimum marks
function subjectdetails($grad){
  

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

 //function to take student id & return subject code and marks 
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


 //Takes student id as argument and returns whether he has passes in 40% of his subjects 
 function result($stdid){
  
    $counter = 0;
    $num_of_subjects =0;

    foreach($this->marksobtained[$stdid] as $key => $value){
      //echo $key."<br>";
      if($key == 'submarks'){

      foreach($value as $j1 => $e1){

        $num_of_subjects++;
        //echo $j1."<br>";
        if($e1 == ""){
          $tempMarks = 0;
        }
        else{
          //marks obtained for each subject
          $tempMarks = $e1;
        }
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

 //function to print student data in tabular format

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
              foreach($v as $k1=>$v1){

                if($v1 == ""){
                  echo $k1." (Not Appeared"; 
                }
                else{
                  echo $k1." (".$v1;  
                }
                foreach($this->subMinimumMarks as $k2 => $v2 ){

                  if($v2->subjectcode == $k1){

                    foreach($v2 as $k3 =>$v3){

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
}//class operation ending

//creating objects for operations class

$user1 = new operations($student1,$Subjects1,$marksobtained1,$subMinimumMarks1);

//calling functions 

//$user1->subjectdetails("10");

//$user1->obtainedmarks("std5");

//echo $user1->result('std1');

$user1->display();

?>
