<?php

class blog{

	public $pid;
	public $post_date;
	public $post_title;
	public $post_content;

	function __construct($id,$dt,$title,$cont){
		
		$this->pid = $id;
		$this->post_title = $title;
		$this->post_date = $dt;
		$this->post_content = $cont;

	}

}

