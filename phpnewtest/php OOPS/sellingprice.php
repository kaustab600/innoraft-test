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

	foreach($array as $key => $value){

		$ob[]= new products($value['pd'],$value['sp'],$value['sd'],$value['ct']);
	}

	echo "<pre>";
	//print_r($ob);
	echo "</pre>";

	//asort($ob)

	$price = [];

	foreach ($ob as $key => $row){

		$price[$key] = $row->pid;
    		
    }

	//$price = array_column($ob, 'pd');
	//print_r($price);

    array_multisort($ob, SORT_ASC , $price);
    echo "<pre>";
    //print_r($ob);
    echo "</pre>";

    $flag=0;
    $pid_diff = 0;
    function addproductid(&$arr,$index){
    	//return str_replace(['pd'], 'p', filter_var($arr[$index]->pid, FILTER_SANITIZE_STRING));
    	global $flag;
    	global $pid_diff;
    	echo $index."<br>";
    	//if pid and ct are both same then put current ct = p1

    	if( ($arr[$index]->pid == $arr[$index+1]->pid) && ($arr[$index]->ct == $arr[$index+1]->ct) ){
    		$arr[$index]->ct = $arr[$index]->ct."-p1";
    		$flag =1;
    	}

    	elseif($flag == 1){
    		
    		if( ($arr[$index]->pid != $arr[$index+1]->pid) && ($arr[$index]->ct == $arr[$index+1]->ct)){
    			$pid_diff = 1;
    		}

    		$arr[$index]->ct = $arr[$index]->ct."-p1";
    		$flag =0;
    	}
    	elseif($pid_diff == 1){
    		$arr[$index]->ct = $arr[$index]->ct."-p2";
    	}
    	//if pid are different  ct are same the put current ct = p2
    	elseif( ($arr[$index]->pid != $arr[$index+1]->pid) && ($arr[$index]->ct == $arr[$index+1]->ct) ){
    		//$arr[$index]->ct = $arr[$index]->ct."-p2";
    		$pid_diff = 1;
    	}
    	
    	//if pid and ct are both different
    	elseif( ($arr[$index]->pid != $arr[$index+1]->pid) && ($arr[$index]->ct != $arr[$index+1]->ct) ){
    		//$arr[$index]->ct = $arr[$index]->ct."-p2";
    	}

    }

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

    	//echo "start =".$start." , end =".$end."<br><br>";
    	if($start < $end){
    		insertionSort($ob,$start,$end);
    	}
    }
    echo "<pre>";
   // print_r($ob);
    echo "</pre>";
    
    $i = 0;
   for($i=1;$i<=$len-1;$i++){

    	if($ob[$i-1]->pid == $ob[$i]->pid){
    		
    		$ob[$i]->sp += $ob[$i-1]->sp;
    	}
    }

    

    for($i=0 ;$i<$len-1;$i++){

    	 addproductid($ob,$i);

    }	

    echo "<pre>";
    print_r($ob);
    echo "</pre>";
?>