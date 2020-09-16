<?php

	header('Content-Type: application/pdf');

	if( isset($_GET['download']) ){
		header('Content-Disposition: attachment;filename=illuminati.pdf');
	}

	readfile('illuminati.pdf');

?>