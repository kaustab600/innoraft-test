<?php
	$college = array("collegeA","collegeB","collegeC","collegeD");

	$documents = array(array("doc_name" => "doc1","doc_type"=>"text","doc_college"=>0,"doc_sent"=>1),array("doc_name" => "doc2","doc_type"=>"word","doc_college"=>1,"doc_sent"=>1),array("doc_name" => "doc3","doc_type"=>"excel","doc_college"=>2,"doc_sent"=>0),array("doc_name" => "doc4","doc_type"=>"word","doc_college"=>3,"doc_sent"=>0),array("doc_name" => "doc5","doc_type"=>"excel","doc_college"=>3,"doc_sent"=>1),array("doc_name" => "doc6","doc_type"=>"text","doc_college"=>9999,"doc_sent"=>1));
	
	$array = array();
	
	foreach ($documents as $sentTo => $value) {
		//echo $documents[$sentTo]["doc_college"]."<br>";
		$array[$sentTo]["name"] = $documents[$sentTo]["doc_name"];
		$array[$sentTo]["type"] = $documents[$sentTo]["doc_type"];
		$collegename = $documents[$sentTo]["doc_college"];

		if($collegename == 9999){
			$array[$sentTo]["clgname"] = "null";
			
		}
		else{

		$array[$sentTo]["clgname"] = $college[$collegename];
		}

		$status = $documents[$sentTo]["doc_sent"];
		if($status == 1){

		$array[$sentTo]["status"] = "success";
		}
		else{
			$array[$sentTo]["status"] = "fail";
		}
		
	}

	print_r($array);
	
	echo "<table cellspacing='0px' cellpadding='10px' border='1px solid black'>";
	foreach($college as $name => $val){
		//echo "<tr><td>";
		//echo $val."</td>";
		$cname = $val;
		foreach($array as $docname => $value){

			if($array[$docname]['clgname'] != "null")
			{

			if($array[$docname]['clgname'] == $cname){
				echo "<tr><td>";
		        echo $val."</td>";
				echo "<td>".$array[$docname]['name']."</td>";
				echo "<td>".$array[$docname]['type']."</td>";
				echo "<td>".$array[$docname]['status']."</td>";
				echo "</tr>";
				
			}

			}
			else{
				echo "<tr>";
				echo "<td>".$val."</td>";
				echo "<td>".$array[$docname]['name']."</td>";
				echo "<td>".$array[$docname]['type']."</td>";
				echo "<td>".$array[$docname]['status']."</td>";
				echo "</tr>";
			}
			
		}
	}


?>