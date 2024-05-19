<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<header class="header">
    <a href="adminhome.php">Admin Dashboard</a>
    <div class="logout">
        <a href="logout.php">logout</a>
    </div>
</header>
<?php include('admin_sidebar.php'); ?>

<div class="content">
    <center>
        <h1>Financial Situation</h1>
        <br>
        <canvas id="financialChart" width="300" height="200"></canvas>
    </center>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    
    var financialData = [500000, 600000, 700000, 800000, 900000, 1000000];
    
   
    var ctx = document.getElementById('financialChart').getContext('2d');
    var financialChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Total Cost (BDT)',
                data: financialData,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: { beginAtZero: true },
                    scaleLabel: { display: true, labelString: 'Total Cost (BDT)' }
                }],
                xAxes: [{
                    scaleLabel: { display: true, labelString: 'Months' }
                }]
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        return 'Total cost in ' + data.labels[tooltipItem.index] + ': ' + financialData[tooltipItem.index] + ' BDT';
                    }
                }
            }
        }
    });
</script>
</body>
</html>
