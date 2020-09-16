<?php

$response = file_get_contents('php://input');

if ( $response ){
	$decoded = json_decode( $response , true );
	echo json_encode( ['parameter' => $decoded ] );
} else {
	echo 'Ova e tekst vo test.php !!!' . $_GET['parameter'];
}