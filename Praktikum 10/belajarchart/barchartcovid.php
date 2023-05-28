<?php
include('koneksicovid.php');
$label = ["India", "Japan", "S.Korea", "Turkey", "Vietnam", "Taiwan", "Iran", "Indonesia", "Malaysia", "Israel"];

for ($country = 1; $country < 11; $country++) {
    $query = mysqli_query($koneksi, "select total_case from tb_case where id_case='$country'");
    $row = $query->fetch_array();
    $totalCases[] = $row['total_case'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Grafik Covid - Bar Chart</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>

<body>
    <div style="width: 800px;height: 800px">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($label); ?>,
                datasets: [{
                    label: 'Grafik Total Case Covid-19',
                    data: <?php echo json_encode($totalCases); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna latar belakang
                    borderColor: 'rgba(255, 99, 132, 1)', // Warna border
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>