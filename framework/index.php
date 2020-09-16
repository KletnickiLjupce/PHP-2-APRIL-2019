<?php

//print_r($_GET['parameters']);

//http://localhost/php2/framework/user/getAllUsers/1
session_start();

$default = [
	'controller' => 'launch',
	'method' 	 => 'start',
	'input' 	 => '',
];

$params = [];

if( isset($_GET['parameters']) ){
	$parameters = $_GET['parameters'];
	$params = explode( '/', $parameters);
}

switch( count($params) ){
	case 0 :
		$controller = $default['controller'];
		$method = $default['method'];
		$id = $default['input'];
		break;
	case 1 :
		$controller = $params[0];
		$method = $default['method'];
		$id = $default['input'];
		break;
	case 2 :
		$controller = $params[0];
		$method = $params[1];
		$id = $default['input'];
		break;
	case 3 :
		$controller = $params[0];
		$method = $params[1];
		$id = $params[2];
		break;
	default:
		die( "Vnesovte premnogu parametri !");
}

$filename_controller = "controller/$controller.php";
$filename_method = "model/$controller.php";

if ( file_exists($filename_controller) &&
	 file_exists($filename_method)	 ) {

	include $filename_controller;
	include $filename_method;

	require_once "controller/general.php";
	
	$object = new $controller();

	if ( method_exists($object, $method) ){
		$object->$method($id);
	} else {
		echo "Povikavte nepostecki metod";
	}

} else {
	 echo "Povikavte nepostocki kotroler ili metod";
}
