<?php
include('data.php');

class players
{
	public $team;
	public $permatchRuns=[];

	function __construct($teamname){
		//$this->pname = $name;
		$this->team = $teamname;
	}
}

foreach($tmptournament as $match => $value)
{
	foreach($value as $team =>$v1)
	{
	    foreach($v1 as $k => $v2)
	    {
	    	$runlist[$k] = new players($team);
	    }
	}
}

echo "<pre>";
//print_r($runlist);
echo "</pre>";

class team{
	//public $teamname;
	public $listofplayers = [];

	function __construct($arr)
	{
		//$this->teamname = $name;
		$this->listofplayers = $arr;
	}

}

function setlistplayers($arr)
	{
		$tmparray =[];
		foreach($arr as $k => $v)
		{
			$tmparray[] = $k;
		}
		return $tmparray;
	}

foreach($tmptournament as $match => $value)
{
	foreach($value as $team =>$v1)
	{
	    $array1 = setlistplayers($v1);
	    
		    $teamlist[$team] = new team($array1);
	    	
	  
	}
}

echo "<pre>";
//print_r($teamlist);
echo "</pre>";

class matches
{
	//public $matchid;
	public $teamstats=[];

	function __construct($arr)
	{
		$this->teamstats = $arr;
	}
}

foreach($tmptournament as $match => $value)
{
	$tournament[] =  new matches($value);
}

echo "<pre>";
print_r($tournament);
echo "</pre>";

?>