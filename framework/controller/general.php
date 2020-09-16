<?php
//inlcudes
require_once "includes/general_functions.php";


class general extends PDO {

	public $db;

	public function __construct(){

		$config = file_get_contents('config.json');
		$config_object = json_decode($config);

		$config_string = $config_object->database->config;
		$username = $config_object->database->username;
		$password = $config_object->database->password;

		$GLOBALS['db'] = new PDO( $config_string, $username, $password);

		if( empty($SESSION['user_logged']) && 
			require_auth() ){

			$SESSION['user_logged'] = true;
		} else {
			reject();
		}

	}

}

$general = new general;