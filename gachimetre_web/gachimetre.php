<html>

	<head>
		<meta charset="utf-8">
		<title>Gachimètre</title>
		<link rel="stylesheet" href="style.css" />
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="https://code.highcharts.com/modules/drilldown.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
		<?php include "pdoGachimetre.php"; ?>
	</head>

	<body>

		<?php

		//Gachis par jour dans une semaine
		$res_jour_semaine = pdoGachimetre::getGachisParJour();

		?>

		<!-- Affichage du poids du dernier bout de pain jeté -->
		<p id="refresh"></p>
			
		<p id="refreshWeek"></p>

		<!-- Affichage du graphique permettant d'afficher des statistiques sur le gaspillage de pain durant la semaine -->
		<div class="graphe">
			<h2>Statistiques</h2>
			<div id="container" style="width:80%; height:80%;"></div>
		</div>

		<script>
			var chart=Highcharts.chart('container', {

			    title: {
			        text: 'Gâchis de la semaine'
			    },

			    xAxis: {
			        categories: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi']
			    },

			    series: [{
			        type: 'column',
			        colorByPoint: true,
			        data: [<?php echo $res_jour_semaine[0]['poids']; ?>, <?php echo $res_jour_semaine[1]['poids']; ?>, <?php echo $res_jour_semaine[2]['poids']; ?>, <?php echo $res_jour_semaine[3]['poids']; ?>, <?php echo $res_jour_semaine[4]['poids']; ?>],
			        showInLegend: false
			    }]

			});
		</script>

		<script>
			$(document).ready(function () {
			    $("#refresh").load("refresh.php");
			    var refreshId = setInterval(function () {
			        $("#refresh").load("refresh.php");
			    }, 1000);
			    $.ajaxSetup({
			        cache: false
			    });
			});
		</script>

		<script>
			$(document).ready(function () {
			    $("#refreshWeek").load("refreshWeek.php");
			    var refreshId = setInterval(function () {
			        $("#refreshWeek").load("refreshWeek.php");
			    }, 1000);
			    $.ajaxSetup({
			        cache: false
			    });
			});
		</script>

	</body>

</html>