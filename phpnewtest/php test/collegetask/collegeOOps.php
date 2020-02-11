<?php
//set every college as object
class college{
    private $college;
    private $collegName = [];//initialize empty array

   public function __construct($name){
        $this->college = $name;
    }

   public function getclgname(){
        return $this->college;
    }

    public function setarray($arr){
        foreach($arr as $key => $value){
            $this->collegName[$key] = $value->getclgname();
        }

      return $this->collegName;

    }
}

//list of all colleges under a group to form the college array
/*class Allcolleges{
    private $collegName = array();

    public function setarray($arr){
        foreach($arr as $key => $value){
            $this->collegName[$key] = $value->getclgname();
        }

      return $this->collegName;

    }
}*/

$test = array($clg1new = new college('collegeA'),$clg2 = new college('collegeB'),$clg3= new college('collegeC'),$clg4 = new college('collegeD'));
$record1 = new college('record1');

$array1 = $record1->setarray($test);// college list array

//To store document lists 
class documentslist{
    private $documentdetails = [];

    function __construct($name,$type,$clgid,$status){
        $this->documentdetails['doc_name'] = $name;
        $this->documentdetails['doc_type'] = $type;
        $this->documentdetails['doc_college'] = $clgid;
        $this->documentdetails['doc_sent'] = $status;
    }

    function getdetails(){
        return $this->documentdetails;
    }

    
}

$doc1 = new documentslist('doc1','text',0,1);
$doc2 = new documentslist('doc2','word',1,1);
$doc3 = new documentslist('doc3','excel',2,0);
$doc4 = new documentslist('doc4','word',3,0);
$doc5 = new documentslist('doc5','excel',3,1);
$doc6 = new documentslist('doc6','text',9999,1);


//document list array
$document = array($doc1->getdetails(),$doc2->getdetails(),$doc3->getdetails(),$doc4->getdetails(),$doc5->getdetails(),$doc6->getdetails());

//for merging college name , status etc
class merger{
    private $mergedarray = [];

    public function mergearray($college ,$documents){
        $array = [];
    
    foreach ($documents as $sentTo => $value) {
        //echo $documents[$sentTo]["doc_college"]."<br>";
        $array[$sentTo]["name"] = $documents[$sentTo]["doc_name"];
        $array[$sentTo]["type"] = $documents[$sentTo]["doc_type"];
        $collegename = $documents[$sentTo]["doc_college"];

        if($collegename == 9999){
            $array[$sentTo]["clgname"] = "null";
            
        }
        else{

        $array[$sentTo]["clgname"] = $college[$collegename];
        }

        $status = $documents[$sentTo]["doc_sent"];
        if($status == 1){

        $array[$sentTo]["status"] = "success";
        }
        else{
            $array[$sentTo]["status"] = "fail";
        }
        
    }

        $this->mergedarray = $array;
        return $this->mergedarray;
    }
}

$obj1 = new merger;

$newarray = $obj1->mergearray($array1 ,$document);

class collegeDocdetails{

    

    function display($array,$college){
        echo "<table cellspacing='0px' cellpadding='10px' border='1px solid black'>";
        echo "<tr><th>College Name</th><th>Document name</th><th>Type</th><th>Status</th></tr>";
    foreach($college as $name => $val){
        //echo "<tr><td>";
        //echo $val."</td>";
        $cname = $val;
        foreach($array as $docname => $value){

            if($array[$docname]['clgname'] != "null")
            {

            if($array[$docname]['clgname'] == $cname){
                echo "<tr><td>";
                echo $val."</td>";
                echo "<td>".$array[$docname]['name']."</td>";
                echo "<td>".$array[$docname]['type']."</td>";
                echo "<td>".$array[$docname]['status']."</td>";
                echo "</tr>";
                
            }

            }
            else{
                echo "<tr>";
                echo "<td>".$val."</td>";
                echo "<td>".$array[$docname]['name']."</td>";
                echo "<td>".$array[$docname]['type']."</td>";
                echo "<td>".$array[$docname]['status']."</td>";
                echo "</tr>";
            }
            
        }
    }

    }


} 

$list1 = new collegeDocdetails;
$list1->display($newarray,$array1);



?>