<script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>

<div>
	<p>
		Static Content
	</p>
</div>

<div>
	<p>
		<button onclick="sendAjax()"> Click </button>
	</p>
	<p>
		<button onclick="clicked()"> Zapisi </button>
	</p>
	<p>
		<button onclick="weatherAPI()"> WeatherAPI </button>
	</p>
</div>

<div>
	<select id='city'>
		<option>Skopje</option>
		<option>Barcelona</option>
		<option>London</option>
		<option>Valletta</option>
	</select>
</div>

<div id="dinamic_content">
	
</div>

<div id="clicked">
	
</div>

<div id="error" style="color:red">
	
</div>

<script type="text/javascript">
	
	function sendAjax(){

		$.ajax({
			async : true,
			cache : false,
			type : 'GET',
			dataType : 'html',
			data : {},
			url : 'http://localhost/php2/c3/curl.php',
			success : function ( data ){
				$('#dinamic_content').html(data);
			}
		});
	}

	function clicked(){
		$('#clicked').append('<p> Kliknavte </p>');
	}

	function weatherAPI(){

		var api_key = 'e8b5e755995d25633d3ae9f52219fd0c';
		var url = "http://api.openweathermap.org/data/2.5/weather";
		var city = $('#city').val();
		//var city = document.getElementById('city').value;
		//var city = document.querySelector('#city').value;
		var mode = 'html';

		var url_for_send = `${url}?q=${city}&mode=${mode}&appid=${api_key}`;


		$.ajax({
			url : url_for_send,
			success : function( data ){
				$('#dinamic_content').html(data);
			},
			error : function( error ){
				$('#error').html('Error : ' + error.responseJSON.message)
			}
		})

	}


</script>

<hr><hr><hr>
<h1> Redirecting </h1>

<button onclick="window.open('https://google.com' , '_blank')">
	Otvori Google.com vo nov tab
</button>

<br><br>

<button onclick="window.open('https://google.com' ,'_self')">
	Otvori Google.com vo istov tab
</button>

<br><br>

<button onclick="window.location = 'https://google.com'">
	Otvori Google.com vo istov tab
</button>

<br><br>

<button onclick="window.open('pdf.php' , '_self')">
	Otvori pdf tuka
</button>
<br><br>

<button onclick="window.open('pdf.php?download=true' , '_self')">
	Download PDF file
</button>
