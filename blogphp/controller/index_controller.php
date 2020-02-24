<?php

require('../vendor/autoload.php');
use blogs\blog;

$blog1 = new blog();

$p = $blog1->getPosts();


//index page theme
include('../view/index.php');