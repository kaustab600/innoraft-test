<?php

include('model.php');

$blog1 = new users();

$p = $blog1->get_all_Users();


echo "<pre>";
print_r($p);
echo "</pre>";

//include('theme_mainpage.php');
