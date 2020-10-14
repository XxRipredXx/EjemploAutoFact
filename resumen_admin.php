<!DOCTYPE html>

<?php

session_start();
 
if(!isset($_SESSION['user_id'])){

    header('Location: login.php');    
    exit;
    
} else {
    
    if($_SESSION['tipo_usuario'] != "admin"){
        header('Location: login.php');
        exit;
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resumen admin</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body>
    <h1>Grafico de Torta</h1>
</body>

<canvas id="oilChart" width="600" height="400"></canvas>

<script>

var oilCanvas = document.getElementById("oilChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var oilData = {
    labels: [
        "Si",
        "No",
        "Mas o menos"
    ],
    datasets: [
        {
            data: [50,50,25],
            backgroundColor: [
                "#6384FF",
                "#FF6384",
                "#339966"
            ]
        }]
};

var pieChart = new Chart(oilCanvas, {
  type: 'pie',
  data: oilData
});

</script>
</html>