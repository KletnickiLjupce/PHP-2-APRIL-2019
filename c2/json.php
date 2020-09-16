<?php

$string_as_json = '
	{
		"professor" :
			{
				"name" 		: "Neven",
				"lastname" 	: "Gjoreski",
				"age" 		: 31,
				"languages" : [ "PHP" , "SQL" , "JavaScript" ]
			}
	}
';

$array_as_json = json_decode($string_as_json, true);

echo '<pre>';
print_r($array_as_json);
echo '</pre>';

//da se ispecati JavaScript
echo $array_as_json['professor']['languages'][2];

$string_as_json_2 = '
	{
		"professors" :
			[
				{
					"name" 		: "Neven",
					"lastname" 	: "Gjoreski",
					"age" 		: 31,
					"languages" : [ "PHP" , "SQL" , "JavaScript" ]
				},
				{
					"name" 		: "Albertos",
					"lastname" 	: "Ajnshtajnos",
					"age" 		: 105,
					"languages" : [ "PHP" , "SQL" , "JavaScript", "Python", "Java" ]
				}
			]
	}
';

$array_as_json_2 = json_decode($string_as_json_2, true);
echo '<pre>';
print_r($array_as_json_2);
echo '</pre>';

//da se ispecati dropdown od jazicite koi gi znaat
//site teletabis profesori
// ime na professor kako labela a dropdown kako jazici

foreach ($array_as_json_2['professors'] as $professor) {
	
	echo "<b>{$professor['name']}</b>";

	echo "<select>";

	foreach ($professor['languages'] as $language) {
		echo "<option>$language</option>";	
	}

	echo "</select><br>";
}


$object_as_json = json_decode($string_as_json_2);
echo '<pre>';
print_r($object_as_json);
echo '</pre>';

foreach ($object_as_json->professors as $professor) {
	
	echo "<b>{$professor->name}</b>";

	echo "<select>";

	foreach ($professor->languages as $language) {
		echo "<option>$language</option>";	
	}

	echo "</select><br>";
}


$array = [ 'name' => "Neven" , "lastname" => "Gjoreski" ];

echo json_encode($array);

//ova e random rabota ne e zadolzitelna
echo "<div style='height:500px'>";