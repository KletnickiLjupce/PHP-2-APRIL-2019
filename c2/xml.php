<?php


$string_as_xml = "
	<professor>
		<name>Neven</name>
		<prezime>Gjoreski</prezime>
		<age>31</age>
		<email>asd_asd@asd.asd</email>
	</professor>
";

//echo $string_as_xml;

$object_as_xml = simplexml_load_string($string_as_xml);

echo '<pre>';
print_r($object_as_xml);
echo '</pre>';

echo $object_as_xml->prezime;

$string_as_xml_2 = "
	<professors>
		<professor>
			<id>1</id>
			<name>Neven</name>
			<prezime>Gjoreski</prezime>
			<age>31</age>
			<email>asd_asd@asd.asd</email>
		</professor>
		<professor>
			<id>2</id>
			<name>Albertos</name>
			<prezime>Ajnshtajnus</prezime>
			<age>105</age>
			<email>a.j@genius.org</email>
		</professor>
	</professors>
";

$object_as_xml_2 = simplexml_load_string($string_as_xml_2);

echo '<pre>';
print_r($object_as_xml_2);
echo '</pre>';

// da se napravi dropdown od obj2
//so value = id and display value = name prezime

echo "<select>";
foreach ($object_as_xml_2->professor as $professor) {
	$display = $professor->name . ' ' . $professor->prezime;
	echo "<option value='$professor->id'> $display </option> ";
}
echo "</select>";
