<?php

namespace studentclasses;

class subject{
  public $name;
  public $subjectcode;
  public $mm;
  //private $array =[];

  function __construct($sname,$ssubjectcode,$smm){
    $this->name=$sname;
    $this->subjectcode=$ssubjectcode;
    $this->mm=$smm;
  }
}
  
?>