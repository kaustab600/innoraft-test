<?php
	
    namespace collegedetails;
    
	class documentslist{
    
    public $doc_name;
    public $doc_type;
    public $doc_college;
    public $doc_sent;


    function __construct($name,$type,$clgid,$status){
        $this->doc_name = $name;
        $this->doc_type = $type;
        $this->doc_college = $clgid;
        $this->doc_sent = $status;
    }
}

?>