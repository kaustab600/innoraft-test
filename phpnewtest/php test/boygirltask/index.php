<?php
include('data.php');
include('students.php');

//creating array of objects of the students
foreach($tmpstudents as $key => $value)
{
    $student[]= new students($value['name'],$value['gender']);
}   

echo "<pre>";
//print_r($student);
echo "</pre>";

 class arrangement{
    private $arr = [];

    public function sortfemales($a){
        $this->arr = $a;

        $len = count($this->arr);//
        //echo $len."<br>";
        
        $flag = 0 ;// to indicate there is a second female.
        $status = 0; // To indicate wheather any zeros are placed or not.

        
 //loop for selecting the second female and putting Zero at the place
 foreach($this->arr as $student => $details){
    foreach($details as $key => $value)
    {
      //echo $value['gender'];
      
      if(($student+1)<=($len-1))
      {


      if($value['gender'] == "F" && $flag == 0){

        if($this->arr[$student+1]->details['gender'] == "F"){
          
         $flag =1;
        }
      }
      elseif($value['gender'] == "F" && $flag == 1){
        
        $this->arr[$student]->details['gender'] = "0";
        //echo "flaged at".$student."<br>";
        $flag = 0;
        $status =1;
        $index = $student;  // index stores the current position of the second female
        break;
      }
     }
    }
   
 }

 
 echo "<h1>Array initially</h1><br><br>";
 echo "<pre>";
 print_r($this->arr);
 echo "</pre>";

 //looping through the array to find a place where three males are present simultanuosly
$done =0;// when swapping is done set done true
 foreach($this->arr as $student => $detail){
    foreach($detail as $key => $value)
    {
      if($value['gender']=="M"){
        if($status == 1)
        {
          if(($student-1)<0){

          }
          elseif($student+1 >($len-1))
          {

          }
          elseif($this->arr[$student-1]->details['gender']=="M" && $this->arr[$student+1]->details['gender']=="M" && $done == 0){
            // echo "flagged at".$student."<br>";
             //gender swapping
            $this->arr[$student]->details['gender'] = "F";
            $this->arr[$index]->details['gender'] = "M";

            //name swapping
            $temp = $this->arr[$student]->details['name'];
            $this->arr[$student]->details['name'] =$this->arr[$index]->details['name'];
            $this->arr[$index]->details['name'] = $temp;
            $done = 1;
            break;
          }
        }    
     }
   }  
  }       echo "<br><br><h1>After sorting</h1><br><br>";
          echo "<pre>";
          print_r($this->arr);
          echo "</pre>";
  }// ending of function sortfemales()
}//ending of class arrangement


$obj1 = new arrangement;
$obj1->sortfemales($student);

?>

