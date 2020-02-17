<?php
	
	require_once('data.php');

	class products{

		public $pid;
		public $sp;
		public $sd;
		public $ct;

		function __construct($id,$sp,$sd,$ct){

			$this->pid = $id;
			$this->sp = $sp;
			$this->sd = $sd;
			$this->ct = $ct;
		}
	}

	//creating objects of products
	foreach($array as $key => $value){

		$ob[]= new products($value['pd'],$value['sp'],$value['sd'],$value['ct']);
	}

	echo "<pre>";
	//print_r($ob);
	echo "</pre>";

	
	//applying multisort to sort the ob[] w.r.t pid

	$price = [];

	foreach ($ob as $key => $row){

		$price[$key] = $row->pid;
    		
    }

    array_multisort($ob, SORT_ASC , $price);
    echo "<pre>";
    //print_r($ob);
    echo "</pre>";

    //insertionsorting() the same pids from start to end 
    function insertionSort(&$arr,$start,$end){

    	for($k=$start;$k<$end;$k++){
    		$pos = $k;
    		//echo $pos." ";
    		$min = str_replace(['/D'], '', filter_var($arr[$k]->sd, FILTER_SANITIZE_NUMBER_INT));
    		//echo filter_var($arr[$k]->sd, FILTER_VALIDATE_INT)."<br>";
    		for($l=$k+1;$l<=$end;$l++){
    			if($min > str_replace(['/D'], '', filter_var($arr[$l]->sd, FILTER_SANITIZE_NUMBER_INT))){
    				$pos = $l;
    			}
    		}
    		//swapping the positions
    		$tmp = $arr[$k];
    		$arr[$k] = $arr[$pos];
    		$arr[$pos] = $tmp;
    	}

    }

    //
    $len = count($ob);

    for($i=0 ; $i<$len-1 ;$i++){

    	$start = $i;
    	for($j=$i+1 ; $j<$len ;$j++){

    		if($ob[$j]->pid == $ob[$i]->pid){
    			$end = $j;
    		}
    		else{

   				$end = $j-1;
    			$i = $j-1;
    			break;
    		}
    	}

    	if($start < $end){
    		insertionSort($ob,$start,$end);
    	}
    }
   
    
    //$i = 0;

    //adding ob->sp of same pid's

   for($i=1;$i<=$len-1;$i++){

    	if($ob[$i-1]->pid == $ob[$i]->pid){
    		
    		$ob[$i]->sp += $ob[$i-1]->sp;
    	}
    }

    // after adding the sp the array
     echo "<pre>";
     //print_r($ob);
     echo "</pre>";

    //adding ct
    $counter=array("c1"=>0,"c2"=>0);

    $lastvisited =  array("c1"=>"","c2"=>"");

    //using this loop to add the p1 or p2 with ct
    for($i=0 ;$i<$len;$i++){

    	$currentCT = $ob[$i]->ct;
    	if($counter[$currentCT] == 0){
    		$counter[$currentCT]++;
    		$lastvisited[$currentCT] = $ob[$i]->pid;
    		$ob[$i]->ct = $ob[$i]->ct."-p".$counter[$currentCT];
    	}
    	else{

    		if( $ob[$i]->pid == $lastvisited[$currentCT]){
    			$ob[$i]->ct = $ob[$i]->ct."-p".$counter[$currentCT];
    		}
    		elseif( $ob[$i]->pid != $lastvisited[$currentCT] ){

    			$counter[$currentCT]++;
    			$lastvisited[$currentCT] = $ob[$i]->pid;
    			$ob[$i]->ct = $ob[$i]->ct."-p".$counter[$currentCT];
    		}
    	}
    }	

    echo "<pre>";
    print_r($ob);
    echo "</pre>";
?>