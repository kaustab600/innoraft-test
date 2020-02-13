<?php
namespace cricketdetails;

class players{
    
    public $matchid;
    public $runs;
    public $team;
    //public $permatchRuns=[];

    function __construct($mid,$run,$team){
        //$this->pname = $name;
        $this->matchid = $mid;
        $this->runs = $run;
        $this->team = $team;
    }
}


?>