<?php
class students{
    public $sid;
    public $sname;
    public $dob;
    public $grade;
    //public $marksobtained = [];
    

    function __construct($arr){
        $this->sid = $arr['sid'];
        $this->sname = $arr['sname'];
        $this->dob = $arr['dateofB'];
        $this->grade = $arr['grad'];

    }
    
}
?>