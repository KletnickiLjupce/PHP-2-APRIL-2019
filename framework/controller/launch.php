<?php
class launch {

	function start(){

		$model = new launchModel();
		$string = $model->start();

		require_once($string);
	}
}