<?php
class students{
	private $sid;
	private $sname;
	private $dob;
	private $grade;

	private $studentarray = [];

	function __construct($id,$name,$dateb,$grad){
		$this->sid = $id;
		$this->sname = $name;
		$this->dob = $dateb;
		$this->grade = $grad;

	}
	
}


/*$std1 = new students('std1','john','22-12-97','12');
$std2 = new students('std2','sally','12-10-02','10');
$std3= new students('std3','rahul','25-06-04','8');
$std4 = new students('std4','trina','6-4-09','5');*/

$tmpstudent = array(array('sid'=>'std1','sname'=>'john','dateofB'=>'22-12-97','grad'=>'12'),array('sid'=>'std2','sname'=>'sally','dateofB'=>'12-10-02','grad'=>'10'),array('sid'=>'std3','sname'=>'rahul','dateofB'=>'25-06-04','grad'=>'8'),array('sid'=>'std4','sname'=>'trina','dateofB'=>'6-4-09','grad'=>'5'));

$ob1 =[];

foreach($tmpstudent as $key => $value){
	
	$ob1[$key] = new students($value['sid'],$value['sname'],$value['dateofB'],$value['grad']);
}
//print_r($ob1);

echo $ob1[0]->sid;
?>