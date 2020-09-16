<?php 
	$cities = ['Skopje', 'Lviv','Barcelona','Kumanovo'];
?>
<form method="post" action="">
	City :
	<!--  ova e komentar vo html    -->
	<select name="city">
		<?php
			foreach ($cities as $city) {

				$selected = ($city === $_POST['city']) ? 'selected' : '';
				/*
				if ( $city === $_POST['city'] ){
					$selected = 'selected';
				} else {
					$selected = '';
				}
				*/
				echo "<option $selected> $city </option>";
			}
		 ?>
	</select>

	<input type="submit" name="Send API">
</form>


<?php

if ( isset($_POST['city']) ) {

	$api_key = 'e8b5e755995d25633d3ae9f52219fd0c';
	$url = "http://api.openweathermap.org/data/2.5/weather";

	$city = $_POST['city'];
	$mode = 'html';

	$parameters = "?appid=$api_key&q=$city&mode=$mode";
	$response = file_get_contents($url . $parameters);

	echo $response;
}

