<?php

class grade{
  public $grad;
  public $scores = [];

  function __construct($Grade,$arr){
      $this->grad=$Grade;
      $this->scores=$arr; 
  }
}

?>