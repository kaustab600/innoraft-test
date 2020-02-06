<?php

class team{

	private $teamname;
	function setteamname($name){
		$this->teamname = $name;
		return $this->teamname;
	}

	/*function playerlist(){
		
	}*/
	 
}

$teamA = new team;
$teamB = new team;
$teamC = new team;
$teamD = new team;





/*class players{
	$playername;
	$indscore ;
	function setplayername($plname,$score){
		$playername = $plname;
		$indscore = $score;
	}


}

*/

class worldcup{

	public $tournament = array(

	/*'match1' => array($teamA->setteamname('teamA'),$teamB->setteamname('teamB')),
	'match2' => array($teamA->setteamname('teamA'),$teamC->setteamname('teamC')),
	'match3' => array($teamA->setteamname('teamA'),$teamD->setteamname('teamD')),
	'match4' => array($teamB->setteamname('teamB'),$teamC->setteamname('teamC')),
	'match5' => array($teamB->setteamname('teamB'),$teamD->setteamname('teamD')),
	'match6' => array($teamC->setteamname('teamC'),$teamD->setteamname('teamD')) */
																				
	);

	function fetcharray(){
		return $this->$tournament;
	} 

}

$ipl = new worldcup;

print_r($ipl->fetcharray);


?>