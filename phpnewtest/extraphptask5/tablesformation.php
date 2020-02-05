
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
	<form name="frm1" method="post" >
		<input type="number" name="rows" placeholder="enter rows" />
		<input type="number" name="cols" placeholder="enter columns">
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>
<?php
  if(isset($_POST['submit']))
  {

  	$rows = $_POST['rows'];
  	$columns = $_POST['cols'];
  	echo "<table cellspacing='0px' cellpadding='5px' border='1px solid black'>";
  	for($i=1;$i<=$rows;$i++)
  	{	echo "<tr>";
  		for($j=1;$j<=$columns;$j++)
  		{	$rs = $i*$j;
  			echo "<td>".$i."*".$j."=".$rs."</td>";

  		}
  		echo "</tr>";
  	}

  	echo "</table>";
  }
?>
