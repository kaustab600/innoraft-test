<?php
 $arr = array("M","F","F","F","M","M","M","M","M","F");
 $len = count($arr);
 $flag = 0 ;

 echo $len."<br>";
 for($i=0 ;$i<$len;++$i){
 	if($arr[$i] == "F" && $flag == 0){
 		if(($arr[$i+1]) == "F"){

 		$flag =1;
 		}
 	}
 	elseif($arr[$i] == "F" && $flag == 1){
 		
 		$arr[$i] = "0";
 		echo "<br>index flag".$i."<br>";
 		$index = $i;
 		break;
 	}

 }
 echo "<br><br>";
 print_r($arr);
 echo "<br><br>";
 for($j=0 ; $j<$len ;++$j){

 	if($arr[$j]=="M"){
 		if($flag == 1)
 		{
 		if(($j-1)<0){

 		}
 		elseif($arr[$j-1]=="M" && $arr[$j+1]=="M" ){
 			 echo "flagged at".$j."<br>";
 		 	$arr[$j] = "F";
 		 	$arr[$index] = "M";
 		 	break;
 		 }
 		}
 		 
 		
 	}
 }

 print_r($arr);
 //print_r($arr);

?>