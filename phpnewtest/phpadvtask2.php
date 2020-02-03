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

<?php
 
require '../vendor/autoload.php';
 
//use GuzzleHttp\Client;


 
/*$client = new Client([
    'base_uri' => 'http://www.google.com',
]);
 
$response = $client->request('GET', 'search', [
    'query' => ['q' => 'curl']
]);
 
echo $response->getBody();
*/




//$url ='https://ir-revamp-dev.innoraft-sites.com/jsonapi/node/services ';
$client = new GuzzleHttp\Client(['base_uri' => 'https://ir-revamp-dev.innoraft-sites.com/jsonapi/node/']);
// Send a request to https://foo.com/api/test
$response = $client->request('GET', 'services');
//$client = new Client();
//$response = $client->request('GET', $url);
$json = json_decode($response->getBody());

for($i=0;$i<7;$i++)
{
  if($i > 5)
  {

  	$imgurl= $json->data[$i]->relationships->field_image->links->related->href;
   	$imgdata=$client->request('GET',$imgurl );
   	$imgdetails = json_decode($imgdata->getBody());
   	$imgsrc= "https://ir-revamp-dev.innoraft-sites.com".$imgdetails->data->attributes->uri->url;
   	echo "<img src=".$imgsrc." width='200px'>";
  	$topic = $json->data[$i]->attributes->title;
    $body = $json->data[$i]->attributes->body->value;
   //$content = $json->data[$i]->attributes->body->summary;
    echo "<h3>".$index.") ".$topic."</h3><br>";
	echo "<h4>".$body."</h4>";
   	

  }
  else
  {
  	
  	
  	$imgurl= $json->data[$i]->relationships->field_image->links->related->href;
   	$imgdata=$client->request('GET',$imgurl );
   	$imgdetails = json_decode($imgdata->getBody());
   	$imgsrc= "https://ir-revamp-dev.innoraft-sites.com".$imgdetails->data->attributes->uri->url;
   	echo "<img src=".$imgsrc." width='200px' style='float:left;'>";
  	$topic = $json->data[$i]->attributes->title;
	$body = $json->data[$i]->attributes->body->value;
	$content = $json->data[$i]->attributes->body->summary;
	$points = $json->data[$i]->attributes->field_services->value;

	$index = $i+1;

	echo "<h3>".$index.") ".$topic."</h3><br>";
	echo "<h4>".$content."</h4>";

	echo "<h4>".$points."</h4><br><br>";
    
  }
 
//print_r($json);
//print_r($json['data']->['attributes']);
}




?>

