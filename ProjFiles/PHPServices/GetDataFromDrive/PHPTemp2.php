<?php
$url = "https://script.google.com/macros/s/AKfycbx-jmj_70IEWRP3t5Z2QFSIkWakhYbTYvTMM2uTCCIE3ZXx0loS/exec";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//$curl_response = curl_exec($curl);
$status = curl_getinfo($curl,CURLINFO_HTTP_CODE);
if(!($status === 200)) {
    //$result = array();
    $result = curl_exec($curl);
    $xml = new DOMDocument();
    $xml->loadHTML($result);
    $xpath = new DOMXPath($xml);
    $href = $xpath->query("//*[@href]")->item(0);
    //$results = $href->attributes->getNamedItem('href')->nodeValue;
}
else
{
    $curl_response = curl_exec($curl);
    echo $curl_response;
    echo "\n done else";
}
echo "done";
//echo $curl_response;
//print($curl_response);
echo "done ended";
exit;
if ($curl_response === false) 
{
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
//$decoded = json_decode($curl_response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}

$response = $curl_response; /*array("message"=>"Songs cannot be retrived.",
                 "code"=>"0",
                 $curl_response
                 );*/
return $response;
exit;
echo 'response ok!';
/*
$i = 0;
/*
foreach($urls as $url) {
    if(substr($url,0,4) == "http") {
        $c = curl_init($url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $result = @curl_exec($c);
        $status = curl_getinfo($c,CURLINFO_HTTP_CODE);
        curl_close($c);
        $results[$i]['code'] = $status;
        $results[$i]['url'] = $url;

        if($status === 301) {
            $xml = new DOMDocument();
            $xml->loadHTML($result);
            $xpath = new DOMXPath($xml);
            $href = $xpath->query("//*[@href]")->item(0);
            $results[$i]['target'] = $href->attributes->getNamedItem('href')->nodeValue;
        }
        $i++;
    }
}
    */
?>