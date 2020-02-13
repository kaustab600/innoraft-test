<?php
	
	$date  = "4thfeb";

	echo str_replace(['/D'], '', filter_var($date, FILTER_SANITIZE_NUMBER_INT));
?>