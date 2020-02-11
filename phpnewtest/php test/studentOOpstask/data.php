<?php

//data of students
$tmpstudent = array(array('sid'=>'std1','sname'=>'john','dateofB'=>'22-12-97','grad'=>'12'),array('sid'=>'std2','sname'=>'sally','dateofB'=>'12-10-02','grad'=>'10'),array('sid'=>'std3','sname'=>'rahul','dateofB'=>'25-06-04','grad'=>'8'),array('sid'=>'std4','sname'=>'trina','dateofB'=>'6-4-09','grad'=>'5'),array('sid'=>'std5','sname'=>'heena','dateofB'=>'16-4-98','grad'=>'12'));


//data for subjects
$tmpsubMinimumMarks = array("physics"=>array("subject code"=>"PHY12","mm"=>20),"chemistry"=>array("subject code"=>"CHEM12","mm"=>25),"biology"=>array("subject code"=>"BIO12","mm"=>30),"math"=>array("subject code"=>"M","mm"=>35),"science"=>array("subject code"=>"SC","mm"=>20),"socialscience"=>array("subject code"=>"SCS","mm"=>35),"lifescience"=>array("subject code"=>"LYS","mm"=>30),"eniviromentalscience"=>array("subject code"=>"EVS","mm"=>25),"english"=>array("subject code"=>"ENG","mm"=>30),"hindi"=>array("subject code"=>"HD","mm"=>25));


//marks obtained by student data
$tmpmarksobtained = array("std1"=>array("PHY12"=>21,"M"=>50,"CHEM12"=>42,"BIO12"=>33,"LYS"=>40),"std2"=>array("SC"=>60,"M"=>25,"SCS"=>60,"ENG"=>80),"std3"=>array("LYS"=>35,"M"=>25,"EVS"=>70,"ENG"=>65),"std4"=>array("LYS"=>"","M"=>40,"ENG"=>7,"HD"=>3,"SC"=>1),"std5"=>array("PHY12"=>22,"M"=>65,"CHEM12"=>35,"BIO12"=>73,"LYS"=>30));

//Grade data
$tmpSubjects = array("12"=>array("physics","math","chemistry","biology","lifescience"),"10"=>array("science","math","socialscience","english"),"8"=>array("lifescience","math","eniviromentalscience","english"),"5"=>array("lifescience","math","english","hindi"));

?>