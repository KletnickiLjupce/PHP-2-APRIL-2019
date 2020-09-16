<?php

if( !function_exists('pre')){

	function pre ($array){
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
}


function require_auth(){

	$AUTH_USER = 'admin';
	$AUTH_PASS = 'admin';

	header("Cache-Control: no-cache, must-revalidate, max-age=0");

	return 
	(
		!empty($_SERVER['PHP_AUTH_USER']) 			&&
		!empty($_SERVER['PHP_AUTH_PW']) 			&&
		$_SERVER['PHP_AUTH_USER'] 	=== $AUTH_USER 	&&
		$_SERVER['PHP_AUTH_PW'] 	=== $AUTH_PASS
	);
}

function reject () {

	header("HTTP/1.1 401 Authentication Required");
	header('WWW-Authenticate: Basic realm="Acces denied"');
	echo "Acces denied";
	exit;
}