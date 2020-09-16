<button onclick="fetchResponse()">
	Fetch Response
</button>

<br><br>

<button onclick="fetchResponsePost()">
	Fetch Response Post
</button>

<div id="response">
	
</div>



<script type="text/javascript">
	function fetchResponse() {
		
		fetch('test.php?parameter=Neven')
			.then( response => response.text() )
			.then( data => { 
				document.getElementById('response').innerHTML = data;
			 } )
	}

	function fetchResponsePost(){

		fetch('test.php', {
			method : 'POST',
			headers :{
				'Content-type' : 'application/json'
			},
			body: JSON.stringify({
				name: "Neven",
				lastname : "Gjoreski"
			})
		})

			.then( response => response.json() )
			.then( data => {
				document.getElementById('response').innerHTML = ` Name : ${data.parameter.name}, lastname : ${data.parameter.lastname}`;
			} )

	}

</script>