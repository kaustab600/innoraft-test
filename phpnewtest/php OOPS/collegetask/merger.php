<?php

class merger{
    public $mergedarray = [];

    public function mergearray($colleges ,$documents){
        $array = [];
    
    foreach ($documents as $sentTo => $value) {
    	//echo $sentTo."<br>";
        //echo $documents[$sentTo]->doc_college."<br>";
        $array[$sentTo]["name"] = $documents[$sentTo]->doc_name;
        $array[$sentTo]["type"] = $documents[$sentTo]->doc_type;
        $collegename = $documents[$sentTo]->doc_college;

        if($collegename == 9999){
            $array[$sentTo]["clgname"] = "null";
            
        }
        else{

        $array[$sentTo]["clgname"] = $collegename;
        }

        $status = $documents[$sentTo]->doc_sent;
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

?>