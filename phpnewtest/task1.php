<?php



 $marks = array( 

            "S1" => array (
               "name" => "kaustab roy",
               "class" => 12,
               "mark" => array("hindi"=>40,"english"=>50,"maths"=>60)	
         
            ),

            "S2" => array (
               "name" => "priyanshu dutta",
               "class" => 11,
               "mark" => array("hindi"=>50,"english"=>60,"maths"=>30)	
               
            ),

            "S3" => array (
               "name" => "sammer shaw",
               "class" => 10,
               "mark" => array("hindi"=>70,"english"=>50,"maths"=>40)	
               
            ),
            
            "S4" => array (
               "name" => "priyanka gupta",
               "class" => 9,
               "mark" => array("hindi"=>90,"english"=>70,"maths"=>60)	
               
            )
         );
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table cellpadding="10" cellspacing="5">
		<tr>
			<th>sid</th>
			<th>name</th>
			<th>class</th>
			<th>Total marks</th>
		</tr>
		<?php
			function date_compare($element1, $element2) { 
    $item1 = $element1['class']; 
    $item2 = $element2['class']; 
    return $item1 - $item2; 
}  
  
// Sort the array  
usort($marks, 'date_compare'); 
  
// Print the array 
//print_r($marks); 

			foreach($marks as $key => $value)
			{
				$total = 0;
				echo "";
				echo "<tr><td>SU".$key."</td><td>".$value['name']."</td><td>".$value['class']."</td>";
				foreach($value['mark'] as $key => $val)
				{
					$total = $total + $val;
					
				}

				echo "<td>".$total."</td></tr>";

		
			}


		?>
	</table>

</body>
</html>