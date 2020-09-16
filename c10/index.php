<?php


// da se napravi tabela 6 * 6

// 1	 2	 3	 4	 5	 6
// 2 	 4	 6	 8	 10	 12 
// 3 	 6	 9	 12  
// 4
// 5
// 6		36	

echo "<table border=1 >";
for ( $i = 1; $i < 7; $i++) {

	echo '<tr>';

	for ( $j = 1; $j < 7; $j++) {
		echo "<td onclick='klik(this);' style='padding:5px;'>" . $i * $j . "</td>";
	}

	echo '</tr>';
}



?>

<tr>
	<td colspan="2" onclick='klik(this);'> + </td>
	<td colspan="2" onclick='klik(this);'> - </td>
	<td colspan="2" onclick='klik(this);'> * </td>
</tr>


<?php

echo '</table>';


?>
<br>
<button onclick="reset()">
	RESET
</button>

<h3>Input</h3>
<div id="input">
	
</div>

<h3>Result</h3>
<div id="result">
	
</div>

<script>
	function klik(obj) {
		console.log(obj)

		console.log(obj.innerHTML)

		let res = document.querySelector('#input').innerHTML

		document.querySelector('#input').innerHTML = res + obj.innerHTML

	document.querySelector('#result').innerHTML = eval(res + obj.innerHTML)

	}

	function reset (){
		document.querySelector('#result').innerHTML = ''
		document.querySelector('#input').innerHTML = ''
	}

</script>