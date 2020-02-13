<?php
	 $tmptournament = array(

	'match1' => array('A' => array('A1' => 5000, 'A2'=>30,'A3'=>40,'A4'=>20), 'B' => array('B1' => 20, 'B2'=>70,'B3'=>30,'B4'=>30)),

	'match2' => array('A' => array('A1' => 30, 'A2'=>10,'A3'=>50,'A4'=>30), 'C' => array('C1' => 10, 'C2'=>30,'C3'=>40,'C4'=>20)),

	'match3' => array('A' => array('A1' => 20, 'A2'=>20,'A3'=>50,'A4'=>30), 'D' => array('D1' => 0, 'D2'=>40,'D3'=>30,'D4'=>20)),


	'match4' => array('B' => array('B1' => 20, 'B2'=>20,'B3'=>50,'B4'=>30), 'C' => array('C1' => 40, 'C2'=>20,'C3'=>50,'C4'=>10)),

	'match5' => array('B' => array('B1' => 50, 'B2'=>40,'B3'=>10,'B4'=>10), 'D' => array('D1' => 30, 'D2'=>30,'D3'=>40,'D4'=>20)),

	'match6' => array('C' => array('C1' => 20, 'C2'=>20,'C3'=>50,'C4'=>30), 'D' => array('D1' => 40, 'D2'=>10,'D3'=>30,'D4'=>10))
	);

	





	/*$playersrun = array();

	foreach($tournament as $match => $team)
	{
		foreach($team as $player => $runs)
		{
			foreach($runs as $indrun => $value)
			{
				//echo $indrun."=".$value."<br>";
				$playersrun[$indrun]=0;
			}
		}
	}

	//print_r($playersrun);

	foreach($tournament as $match => $team)
	{
		foreach($team as $player => $runs)
		{
			foreach($runs as $indrun => $value)
			{
				
				$playersrun[$indrun]=$playersrun[$indrun]+$value;
			}
		}
	}

	echo "<br><br>";
	print_r($playersrun);
	echo "<br><br>";
	$max=0;

	foreach($playersrun as $player => $value)
	{
		if($value >= $max)
		{
			$max =$value;
		}
	}

	echo "Highest scorer player.<br>";
	foreach($playersrun as $player => $value)
	{
		if($value == $max)
		{
			echo "<br>".$player;
		}
	}*/

$teamscorces = [];

echo "<br>Tournament winner team.<br>";

	foreach($tournament as $match => $team)
	{
		foreach($team as $player => $runs)
		{
			//echo $player."<br>";
			$teamscorces[$player] = 0; 
		}
	}


$maxscore = [];//...to store total score for each match
$per_match_winner = [];
$tournamentwinner = array(

  "A"=>0,
  "B"=>0,
  "C"=>0,
  "D"=>0

);

	$i=0;
	foreach($tournament as $match => $team)
	{	
		$scoreofthematch=0;
		$matchwinner = 0;
		foreach($team as $player => $runs)
		{
			$total=0;

			foreach($runs as $indrun => $value)
			{
				//A=140
				
				$total = $total + $value;
				
				//B=100
			}
			if($matchwinner<$total)
			{

			   $matchwinner = $total;
			   $per_match_winner[$i] = $player;
        
         //echo $player."<br>";
			   
			}
			elseif ($matchwinner == $total) {
				$matchwinner =0;
			}

			//echo $player." ".$total."<br>";
			

		}
$tournamentwinner[$per_match_winner[$i]]+=1;
		//echo $matchwinner."<br>";
		$i++;
	}
//print_r($maxscore);
print_r($per_match_winner);
print_r($tournamentwinner);










?>

