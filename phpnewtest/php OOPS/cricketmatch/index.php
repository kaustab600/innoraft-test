<?php
include('data.php');
require './vendor/autoload.php';
use cricketdetails\players;
use cricketdetails\team;
use cricketdetails\matches;

//----------------------------PLAYER OBJECTS------------------------------------

//creating player objects with player name and permatch scores

foreach($tmptournament as $match => $value){

    foreach($value as $team =>$v1){

        foreach($v1 as $k => $v2){

          $runlist[$k][] = new players($match,$v2,$team);
        }
    }
}

echo "<pre>";
//print_r($runlist);
echo "</pre>";



//----------TEAM OBJECTS---------------------------------------------------

//function to get players list from data

function setlistplayers($arr){
        $tmparray =[];
        foreach($arr as $k => $v)
        {
            $tmparray[] = $k;
        }
        return $tmparray;
    }
    //----creating team objects with the players list----------------//
foreach($tmptournament as $match => $value){

    foreach($value as $team =>$v1){

        $array1 = setlistplayers($v1);
        
        $teamlist[$team] = new team($array1);    
    }
}

echo "<pre>";
//print_r($teamlist);
echo "</pre>";
//-----------------------------------------end----------------------------------------------------------//


//----------------------------------MATCH OBJECTS------------------------------------------------------//
//-----------creating match objects with team and players list-------------//

foreach($tmptournament as $match => $value){

    $tournament[] =  new matches($value);
}

echo "<pre>";
//print_r($tournament);
echo "</pre>";

//---------------------------------end-----------------------------------------------//


// This class is used for calling functions based on the question
class operations{
   
  public function highestscorer($tournament){
   $playersrun = [];

   //initializing each players with zero scores in playersrun[]

  foreach($tournament as $match => $team){

    foreach($team as $teamstat => $value){

      foreach($value as $team => $v1){

       foreach($v1 as $indrun => $val){
         //echo $indrun."=".$val."<br>";
         $playersrun[$indrun]=0;
        }
      }
    }
  }

  //print_r($playersrun);

  //adding scores of each players done in each match
  foreach($tournament as $match => $team){

    foreach($team as $teamstat => $value){

      foreach($value as $team => $v1){

       foreach($v1 as $indrun => $val){
        
         $playersrun[$indrun]= $playersrun[$indrun]+ $val;
        }
      }
    }
  }

  echo "<br><br>";
  //print_r($playersrun);
  echo "<br><br>";

 // -------------searching for highest scorer in playersrun array-
  $max=0;
  foreach($playersrun as $player => $value){

    if($value >= $max){
      $max =$value;
      $player_with_highestScr = $player;
    }
  }
  
  echo "<h2>Highest scorer player</h2><br>";
  echo $player_with_highestScr." with runs = ".$max."<br>";

}//function highestscorer ending


function tournamentWinner($tournament){
  $teamscorces = [];

  echo "<br>Tournament winner team.<br>";

  //creating a array tournamentwinner[] with each team having zero scores initially 
 
  // it stores winners of each match 
  $per_match_winner = [];

   // this array stores the number of wins by each team
  $tournamentwinner = [];

  foreach($tournament as $match => $team){

    //$teamstat is [teamstat] object
    foreach($team as $teamstat => $value){

      foreach($value as $team => $v1){  

          $tournamentwinner[$team] = 0;

      }
    }
  }

  // * looping through each match player runs and adding them in total if the total is exceed by opponent team then total is changed and after each loop incresing the team score in tournamentwinner[] 

  $i=0;
  foreach($tournament as $match => $team){ 
     $scoreofthematch=0;
     $matchwinner = 0;
    foreach($team as $teamstat => $value){

      foreach($value as $team => $v1){
        $total=0;
        
    foreach($v1 as $player => $runs){
        //A=140
        $total = $total + $runs;
        //B=100
      }

      if($matchwinner<$total){

         $matchwinner = $total;
         $per_match_winner[$i] = $team;
         //echo $player."<br>";
         
      }

      elseif ($matchwinner == $total) {
        $matchwinner =0;
      }
      
      }

      $tournamentwinner[$per_match_winner[$i]]+=1;
    }

    $i++;
    
  }
      echo "<h2>Tournament Winner</h2>";
      $maximumwins = max($tournamentwinner);

      foreach($tournamentwinner as $k => $v){
        //echo $v."<br>";
        if($v == $maximumwins){
          echo " = ".$k;
          break;
        }
      }

}//function tournamentWinner()


 function highestRun($tournament){
   $j=0;
   $maxscore =[];
   $max=0;
   foreach($tournament as $match => $team){ 

    foreach($team as $teamstat => $value){

      foreach($value as $team => $v1){
        $total=0;
        
        foreach($v1 as $player => $runs){

              //A=140 or B=20
            $total = $total + $runs; 
            // to store the runs made by each team per match 
            $maxscore[$j][$team] = $total;
          
            if($max<$total){

              $max = $total;
              $highest_runTeam = $team; 
            }
          }
      
        }
      }
    
      $j++;
    }

    echo "<pre>";
    //print_r($maxscore);
    echo "</pre>";
     echo $highest_runTeam." = runs(".$max.")<br>";
     
  }//ending of highestRun(). 
}//ending of class operation 

//--------------------Creating objects for operations  to perform functions-------------------------

$obj1 = new operations;
$obj1->highestscorer($tournament); //---------------call this function to get highest tournament scorer

//$obj1->tournamentWinner($tournament); //--------------call this function to get Tournament Winner

//$obj1->highestRun($tournament); //-------------call this this function to get Highest Run in Tournament


?>