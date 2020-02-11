<?php
$student = array(array("id"=>"std1","name"=>"John","dob"=>"22-12-97","grade"=>"12"),array("id"=>"std2","name"=>"sally","dob"=>"12-10-02","grade"=>"10"),array("id"=>"std3","name"=>"rahul","dob"=>"25-06-04","grade"=>"8"),array("id"=>"std4","name"=>"trina","dob"=>"6-4-09","grade"=>"5"));

$Subjects = array("12"=>array("physics","math","chemistry","biology"),"10"=>array("science","math","socialscience","english"),"8"=>array("lifescience","math","eniviromentalscience","english"),"5"=>array("lifescience","math","english","hindi"));

$subMinimumMarks = array("physics"=>array("subject code"=>"PHY12","mm"=>20),"chemistry"=>array("subject code"=>"CHEM12","mm"=>25),"biology"=>array("subject code"=>"BIO12","mm"=>30),"math"=>array("subject code"=>"M","mm"=>35),"science"=>array("subject code"=>"SC","mm"=>20),"socialscience"=>array("subject code"=>"SCS","mm"=>35),"lifescience"=>array("subject code"=>"LYS","mm"=>30),"eniviromentalscience"=>array("subject code"=>"EVS","mm"=>25),"english"=>array("subject code"=>"ENG","mm"=>30),"hindi"=>array("subject code"=>"HD","mm"=>25));

$marksobtained = array("std1"=>array("PHY12"=>26,"M"=>50,"CHEM12"=>42,"BIO12"=>33),"std2"=>array("SC"=>60,"M"=>25,"SCS"=>60,"ENG"=>80),"std3"=>array("LYS"=>35,"M"=>25,"EVS"=>70,"ENG"=>65),"std4"=>array("LYS"=>40,"M"=>80,"ENG"=>67,"HD"=>34));


//function to return subject code , subject minimum marks
function subjectdetails($grad){
  global $student;
  global $Subjects;
  global $subMinimumMarks;
  $grade = $grad;

  echo "<table cellspacing='0px' border ='1px solid black'>";
  echo"<tr><th>Subject</th><th>Subject code</th><th>Minimmum Marks</th></tr>";
  foreach($Subjects[$grade] as $key => $value){
    echo "<tr><td>".$value."</td>";
    echo "<td>".$subMinimumMarks[$value]['subject code']."</td>";
    echo "<td>".$subMinimumMarks[$value]['mm']."</td><tr>";
  }
  echo "</table>";
}
//calling function 
//subjectdetails("12");

function obtainedmarks($studid){
  global $student;
  global $Subjects;
  global $subMinimumMarks;
  global $marksobtained;
  $studentid = $studid;
  foreach($student as $studdetail => $val){
    foreach($val as $key => $value){
      if($key =="id"){
       if($val[$key]==$studid ){
          echo $studid."<br><br>";
          echo "<table cellspacing='0px' cellpadding='10px' border='1px solid black'>";
          foreach($marksobtained[$studid] as $k => $v){
            echo "<tr><td>".$k."</td>";
            echo "<td>".$v."</td></tr>";
          }
          echo "</table>";
       }

      }
     
    }
  }
}

//obtainedmarks("std1");

function result($subCode){
  global $student;
  global $Subjects;
  global $subMinimumMarks;
  global $marksobtained;

  $counter = 0;
$num_of_subjects =0;
foreach($marksobtained[$subCode] as $key => $value){// $key is subject code
   $num_of_subjects++;
   $tempMarks = $value;//marks obtained for each subject
  foreach($subMinimumMarks as $k => $v){
    foreach($subMinimumMarks[$k] as $k1 => $v1){
      if($k1 == "subject code"){
        if($v1 == $key){
           $min = $subMinimumMarks[$k]['mm'];
           if($tempMarks>=$min){
            $counter++;
           }
        }
      }
    }
    break;
  }
}

//echo $counter;

$percentage = $num_of_subjects*0.4;
if($counter >=intval($percentage)){
  return "passed";
}
else{
  return "failed";
}

}






echo "<table cellspacing='0px' cellpadding='10px' border='1px solid black' >";
echo "<tr><th>name</th><th>DoB</th><th>Grade</th><th>Subjects</th><th>Results</th></tr>";
//to display the student details in tabular form 
foreach($marksobtained as $stud => $value){
  if($stud == "std1"){
    foreach($student as $k => $v)
    {
      foreach($student[$k] as $k1 => $v1 ){
        if($k1 =="id"){
          if($v1 == "std1"){
                  echo "<tr><td>".$student[$k]['name']."</td>";
                  echo "<td>".$student[$k]['dob']."</td>";
                  echo "<td>".$student[$k]['grade']."</td>";
                  echo "<td>";
                  foreach($marksobtained['std1'] as $k2 => $v2){
                    echo $k2."(".$v2.",".getmm('std1',$k2).")<br>";
                  }
                  echo "</td>";
                  echo "<td>".result($v1)."</td></tr>";
              } 
          }
      }
    }
  }
}

echo "</table>";

function getmm($stdid ,$subcode){
  global $student;
  global $Subjects;
  global $subMinimumMarks;
  global $marksobtained;

 foreach($subMinimumMarks as $key => $value){// $key is subject code
   //marks obtained for each subject
  foreach($subMinimumMarks[$key] as $k => $v){
    if($k == "subject code"){
      if($v == $subcode){
        return $subMinimumMarks[$key]['mm'];
      }
    }
  }
  
}

}



?>