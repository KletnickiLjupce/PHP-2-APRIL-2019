<?php


$url = "http://www.nbrm.mk/klservice/kurs.asmx?WSDL";

$web_service = new SoapClient($url);

$data = [
	'StartDate' => '07.05.2019',
	'EndDate'   => '07.05.2019'
];

$response = $web_service->GetExchangeRate($data);

$response_to_string = simplexml_load_string($response->GetExchangeRateResult);
/*
echo '<pre>';
print_r($response_to_string);
echo '</pre>';
*/

?>

<table border="1px solid black">
	<thead>
		<th>Drzava</th>
		<th>Sreden</th>
		<th>Naziv</th>
	</thead>
	<tbody>	
		<?php

			foreach ($response_to_string->KursZbir as $value) {
				?>
				<tr>
					<td><?= $value->Drzava ?></td>
					<td><?= $value->Sreden ?></td>
					<td><?= $value->NazivMak ?></td>
				</tr>

				<?php
			}
		?>
	</tbody>
</table>

<style>
	td, th{
		padding: 6px
	}
</style>