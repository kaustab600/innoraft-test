<?php
/*function key_compare_func($a, $b)
{

    if ($a === $b) {
        return 0;
    }
    return ($a > $b)? 1:-1;
}

function multidimentional_array($x,$y)
{
	if(is_array($x))
	{
		array_diff($x,$y);
	}
}

function your_array_diff($arraya, $arrayb) {

    foreach ($arraya as $keya => $valuea) {
        if (in_array($valuea, $arrayb)) {
            unset($arraya[$keya]);
        }
    }
    return $arraya;
}
*/
function check_diff_multi($array1, $array2){
    $result = array();

    foreach($array1 as $key => $val) {
        if(is_array($val) && isset($array2[$key])) {
            $tmp = check_diff_multi($val, $array2[$key]);
            if($tmp) {
                $result[$key] = $tmp;
            }
        }
        elseif(!isset($array2[$key])) {
            $result[$key] = null;
        }
        elseif($val !== $array2[$key]) {
            $result[$key] = $array2[$key];
        }

        if(isset($array2[$key])) {
            unset($array2[$key]);
        }
    }

    $result = array_merge($result, $array2);

    return $result;
}


$array2 = array("a" => "green", "b" => "brown", "100" => array("1"=>"red","orange"), "yellow");
$array1 = array("a" => "green","100"=>array("1"=>"red","violet"), "yellow","four");
//$result = array_diff_uassoc($array1, $array2, "key_compare_func");//it compares both key and values w.r.t array1

//$result = multidimentional_array($array1, $array2);//...it compares only values not keys w.r.t array1

//$result = array_diff_ukey($array1, $array2,"key_compare_func");....//it compares only keys
var_dump(check_diff_multi($array1, $array2)); 
//print_r($result);
?>