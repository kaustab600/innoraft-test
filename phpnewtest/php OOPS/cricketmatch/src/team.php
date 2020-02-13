<?php

namespace cricketdetails;
class team{
    //public $teamname;
    public $listofplayers = [];

    function __construct($arr){
        //$this->teamname = $name;
        $this->listofplayers = $arr;
    }

}

?>