<!--<?php
/*$url ='https://ir-revamp-dev.innoraft-sites.com/jsonapi/node/services ';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
$obj=json_decode($response, JSON_PRETTY_PRINT);
//echo $obj['']['body']['value'];
echo $obj['jsonapi']['version'] ;
    // Use $field and $value here

  print_r($obj);
//echo $obj;*/
?>-->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
 
require '../vendor/autoload.php';
 


class header
{
	function datafetch(&$client,&$response,&$json)
	{
		echo "<div class ='main'>";
		echo "<div class='container'>";

	

		$i=0;//used for classes in css
	foreach($json->data as $key => $value)
	{	
	
  	
  	echo "<div id=box".$i.">";
  	echo "<div class='image'>";
  	$imgurl= $value->relationships->field_image->links->related->href;
   	$imgdata=$client->request('GET',$imgurl );
   	$imgdetails = json_decode($imgdata->getBody());
   	$imgsrc= "https://ir-revamp-dev.innoraft-sites.com".$imgdetails->data->attributes->uri->url;
   	echo "<img src=".$imgsrc." >";
   	echo "</div>";
  	$topic = $value->attributes->title;
    $body = $value->attributes->body->value;
    $content = $value->attributes->body->summary;
	$points = $value->attributes->field_services->value;

		$index = $i+1;
		echo "<div class='texts'>";
	 	echo "<span>".$index."</span><h3>".$topic."</h3>";
		echo "<h5>".$content."</h5>";
		
		echo "<h5>".$points."</h5>";
    	echo "</div>";
    	echo "</div>";
        $i++;
	 
	}

	echo "</div>";
	echo "</div>";
	}
}

$client = new GuzzleHttp\Client(['base_uri' => 'https://ir-revamp-dev.innoraft-sites.com/jsonapi/node/']);
// Send a request to https://foo.com/api/test
$response = $client->request('GET', 'services');
//$client = new Client();
//$response = $client->request('GET', $url);
$json = json_decode($response->getBody());

$object = new header();
$object->datafetch($client,$response,$json);


?>
</body>
</html>


