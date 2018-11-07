<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BioMotion</title>
	<link rel="shortcut, icon" href="img/logo.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/biomotion.css">
	<link rel="stylesheet" href="css/mini-event-calendar.css">

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!-- GRAFICAS -->
	<script src="https://code.highcharts.com/stock/highstock.js"></script>
	<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
	<script src="js/graficas/chartDarkTheme.js"></script>
	<script src="js/mini-event-calendar.js"></script>
</head>
<body>
	<img class="fondo" src="img/fondo.jpg" alt="fondo">
	<header>
		<nav>
			<ul>
				<li><a href="">Iniciar sesión</a></li>
				<li><a href="">Registrarme</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="container-fluid text-center first-cont">
		<img class="logo" src="img/logo2.png" alt="Logo">
		<a href="#calendar" class="btn btn-outline-info">¡Empecemos!</a>
	</div>

	<div class="container-fluid text-center" id="calendar">
		<div id="calendar" style="width: 30%;"></div> <br>
	</div>

	<div class="container-fluid text-center" id="chart">
		<div id="lineChart" style="min-width: 310px; margin: 0 auto" data-highcharts-chart="0"></div>
	</div>
</body>



<?php
	$servername = "localhost";
	$database = "biomotion";
	$username = "root";
	$password = "";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}else{
		//echo "Connected successfully";
		$sql = "SELECT * FROM resultados";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    $data = [];
		    while($row = $result->fetch_assoc()) {
		    	array_push($data,[
		    		"id" 	=> $row["id"],
		    		"value"	=> $row["valor"],
		    		"time"	=> $row["tiempo"]
		    	]);
		    }
		    $data = json_encode($data);
		} else {
		   // echo "0 results";
		}
		$conn->close();
	}
?>





<script>
	let currentDate = new Date();
	var db_events = [
    	{
            title: "PACIENTE 1",
            date: currentDate.getTime(),
            link: `#chart`
        }
    ];

	$(document).ready(() => {
		$('.first-cont').animate({
    		top: '30px',
    		opacity: 1
  		},1000);
  		$("#calendar").MEC({
			calendar_link: "https://google.com.mx",
			events: db_events
		});
  		setChart();
	});

	let showChart = data => {
		console.log(data);
		console.log(<?= $data ?>);
		if(jQuery.type(data) != "string"){
			$('#chart').slideDown(500);
			$('#calendar').slideUp(500);
		}
	}
</script>



<script>
	let getData = () => {
		var res = [];
		$.each(<?= $data ?>,function(index, el) {
			fecha = new Date(el.time);
			res.push([fecha.getTime(),parseInt(el.value)]);
		});
		return res;
	}
  	let setChart = () => {

  	console.log(getData());

    Highcharts.stockChart('lineChart', {
        rangeSelector: { selected: 1 },
        title: { text: 'Titulo' },
        subtitle: { text: 'Titulo' },
        series: [{
            name: 'AAPL Stock Price',
            data: getData(),
            type: 'spline',
            tooltip: {
                valueDecimals: 2
            }
        }]
    });
  }
</script>

</html>