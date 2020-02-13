<?php

include('data.php');
require './vendor/autoload.php';
use collegedetails\college;
use collegedetails\documentslist;
use collegedetails\merger;

// -------------------creating college objects---------------------------------
foreach($tmpcollege as $key => $value){
  $colleges[] =  new college($value);
}

//----------------------creating document objects----------------------------
foreach($tmpdocuments as $key => $value){
  
  $document[] = new documentslist($value['doc_name'],$value['doc_type'],$value['doc_college'],$value['doc_sent']);
}

$obj1 = new merger;
$newarray = $obj1->mergearray($colleges ,$document);

//echo "<pre>";
//print_r($newarray);
//echo "</pre>";
//----------------------------------------------------------------------------------------------------------//
class collegeDocdetails{

    //function to display the college + document detail in tabular form
    function display($array,$college){

        echo "<table cellspacing='0px' cellpadding='10px' border='1px solid black'>";
        echo "<tr><th>College Name</th><th>Document name</th><th>Type</th><th>Status</th></tr>";
      foreach($college as $name => $val){

        echo "<tr><td>";
        
        $cname = $val->college;
        
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
                echo "<td>".$val->college."</td>";
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
$list1->display($newarray,$colleges);

?>