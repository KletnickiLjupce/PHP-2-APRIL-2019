<?php

// require_auth() ? sendCurl() : reject();


require_auth_db() ? sendCurl() : reject();

////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
///////////////////  FUNCTIONS   ///////////////////////
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////


function require_auth(){

	$AUTH_USER = 'admin';
	$AUTH_PASS = 'admin';


	header("Cache-Control: no-cache, must-revalidate, max-age=0");

	checkUserAndPw();

	return 
	(
		!empty($_SERVER['PHP_AUTH_USER']) 			&&
		!empty($_SERVER['PHP_AUTH_PW']) 			&&
		$_SERVER['PHP_AUTH_USER'] 	=== $AUTH_USER 	&&
		$_SERVER['PHP_AUTH_PW'] 	=== $AUTH_PASS
	);
}

function require_auth_db(){

	header("Cache-Control: no-cache, must-revalidate, max-age=0");

	return 
	(
		!empty($_SERVER['PHP_AUTH_USER']) 			&&
		!empty($_SERVER['PHP_AUTH_PW']) 			&&
		checkUserAndPw()
	);
}


function sendCurl(){

	$curl = curl_init();

	$api_key = 'e8b5e755995d25633d3ae9f52219fd0c';
	$url = "http://api.openweathermap.org/data/2.5/weather";

	$data = [
		'q' 	=> 'Skopje',
		'mode' 	=> 'html',
		'appid' => $api_key
	];

	$url_with_params = $url . '?' . http_build_query($data);

	curl_setopt($curl, CURLOPT_URL, $url_with_params);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($curl);
	curl_close($curl);

	echo $response;
}

function reject () {

	header("HTTP/1.1 401 Authentication Required");
	header('WWW-Authenticate: Basic realm="Acces denied"');
	echo "Acces denied";
	exit;
}


function checkUserAndPw(){

	$connection_string = 'mysql:host=127.0.0.1;dbname=php22';
	$username = 'root';
	$password = '';

	$db = new PDO( $connection_string, $username, $password);

	$sql = "SELECT * FROM user where name = :name and lastname = :lastname";

	$query = $db->prepare($sql);

	$query->bindValue(':name' , $_SERVER['PHP_AUTH_USER'], PDO::PARAM_STR);
	$query->bindValue(':lastname' , $_SERVER['PHP_AUTH_PW'], PDO::PARAM_STR);

	$query->execute();
	$response = $query->fetch(PDO::FETCH_ASSOC);

	return $response;
}