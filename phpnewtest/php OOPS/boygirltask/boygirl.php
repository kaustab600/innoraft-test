<?php

class arrangement{
	private $arr = array();

	public function sortfemales($a){
		$this->arr = $a;

		$len = count($this->arr);
 		$flag = 0 ;

 		//echo $len."<br>";

 foreach($this->arr as $student => $details){
 	if($this->arr[$student]['gender'] == "F" && $flag == 0){
 	   //echo $student."<br>";
 		if(($this->arr[$student+1]['gender']) == "F"){

 		 $flag =1;
 		}
 	}
 	elseif($this->arr[$student]['gender'] == "F" && $flag == 1){
 		
 		$this->arr[$student]['gender'] = "0";
 		//echo "<br>index flag".$i."<br>";
 		$index = $student;
 		break;
 	}
 }


 foreach($this->arr as $student => $details){

 	if($this->arr[$student]['gender']=="M"){
 		if($flag == 1)
 		{
 		if(($student-1)<0){

 		}
 		elseif($this->arr[$student-1]['gender']=="M" && $this->arr[$student+1]['gender']=="M" ){
 			// echo "flagged at".$student."<br>";
 			 //gender swapping
 		 	$this->arr[$student]['gender'] = "F";
 		 	$this->arr[$index]['gender'] = "M";

 		 	//name swapping
 		 	$temp = $this->arr[$student]['name'];
 		 	$this->arr[$student]['name'] =$this->arr[$index]['name'];
 		 	$this->arr[$index]['name'] = $temp;
 		 	break;
 		 }
 		}
 		 
 		
 	}
 }
 		echo "<pre>";
 		print_r($this->arr);
 		echo "<pre>";
	}
}

class students{

	private $details= array();

	function __construct($name,$gender){
		$this->details['name'] = $name;
		$this->details['gender']= $gender;
	}

	function getdetails(){
		return $this->details;
	}


}

$stud1 = new students('kaustab','F');
$stud2 = new students('sonia','F');
$stud3 = new students('mary','F');
$stud4 = new students('ankita','M');
$stud5 = new students('justin','M');
$stud6 = new students('rahul','M');
$stud7 = new students('saikat','M');
$stud8 = new students('akash','M');
$stud9 = new students('rituporno','M');
$stud10 = new students('tanal','M');



$array = array($stud1->getdetails(),$stud2->getdetails(),$stud3->getdetails(),$stud4->getdetails(),$stud5->getdetails(),$stud6->getdetails(),$stud7->getdetails(),$stud8->getdetails(),$stud9->getdetails(),$stud10->getdetails());

$obj1 = new arrangement;
$obj1->sortfemales($array);

?>