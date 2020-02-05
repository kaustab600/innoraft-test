<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
	</style>
	<script >
         function myFunction() {
              document.forms["frm1"].submit();
           }
      </script>
</head>
<body>
	<form name="frm1"  id="frm1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" >
		<h1>Rock paper scissor</h1>
		<h4>choose an option to play</h4>
		<input type="radio" name="user" id="user" value="rock" onclick="myFunction()"> rock<br>
		<input type="radio" name="user" id="user" value="paper" onclick="myFunction()"> paper<br>
		<input type="radio" name="user" id="user" value="scissor" onclick="myFunction()"> scissor<br>
		<!--<select name="user">
			<option value="rock">rock</option>
			<option value="paper">paper</option>
			<option value="scissor">scissor</option>
			
		</select>-->

		<!--<input type="submit" name="submit" value="choose">-->
		
	</form>
</body>
</html>

<?php
	if(isset($_POST['user']))
	{	
		$userpoints = 0;
		$comppoints = 0;
		$choosen = $_POST['user'];
		echo "USER INPUT ".$choosen."<br>";

		$arr = array("rock"=>"paper","paper"=>"scissor","scissor"=>"rock");
		$comp = array_rand($arr);
		echo "COMP INPUT ".$comp."<br>";
		if($choosen == $comp)
		{	

			echo "no points<br>";
		}
		else
		{
			if($arr[$comp] == $choosen)
			{	
				$userpoints++;
				$comppoints--;
				//echo "+1 points";
			}
			else
			{	
				$userpoints--;
				$comppoints++;
				//echo "-1 points";
			}
		}

		if($userpoints < 0)
		{
			echo "<br>user points: 0";
		}
		else
		{
			echo "<br>user points:".$userpoints;
		}

		if($comppoints < 0)
		{
			echo "<br>computer points: 0";
		}
		else
		{
			echo "<br>computer points:".$comppoints;
		}


	}	

?>