<?php

class users{

	public $uid;
	public $fname;
	public $lname;
	public $username;
	public $email;
	public $pass;
	public $desc;
	public $country;
	public $gender;
	public $regdate;
	public $img;

	function __construct($id,$f,$l,$u,$e,$p,$d,$c,$g,$reg,$img){

		$this->uid = $id;
		$this->fname = $f;
		$this->lname = $l;
		$this->username = $u;
		$this->email = $e;
		$this->pass = $p;
		$this->desc = $d;
		$this->country = $c;
		$this->gender = $g;
		$this->regdate = $reg;
		$this->img = $img;
	}

}