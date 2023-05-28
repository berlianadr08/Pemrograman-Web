<?php
include('koneksicovid.php');
$label = ["India", "Japan", "S.Korea", "Turkey", "Vietnam", "Taiwan", "Iran", "Indonesia", "Malaysia", "Israel"];

// Mendapatkan data Total Cases, Total Deaths, Total Recovered, Active Cases, Total Tests, Population
$totalCases = [];
$totalDeaths = [];
$totalRecovered = [];
$activeCases = [];
$totalTests = [];
$population = [];

for ($country = 1; $country < 11; $country++) {
    $query = mysqli_query($koneksi, "select total_case, total_deaths, total_recovered, active_cases, total_tests, population
    from tb_case where id_case='$country'");
    $row = $query->fetch_array();
    $totalCases[] = $row['total_case'];
    $totalDeaths[] = $row['total_deaths'];
    $totalRecovered[] = $row['total_recovered'];
    $activeCases[] = $row['active_cases'];
    $totalTests[] = $row['total_tests'];
    $population[] = $row['population'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Chart Covid</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>

<body>
    <!-- Line Chart -->
    <div style="width: 800px;height: 800px">
        <canvas id="lineChart"></canvas>
    </div>

    <!-- Bar Chart -->
    <div style="width: 800px;height: 800px">
        <canvas id="barChart"></canvas>
    </div>

    <!-- Pie Chart -->
    <div style="width: 800px;height: 800px">
        <canvas id="pieChart"></canvas>
    </div>

    <!-- Doughnut Chart -->
    <div style="width: 800px;height: 800px">
        <canvas id="doughnutChart"></canvas>
    </div>

    <script>

      // Line Chart
var ctxLine = document.getElementById("lineChart").getContext('2d');
var lineChart = new Chart(ctxLine, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($label); ?>,
        datasets: [{
            label: 'Total Cases',
            data: <?php echo json_encode($totalCases); ?>,
            backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna latar belakang
            borderColor: 'rgba(255, 99, 132, 1)', // Warna border
            borderWidth: 1
        }, {
            label: 'Total Deaths',
            data: <?php echo json_encode($totalDeaths); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }, {
            label: 'Total Recovered',
            data: <?php echo json_encode($totalRecovered); ?>,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }, {
            label: 'Active Cases',
            data: <?php echo json_encode($activeCases); ?>,
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }, {
            label: 'Total Tests',
            data: <?php echo json_encode($totalTests); ?>,
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
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

        // Bar Chart
var ctxBar = document.getElementById("barChart").getContext('2d');
var barChart = new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($label); ?>,
        datasets: [{
            label: 'Total Cases',
            data: <?php echo json_encode($totalCases); ?>,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }, {
            label: 'Total Deaths',
            data: <?php echo json_encode($totalDeaths); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }, {
            label: 'Total Recovered',
            data: <?php echo json_encode($totalRecovered); ?>,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }, {
            label: 'Active Cases',
            data: <?php echo json_encode($activeCases); ?>,
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }, {
            label: 'Total Tests',
            data: <?php echo json_encode($totalTests); ?>,
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
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

        // Pie Chart
var ctxPie = document.getElementById("pieChart").getContext('2d');
var pieChart = new Chart(ctxPie, {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($label); ?>,
        datasets: [{
            label: 'population',
            data: <?php echo json_encode($population); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',    // Warna merah muda untuk India
                'rgba(54, 162, 235, 0.6)',    // Warna biru untuk Japan
                'rgba(75, 192, 192, 0.6)',    // Warna hijau untuk S.Korea
                'rgba(255, 206, 86, 0.6)',    // Warna kuning untuk Turkey
                'rgba(153, 102, 255, 0.6)',   // Warna ungu untuk Vietnam
                'rgba(255, 159, 64, 0.6)',    // Warna oranye untuk Taiwan
                'rgba(255, 223, 132, 0.6)',   // Warna kuning muda untuk Iran
                'rgba(54, 210, 235, 0.6)',    // Warna biru cerah untuk Indonesia
                'rgba(75, 192, 237, 0.6)',    // Warna biru laut untuk Malaysia
                'rgba(255, 243, 86, 0.6)'     // Warna kuning cerah untuk Israel
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',      // Warna border merah untuk India
                'rgba(54, 162, 235, 1)',      // Warna border biru untuk Japan
                'rgba(75, 192, 192, 1)',      // Warna border hijau untuk S.Korea
                'rgba(255, 206, 86, 1)',      // Warna border kuning untuk Turkey
                'rgba(153, 102, 255, 1)',     // Warna border ungu untuk Vietnam
                'rgba(255, 159, 64, 1)',      // Warna border oranye untuk Taiwan
                'rgba(255, 223, 132, 1)',     // Warna border kuning muda untuk Iran
                'rgba(54, 210, 235, 1)',      // Warna border biru cerah untuk Indonesia
                'rgba(75, 192, 237, 1)',      // Warna border biru laut untuk Malaysia
                'rgba(255, 243, 86, 1)'       // Warna border kuning cerah untuk Israel
            ],
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


      // Doughnut Chart
var ctxDoughnut = document.getElementById("doughnutChart").getContext('2d');
var doughnutChart = new Chart(ctxDoughnut, {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($label); ?>,
        datasets: [{
            label: 'population',
            data: <?php echo json_encode($population); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',    // Warna merah muda untuk India
                'rgba(54, 162, 235, 0.6)',    // Warna biru untuk Japan
                'rgba(75, 192, 192, 0.6)',    // Warna hijau untuk S.Korea
                'rgba(255, 206, 86, 0.6)',    // Warna kuning untuk Turkey
                'rgba(153, 102, 255, 0.6)',   // Warna ungu untuk Vietnam
                'rgba(255, 159, 64, 0.6)',    // Warna oranye untuk Taiwan
                'rgba(255, 223, 132, 0.6)',   // Warna kuning muda untuk Iran
                'rgba(54, 210, 235, 0.6)',    // Warna biru cerah untuk Indonesia
                'rgba(75, 192, 237, 0.6)',    // Warna biru laut untuk Malaysia
                'rgba(255, 243, 86, 0.6)'     // Warna kuning cerah untuk Israel
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',      // Warna border merah untuk India
                'rgba(54, 162, 235, 1)',      // Warna border biru untuk Japan
                'rgba(75, 192, 192, 1)',      // Warna border hijau untuk S.Korea
                'rgba(255, 206, 86, 1)',      // Warna border kuning untuk Turkey
                'rgba(153, 102, 255, 1)',     // Warna border ungu untuk Vietnam
                'rgba(255, 159, 64, 1)',      // Warna border oranye untuk Taiwan
                'rgba(255, 223, 132, 1)',     // Warna border kuning muda untuk Iran
                'rgba(54, 210, 235, 1)',      // Warna border biru cerah untuk Indonesia
                'rgba(75, 192, 237, 1)',      // Warna border biru laut untuk Malaysia
                'rgba(255, 243, 86, 1)'       // Warna border kuning cerah untuk Israel
            ],
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