<?php

/*include('modelMainpage.php');*/

require 'vendor/autoload.php';
use blogs\blog;

$blog1 = new blog();

$p = $blog1->getPosts();


//index page theme
include('index.php');