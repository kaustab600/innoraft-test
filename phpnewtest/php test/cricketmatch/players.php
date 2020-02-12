<?php
include('data.php');

class players
{
    public $matchid;
    public $runs;
    public $team;
    //public $permatchRuns=[];

    function __construct($mid,$run,$team){
        //$this->pname = $name;
        $this->matchid = $mid;
        $this->runs = $run;
        $this->team = $team;
    }
}

//creating player objects with player name and permatch scores
foreach($tmptournament as $match => $value)
{
    foreach($value as $team =>$v1)
    {
        foreach($v1 as $k => $v2)
        {
            //echo $v2." ";
          //echo $match."<br>";
          //function getscore($k);
          $runlist[$k][] = new players($match,$v2,$team);
        }
        //echo "<br><br>";
    }
}

echo "<pre>";
print_r($runlist);
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

class operations
{
   public function highestscorer($tournament){
  $playersrun = [];

  foreach($tournament as $match => $team)
  {

    foreach($team as $teamstat => $value)//$teamstat is [teamstat]
    {
      foreach($value as $team => $v1)
      {
       foreach($v1 as $indrun => $val)
       {
        //echo $indrun."=".$val."<br>";
         $playersrun[$indrun]=0;
       }
      }
    }
  }

  //print_r($playersrun);

  foreach($tournament as $match => $team)
  {
    foreach($team as $teamstat => $value)//$teamstat is [teamstat]
    {
      foreach($value as $team => $v1)
      {
       foreach($v1 as $indrun => $val)
       {
        
         $playersrun[$indrun]= $playersrun[$indrun]+ $val;
        }
      }
    }
  }

  echo "<br><br>";
  //print_r($playersrun);
  echo "<br><br>";
  $max=0;

  foreach($playersrun as $player => $value)
  {
    if($value >= $max)
    {
      $max =$value;
    }
  }

  echo "<h2>Highest scorer player</h2>";
  foreach($playersrun as $player => $value)
  {
    if($value == $max)
    {
      echo $player;
    }
  }
}//function highestscorer ending


function tournamentWinner($tournament)
{
  $teamscorces = [];

echo "<br>Tournament winner team.<br>";

  foreach($tournament as $match => $team)
  {
    foreach($team as $teamstat => $value)//$teamstat is [teamstat]
    {
      foreach($value as $team => $v1)
      {
       foreach($v1 as $indrun => $val)
       {
          //echo $player."<br>";
          $teamscorces[$indrun] = 0; 
        }
      }
    }
  }
  print_r($teamscorces);

/*
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
*/
}//function tournamentWinner()
 
}//class operation ending

$obj1 = new operations;
$obj1->highestscorer($tournament);
$obj1->tournamentWinner($tournament);

?>