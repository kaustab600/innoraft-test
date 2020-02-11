<?php
class marks{

  public $sid;
  public $submarks =[];
  function __construct($studid,$arr){
    $this->sid=$studid;
    $this->submarks=$arr;
  }
}

?>