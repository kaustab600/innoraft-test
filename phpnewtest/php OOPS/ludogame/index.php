<?php

//include('ludu_data.php');

require './vendor/autoload.php';
 
$client = new GuzzleHttp\Client(['base_uri' => 'http://learning.architbohra.com/']);

$response = $client->request('GET', 'ludo_json.php');

$game = json_decode($response->getBody(),true);

function getwinner($index,$arr){

	$yogita=array("b"=>1);
    $zubin= array("g1"=>1,"g2"=>2,"g3"=>3);
	/*global $yogita;
	global $zubin;*/
	$flag =0; // winner is found
	

	$yogita_turn = 1;

	$zubin_turn = 0;

	$len = strlen($arr);

	for($i=0 ;$i<$len ;$i++){

		if( $zubin_turn ==1 ){
			//zubin turn
				//echo $i."<br>";
			
					//echo "zubin turn ".$arr[$i]."<br>";
					foreach($zubin as $k => $v){

						//echo "arr[".$i."] = ".$arr[$i]." and zubin[]".$zubin[$k]."]<br>";
						if($arr[$i] == $v){

							//echo "unseted ".$k."<br>";
							unset($zubin[$k]);
							$zubin_turn = 1;

							if(empty($zubin)){
								echo "zubin wins at ".($i+1)."<br>";
								return "zubin";
								$i = $len-1;
							}
							break;
						}
						elseif($arr[$i] < $v){
							//echo "at elseif ".$i." <br>";
							$zubin_turn = 0;
							$v = $v - $arr[$i];
							//echo "substracted at ".$k."<br>";
							break;
						}
						elseif($arr[$i] > $v && $zubin_turn==1){

							$zubin_turn = 0;
							$yogita_turn=1;
							//break;
							//$status = 1;

						}
							//echo "at else ".$i." <br>";
							//$home_zubin = 0;
							//break;
						
					}

				
				
		}
		elseif($yogita_turn == 1){
			//yogita turn
			//$status = 0;
			$yogita_turn=0;
			$zubin_turn = 1;
			//echo "yogita turn ".$i."<br>";
			if($arr[$i] == $yogita['b']){
				echo "yogita wins at".($i+1)."<br>";
				return "yogita";
				$i = $len-1;
			}
		}
		
	}
}


//getwinner(0,$game[0]);
$zubin_wins = 0;
$yogita_wins = 0;
$total =0;
foreach($game as $key => $value){
	$total++;
	echo "<br>";
	$winner = getwinner($key,$value);
	if($winner == "zubin"){
		$zubin_wins++;
	}
	else{
		$yogita_wins++;
	}
	echo "<br>";
}

$probability = ($yogita_wins/$total)*100;
echo "<br>".$probability."%";