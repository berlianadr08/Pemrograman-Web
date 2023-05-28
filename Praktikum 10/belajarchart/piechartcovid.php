<?php
include('koneksicovid.php');
$label = ["India", "Japan", "S.Korea", "Turkey", "Vietnam", "Taiwan", "Iran", "Indonesia", "Malaysia", "Israel"];

for ($country = 1; $country < 11; $country++) {
    $query = mysqli_query($koneksi, "select total_case from tb_case where id_case='$country'");
    $row = $query->fetch_array();
    $totalCases[] = $row['total_case'];
}
?>
   <!doctype html>
<html>

<head>
	<title>Pie Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>

<body>
	<div id="canvas-holder" style="width:50%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($totalCases); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 159, 64, 0.6)',    
                    'rgba(255, 223, 132, 0.6)',   
                    'rgba(54, 210, 235, 0.6)',    
                    'rgba(75, 192, 237, 0.6)',    
                    'rgba(255, 243, 86, 0.6)',    
                    'rgba(153, 102, 255, 0.6)',   
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
                    'rgba(255, 159, 64, 0.6)',    
                    'rgba(255, 223, 132, 0.6)',   
                    'rgba(54, 210, 235, 0.6)',    
                    'rgba(75, 192, 237, 0.6)',    
                    'rgba(255, 243, 86, 0.6)',    
                    'rgba(153, 102, 255, 0.6)', 
					],
					label: 'negara'
				}],
				labels: <?php echo json_encode($label); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>
</html>
