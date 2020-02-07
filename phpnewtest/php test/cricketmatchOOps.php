<?php

class player{

	private $pname;
	function __construct( $par1 )  
    { 
        $this->pname = $par1; 
        
    } 

	public function getname(){
		return $this->pname;
	}

	function playerrun($run){
		return $run;
	}

	function currentstats($run){
		return $this->getname();
	}

}
//teamA players
$A1 = new player('virat');
$A2 = new player('sachin');


//teamB players
$B1 =new player('warner');
$B2 = new player('smith');

//teamC player
$C1 = new player('kane');
$C2 = new player('tim cook');

//teamD players
$D1 =new player('simpson');
$D2 = new player('coopper');


class team{

	public $teamname;

	

	function __construct($par1)  
    { 
        $this->teamname = $par1; 
        
    } 

	
	public function getteamname(){
		//echo "inside getname";
		return $this->teamname;
	}

	function playerslist(){

	}

	/*function playerlist($scr1,$scr2.$scr3,$scr4){
		$scores =array(

		$A1->getname()=>$A1->indvScores($scr1),
		$A2->getname()=>$A2->indvScores($scr2),
		$A3->getname()=>$A3->indvScores($scr3),
		$A2->getname()=>$A1->indvScores($scr4)
		);

		return $scores;*/
	}

	 


$teamA = new team('India');
$teamB = new team('Australia');
$teamC = new team('England');
$teamD = new team('West Indies');





class cricket{

	private $tournament = array();


	//echo $tournament['match1'][0];
	public function putdata($newarr){
		$this->tournament = $newarr;
	}


public function getarray(){

	return $this->tournament;
	
}

public function highestscorer(){
	$playersrun = array();

	foreach($this->tournament as $match => $team)
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

	foreach($this->tournament as $match => $team)
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
	}
}



public function winner(){
	$teamscorces = array();

echo "<br>Tournament winner team.<br>";

	foreach($this->tournament as $match => $team)
	{
		foreach($team as $player => $runs)
		{
			//echo $player."<br>";
			$teamscorces[$player] = 0; 
		}
	}


$maxscore = array();//...to store total score for each match

	foreach($this->tournament as $match => $team)
	{	
		$scoreofthematch=0;
		foreach($team as $player => $runs)
		{
			$total=0;

			foreach($runs as $indrun => $value)
			{
				//A=140
				$total = $total + $value;
				//echo $indrun." ".$total."<br>";
				//B=100
			}

			//echo $player." ".$total."<br>";
			$scoreofthematch = $scoreofthematch+$total;

		}
			echo $match." = ".$scoreofthematch."<br>";
			$maxscore[$match] = $scoreofthematch;

		//$maxscore[$match]=$total;

	}
print_r($maxscore);
	$highestscore = 0;

	foreach($maxscore as $match => $total)
	{
		if($total > $highestscore)
		{
			$highestscore = $total;
		}
	}

	echo $highestscore."<br>";

}

}

 //echo $tournament['match3'][$teamD->getteamname()][$D1->getname()];

$user = array(

'match1' => array($teamA->getteamname()=>array($A1->getname()=>$A1->playerrun(30),$A2->getname()=>$A2->playerrun(50)),$teamB->getteamname()=>array($B1->getname()=>$B1->playerrun(30),$B2->getname()=>$B2->playerrun(30))),
	'match2' => array($teamA->getteamname()=>array($A1->getname()=>$A1->playerrun(40),$A2->getname()=>$B1->playerrun(60)),$teamC->getteamname()=>array($C1->getname()=>$C1->playerrun(60),$C2->getname()=>$C2->playerrun(30))),
	'match3' => array($teamA->getteamname()=>array($A1->getname()=>$A1->playerrun(35),$A2->getname()=>$A2->playerrun(30)),$teamD->getteamname()=>array($D1->getname()=>$D1->playerrun(45),$D2->getname()=>$D2->playerrun(50))),
	'match4' => array($teamB->getteamname()=>array($B1->getname()=>$B1->playerrun(22),$B2->getname()=>$B2->playerrun(44)),$teamC->getteamname()=>array($C1->getname()=>$C1->playerrun(70),$C2->getname()=>$C2->playerrun(25))),
	'match5' => array($teamB->getteamname()=>array($B1->getname()=>$B1->playerrun(66),$B2->getname()=>$B2->playerrun(32)),$teamD->getteamname()=>array($D1->getname()=>$D1->playerrun(45),$D2->getname()=>$D2->playerrun(48))),
	'match6' => array($teamC->getteamname()=>array($C1->getname()=>$C1->playerrun(41),$C2->getname()=>$C2->playerrun(20)),$teamD->getteamname()=>array($D1->getname()=>$D1->playerrun(50),$D2->getname()=>$D2->playerrun(55)))


);


	$ipl = new cricket();
	$ipl->putdata($user);
	$arr = $ipl->getarray();

	//print_r($arr);

	$ipl->highestscorer();

	$ipl->winner();
	/* foreach($this->tournament as $match => $team)
	{
		foreach($team as $player => $runs)
		{
			foreach($runs as $indrun => $value)
			{
				echo $indrun."=".$value."<br>";
				
			}
		}
	}*/;
?>