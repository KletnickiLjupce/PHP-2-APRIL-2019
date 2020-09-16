<?php

$url = "http://localhost/php2/c3/curl.php";
$USERPWD = 'admin:admin';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERPWD, $USERPWD);

$response = curl_exec($curl);
curl_close($curl);

echo $response;

?>