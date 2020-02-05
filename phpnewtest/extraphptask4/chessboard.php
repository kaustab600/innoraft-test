<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form name="frm1" method="post" >
		<input type="number" name="rows" placeholder="enter rows"  />
		<input type="submit" name="submit" value="submit">
	</form>

</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		$rows = $_POST['rows'];
		$color = "black";
		echo "<table cellspacing='0px' cellpadding='20px' border='1px solid black'>";
		for($i=1;$i<=$rows;$i++)
		{
			echo "<tr>";
			for($j=1;$j<=$rows;$j++)
			{	

				echo "<td style='background-color:".$color."'></td>";
				if($color == "black")
				{
					$color = "white";
				}
				else
				{
					$color = "black";
				}

				
			}

			if($rows%2==0)
			{
				
				if($color=="white")
				{
					$color = "black";
				}
				else
				{
					$color ="white";
				}
		    }

				echo "</tr>";
		
		}

		echo "</table>";



	}
?>