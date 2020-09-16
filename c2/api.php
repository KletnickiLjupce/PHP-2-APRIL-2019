<?php


$api_key = 'e8b5e755995d25633d3ae9f52219fd0c';

$url = "http://api.openweathermap.org/data/2.5/weather";

$city = 'Skopje';
$mode = 'json';

$parameters = "?appid=$api_key&q=$city&mode=$mode";

// echo $url . $parameters;
$response = file_get_contents($url . $parameters);

// echo $response;

$json_response = json_decode($response);
echo '<pre>';
print_r(json_decode($response));
echo '</pre>';

echo " Current wind speed is Skopje is : {$json_response->wind->speed}";