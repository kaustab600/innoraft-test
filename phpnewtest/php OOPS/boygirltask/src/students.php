<?php

namespace studentdetails;

class students{

	public $details= [];

	function __construct($name,$gender){
		$this->details['name'] = $name;
		$this->details['gender']= $gender;
	}

	function getdetails(){
		return $this->details;
	}


}



?>