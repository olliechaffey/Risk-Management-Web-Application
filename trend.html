<?php
    session_start();
    include 'includes/dbh.inc.php';
    include 'includes/functions.inc.php';

    if(!isset($_SESSION['useruid']))
    {
        header('Location: login.php');
        exit();
    }
    $username = $_SESSION['useruid'];
    $_SESSION['username'] = $username;
    $teamcode = $_SESSION['teamid'];
    $_SESSION['teamcode'] = $teamcode;
?>

<?php
$query = "SELECT risk, count(*) as number FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' OR risk_owner = '$username' GROUP BY risk";
$result = mysqli_query($conn, $query);
$queryRes = "SELECT business, count(*) as numberRes FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' OR risk_owner = '$username' GROUP BY business";
$resultRes = mysqli_query($conn, $queryRes);
$queryR = "SELECT CAST(riskDate AS DATE) as riskDate, COUNT(CASE WHEN risk = 'Very Low' THEN 1 END) as 'Very Low', COUNT(CASE WHEN risk = 'Low' THEN 1 END) as 'Low', COUNT(CASE WHEN risk = 'Medium' THEN 1 END) as 'Medium', COUNT(CASE WHEN risk = 'High' THEN 1 END) as 'High', COUNT(CASE WHEN risk = 'Very High' THEN 1 END) as 'Very High', COUNT(CASE WHEN risk = 'Extreme' THEN 1 END) as 'Extreme' from risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' OR risk_owner = '$username' GROUP BY CAST(riskDate AS DATE)";
$res = mysqli_query($conn, $queryR);
$queryPDF = "SELECT risk, count(*) as number FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' OR risk_owner = '$username' GROUP BY risk";
$resultPDF = mysqli_query($conn, $queryPDF);
$queryResPDF = "SELECT business, count(*) as numberRes FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' OR risk_owner = '$username' GROUP BY business";
$resultResPDF = mysqli_query($conn, $queryResPDF);
?>

<!doctype html>
<html lang="en">

<head>

    <title>RM Tool v.1.0</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/8c8e392149.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChartRes);
        google.charts.setOnLoadCallback(drawChartPDF);
        google.charts.setOnLoadCallback(drawChartResPDF);
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChartBar);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Risk', 'Number'],

          <?php

            while ($row = mysqli_fetch_array($result)) {
                echo "['".$row["risk"]."', ".$row["number"]."],";
            }

          ?>

        ]);

            var options = {
                //title: 'Risk Pie Chart',
                pieHole: 0.3,
                backgroundColor: 'transparent',
                slices: [{ color: '#F99D9D' }, { color: '#7ABD6A' }, { color: '#DEAC61' }],
                //is3D: true,
                fontSize: ['12'],
                chartArea: { left: 20, top: 20, bottom: 20, width: '100%', height: '100%' },
                legend: { textStyle: { color: 'white' } }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }

        function drawChartRes() {

            var data = google.visualization.arrayToDataTable([
                ['Business', 'Number'],

          <?php

            while ($row = mysqli_fetch_array($resultRes)) {
                echo "['".$row["business"]."', ".$row["numberRes"]."],";
            }

          ?>

        ]);

            var options = {
                //title: 'Risk Pie Chart',
                pieHole: 0.3,
                backgroundColor: 'transparent',
                // slices: [{ color: '#F99D9D' }, { color: '#7ABD6A' }, { color: '#DEAC61' }],
                //is3D: true,
                fontSize: ['12'],
                chartArea: { left: 20, top: 20, bottom: 20, width: '100%', height: '100%' },
                legend: { textStyle: { color: 'white' } }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechartRes'));

            chart.draw(data, options);
        }

      function drawChartBar() {
        var data = google.visualization.arrayToDataTable([
          ['Date' ,'Very Low','Low', 'Medium', 'High', 'Very High', 'Extreme'],
          <?php 
          
          while($data = mysqli_fetch_array($res)){
            $date = $data['riskDate'];
            $vlow = $data['Very Low'];
            $low = $data['Low'];
            $medium = $data['Medium'];
            $high = $data['High'];
            $vhigh = $data['Very High'];
            $extreme = $data['Extreme'];
            ?>
            ['<?php echo $date;?>',<?php echo $vlow;?>,<?php echo $low;?>,<?php echo $medium;?>,<?php echo $high;?>,<?php echo $vhigh;?>,<?php echo $extreme;?>],
          <?php
         } 
         ?>
        ]);

        var options = {
          vAxis: { title: 'Risk Count', viewWindow: { min: -0.25}, },
          height: 500,
          backgroundColor: '#222834',
          chartArea: {
              'backgroundColor': {
                  'fill': '#222834',
                  'opacity': 100,
              },
          },
          bar: {groupWidth: "55%"},
          colors: ['#7ABD6A', '#DEAC61', '#F99D9D'],
          legend: { textStyle: { color: 'white' } }
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      function drawChartPDF() {

var data = google.visualization.arrayToDataTable([
    ['Risk', 'Number'],

<?php

while ($row = mysqli_fetch_array($resultPDF)) {
    echo "['".$row["risk"]."', ".$row["number"]."],";
}

?>

]);

var options = {
    //title: 'Risk Pie Chart',
    pieHole: 0.3,
    backgroundColor: 'transparent',
    slices: [{ color: '#F99D9D' }, { color: '#7ABD6A' }, { color: '#DEAC61' }],
    //is3D: true,
    fontSize: ['12'],
    chartArea: { left: 20, top: 20, bottom: 20, width: '100%', height: '100%' },
    legend: { textStyle: { color: 'black' } }
};

var chart = new google.visualization.PieChart(document.getElementById('piechartPDF'));

chart.draw(data, options);
}

function drawChartResPDF() {

var data = google.visualization.arrayToDataTable([
    ['Business', 'Number'],

<?php

while ($row = mysqli_fetch_array($resultResPDF)) {
    echo "['".$row["business"]."', ".$row["numberRes"]."],";
}

?>

]);

var options = {
    //title: 'Risk Pie Chart',
    pieHole: 0.3,
    backgroundColor: 'transparent',
    // slices: [{ color: '#F99D9D' }, { color: '#7ABD6A' }, { color: '#DEAC61' }],
    //is3D: true,
    fontSize: ['12'],
    chartArea: { left: 20, top: 20, bottom: 20, width: '100%', height: '100%' },
    legend: { textStyle: { color: 'black' } }
};

var chart = new google.visualization.PieChart(document.getElementById('piechartResPDF'));

chart.draw(data, options);
}
    </script>

</head>

<body class="bg-1" style="font-family: Lato, Arial;">

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="bg-2">
            <ul class="sidebar-nav">
                <li class="sidebar-brand ml-2">
                    <a href="#">
                        RM Tool v.1.0
                    </a>
                </li>
                <label class="nav-label">main</label>
                <li>
                    <a href="index.php"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                </li>
                <li>
                    <a href="user-account.php"><i class="fa-solid fa-user"></i> My Account</a>
                </li>
                <label class="nav-label">tools</label>
                <li>
                    <a href="newrisk.php"><i class="fa-solid fa-plus"></i> New Risk</a>
                </li>
                <li>
                    <a href="newasset.php"><i class="fa-solid fa-plus"></i> New Asset</a>
                </li>
                <li>
                    <a href="riskment.php"><i class="fa-solid fa-bolt"></i> Risk Register</a>
                </li>
                <li>
                    <a href="assets.php"><i class="fa-solid fa-computer-mouse"></i> Asset Register</a>
                </li>
                <li>
                    <a href="tasks.php"><i class="fa-solid fa-list-check"></i> Risk Treatment</a>
                </li>
                <li>
                    <a class="active" href="trends.php"><i class="fa-solid fa-arrow-trend-up"></i> Trends</a>
                </li>
                <label class="nav-label">categories</label>
                <li>
                    <a href="low-risk.php"><i class="fa-solid fa-gauge-simple"></i> Low Risk</a>
                </li>
                <li>
                    <a href="medium-risk.php"><i class="fa-solid fa-gauge"></i> Medium Risk</a>
                </li>
                <li>
                    <a href="high-risk.php"><i class="fa-solid fa-gauge-high"></i> High Risk</a>
                </li>
                <label class="nav-label">other</label>
                <li>
                    <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
        
                <h1 class="heading">Trends</h1>
                <span id="live-date" class="hovertext" data-hover="MM/DD/YYYY"></span>
                <div class="sub-heading title-ul">
                    <script src="scripts.js"></script>
                    <ol class="breadcrumb bg-transparent w-50 m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa-sharp fa-solid fa-house"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Trends</li>
                    </ol>
                </div>
        
                <div class="mt-3">
    
                    <input class="btn btn-primary" type="button" onclick='exportPdf()' value="Download Report" class="downloadButton">
        
                </div>
        
                <div class="row mt-3">
                    <div class="col-xl col-md-6">
                        <div class="card bg-2-border text-white mb-4 mt-2">
                            <div class="card-body" style="border-width: 1rem; border-bottom: solid #5cb85c; border-bottom-left-radius: 2%; border-bottom-right-radius: 2%;">Low Risks
                                <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND risk IN('Very Low', 'Low')) UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND risk IN('Very Low', 'Low'))";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);

                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> No Data </h2>';
                                                    }
                                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl col-md-6">
                        <div class="card bg-2-border text-white mb-4 mt-2">
                            <div class="card-body" style="border-width: 1rem; border-bottom: solid #f0ad4e; border-bottom-left-radius: 2%; border-bottom-right-radius: 2%;">Medium Risks
                                <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND risk='Medium') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND risk='Medium')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);

                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> No Data </h2>';
                                                    }
                                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl col-md-6">
                        <div class="card bg-2-border text-white mb-4 mt-2">
                            <div class="card-body" style="border-width: 1rem; border-bottom: solid #d9534f; border-bottom-left-radius: 2%; border-bottom-right-radius: 2%;">High Risks
                                <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND risk IN('Very High', 'High', 'Extreme')) UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND risk IN('Very High', 'High', 'Extreme'))";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);

                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> No Data </h2>';
                                                    }
                                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl col-md-6">
                        <div class="card bg-2-border text-white mb-4 mt-2">
                            <div class="card-body" style="border-width: 1rem; border-bottom: solid #0275d8; border-bottom-left-radius: 2%; border-bottom-right-radius: 2%;">Total Risk Count
                                <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);

                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> No Data </h2>';
                                                    }
                                                ?>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- /#page-content-wrapper -->
                    <div class="content-row">
                        <div class="row mt-4">
                            <div class="col">
                                <div class="card bg-2-border text-white">
                                    <div class="card-header">
                                        <h3>Risk Wheel</h3>
                                    </div>
                                    <div id="piechart" style="width: 100%; height: 200px;"></div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-2-border text-white">
                                    <div class="card-header">
                                        <h3>Heatmap</h3>
                                    </div>
                                    <div class="container d-flex justify-content-center" style="width: 100%; height: 200px;">
                                        <div class="grid justify-content-center mt-1">
                                            <div class="row" style="width: 300px; height: 38px;">
                                                <div class="col d-flex justify-content-center align-items-center" id="1"
                                                    style="background-color: #DBD06D;">
                                                    <a href="#">
                                                        <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very Low' AND likelihood='Very Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very Low' AND likelihood='Very Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                    </a>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="2"
                                                    style="background-color: #F3BE6D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Low' AND likelihood='Very Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Low' AND likelihood='Very Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="3"
                                                    style="background-color: #F36969;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Medium' AND likelihood='Very Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Medium' AND likelihood='Very Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="4"
                                                    style="background-color: #DB3F3F;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='High' AND likelihood='Very Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='High' AND likelihood='Very Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="5"
                                                    style="background-color: #FF0000;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very High' AND likelihood='Very Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very High' AND likelihood='Very Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="row" style="width: 300px; height: 38px;">
                                                <div class="col d-flex justify-content-center align-items-center" id="1"
                                                    style="background-color: #A9BC5F;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very Low' AND likelihood='Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very Low' AND likelihood='Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="2"
                                                    style="background-color: #DBD06D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Low' AND likelihood='Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Low' AND likelihood='Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="3"
                                                    style="background-color: #F3BE6D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Medium' AND likelihood='Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Medium' AND likelihood='Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="4"
                                                    style="background-color: #F36969;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='High' AND likelihood='Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='High' AND likelihood='Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="5"
                                                    style="background-color: #DB3F3F;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very High' AND likelihood='Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very High' AND likelihood='Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="row" style="width: 300px; height: 38px;">
                                                <div class="col d-flex justify-content-center align-items-center" id="1"
                                                    style="background-color: #69CD59;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very Low' AND likelihood='Possible') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very Low' AND likelihood='Possible')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="2"
                                                    style="background-color: #A9BC5F;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Low' AND likelihood='Possible') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Low' AND likelihood='Possible')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="3"
                                                    style="background-color: #DBD06D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Medium' AND likelihood='Possible') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Medium' AND likelihood='Possible')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="4"
                                                    style="background-color: #F3BE6D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='High' AND likelihood='Possible') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='High' AND likelihood='Possible')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="5"
                                                    style="background-color: #F36969;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very High' AND likelihood='Possible') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very High' AND likelihood='Possible')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="row" style="width: 300px; height: 38px;">
                                                <div class="col d-flex justify-content-center align-items-center" id="1"
                                                    style="background-color: #399B29;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very Low' AND likelihood='Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very Low' AND likelihood='Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="2"
                                                    style="background-color: #69CD59;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Low' AND likelihood='Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Low' AND likelihood='Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="3"
                                                    style="background-color: #A9BC5F;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Medium' AND likelihood='Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Medium' AND likelihood='Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="4"
                                                    style="background-color: #DBD06D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='High' AND likelihood='Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='High' AND likelihood='Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="5"
                                                    style="background-color: #F3BE6D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very High' AND likelihood='Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very High' AND likelihood='Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="row" style="width: 300px; height: 38px;">
                                                <div class="col d-flex justify-content-center align-items-center" id="1"
                                                    style="background-color: #05691B;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very Low' AND likelihood='Very Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very Low' AND likelihood='Very Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="2"
                                                    style="background-color: #399B29;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Low' AND likelihood='Very Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Low' AND likelihood='Very Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="3"
                                                    style="background-color: #69CD59;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Medium' AND likelihood='Very Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Medium' AND likelihood='Very Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="4"
                                                    style="background-color: #A9BC5F;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='High' AND likelihood='Very Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='High' AND likelihood='Very Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="5"
                                                    style="background-color: #DBD06D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very High' AND likelihood='Very Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very High' AND likelihood='Very Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-2-border text-white">
                                    <div class="card-header">
                                        <h3>Business Areas At Risk</h3>
                                    </div>
                                    <div id="piechartRes" style="width: 100%; height: 200px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <div class="card h-100 bg-2-border text-white">
                                    <div class="card-header">
                                        <h3>Overtime</h3>
                                    </div>
                                    <div id="chart_div" style="width: 100%; height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    <!-- /#wrapper -->

    
    <!-- /#pdf -->
    <div class="hidden" hidden>
        
        <div class="mt-4">
        
        <input type="button" onclick='exportPdf()' value="Download Report" class="downloadButton">
    
    </div>

    <div id="exportPdf" style="color: black;">

            <?php
                    $select = "SELECT * FROM users WHERE usersUid = '$username'";
                    $result = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_array($result)) {
            ?>
        
            <div class="head">
            
                <h3 class="mb-3">RM Tool V.1.0</h3>
                <p>Date:
                    <?php echo date("h:i:sa"); ?>
                </p>
                <p>Users Name:
                    <?php echo decryptthis($row['usersName'], $key) ?>
                </p>
                <p>Team Code:
                    <?php echo $_SESSION['teamcode'] ?>
                </p>
                <p>Email:
                    <?php echo decryptthis($row['usersEmail'], $key) ?>
                </p>
                <p>Location:
                    <?php if($row['city'] == true){
                        echo $row['city'];
                    }else{
                        echo 'n/a';
                    } ?>
                </p>
            
            </div>

            <?php } ?>

            <div class="heatmap">
                
                <h5 class="mt-5">Heatmap/Risk Register:</h5>

                <div class="heat-map">
                    <small style="font-style: italic;">This heatmap/risk register helps track potential risks across the company, comparing the likelihood x impact of the risk.</small>
                    
                    <div class="grid justify-content-center mt-1">
                                            <div class="row" style="width: 300px; height: 38px;">
                                                <div class="col d-flex justify-content-center align-items-center" id="1"
                                                    style="background-color: #DBD06D;">
                                                    <a href="#">
                                                        <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very Low' AND likelihood='Very Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very Low' AND likelihood='Very Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                    </a>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="2"
                                                    style="background-color: #F3BE6D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Low' AND likelihood='Very Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Low' AND likelihood='Very Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="3"
                                                    style="background-color: #F36969;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Medium' AND likelihood='Very Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Medium' AND likelihood='Very Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="4"
                                                    style="background-color: #DB3F3F;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='High' AND likelihood='Very Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='High' AND likelihood='Very Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="5"
                                                    style="background-color: #FF0000;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very High' AND likelihood='Very Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very High' AND likelihood='Very Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="row" style="width: 300px; height: 38px;">
                                                <div class="col d-flex justify-content-center align-items-center" id="1"
                                                    style="background-color: #A9BC5F;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very Low' AND likelihood='Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very Low' AND likelihood='Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="2"
                                                    style="background-color: #DBD06D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Low' AND likelihood='Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Low' AND likelihood='Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="3"
                                                    style="background-color: #F3BE6D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Medium' AND likelihood='Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Medium' AND likelihood='Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="4"
                                                    style="background-color: #F36969;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='High' AND likelihood='Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='High' AND likelihood='Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="5"
                                                    style="background-color: #DB3F3F;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very High' AND likelihood='Likely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very High' AND likelihood='Likely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="row" style="width: 300px; height: 38px;">
                                                <div class="col d-flex justify-content-center align-items-center" id="1"
                                                    style="background-color: #69CD59;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very Low' AND likelihood='Possible') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very Low' AND likelihood='Possible')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="2"
                                                    style="background-color: #A9BC5F;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Low' AND likelihood='Possible') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Low' AND likelihood='Possible')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="3"
                                                    style="background-color: #DBD06D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Medium' AND likelihood='Possible') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Medium' AND likelihood='Possible')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="4"
                                                    style="background-color: #F3BE6D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='High' AND likelihood='Possible') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='High' AND likelihood='Possible')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="5"
                                                    style="background-color: #F36969;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very High' AND likelihood='Possible') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very High' AND likelihood='Possible')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="row" style="width: 300px; height: 38px;">
                                                <div class="col d-flex justify-content-center align-items-center" id="1"
                                                    style="background-color: #399B29;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very Low' AND likelihood='Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very Low' AND likelihood='Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="2"
                                                    style="background-color: #69CD59;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Low' AND likelihood='Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Low' AND likelihood='Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="3"
                                                    style="background-color: #A9BC5F;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Medium' AND likelihood='Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Medium' AND likelihood='Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="4"
                                                    style="background-color: #DBD06D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='High' AND likelihood='Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='High' AND likelihood='Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="5"
                                                    style="background-color: #F3BE6D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very High' AND likelihood='Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very High' AND likelihood='Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="row" style="width: 300px; height: 38px;">
                                                <div class="col d-flex justify-content-center align-items-center" id="1"
                                                    style="background-color: #05691B;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very Low' AND likelihood='Very Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very Low' AND likelihood='Very Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="2"
                                                    style="background-color: #399B29;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Low' AND likelihood='Very Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Low' AND likelihood='Very Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="3"
                                                    style="background-color: #69CD59;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Medium' AND likelihood='Very Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Medium' AND likelihood='Very Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="4"
                                                    style="background-color: #A9BC5F;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='High' AND likelihood='Very Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='High' AND likelihood='Very Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center" id="5"
                                                    style="background-color: #DBD06D;">
                                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND impact='Very High' AND likelihood='Very Unlikely') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND impact='Very High' AND likelihood='Very Unlikely')";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
                    
                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> </h2>';
                                                    }
                                                ?>
                                                </div>
                                        </div>
                    </div>
            </div>

            <div class="risk-total">
            
                <h5 class="mt-5">Total Risks Identified:</h5>

                <?php
                    $select = "(SELECT COUNT(risk) AS risk FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND risk IN ('Very Low', 'Low')) UNION (SELECT COUNT(risk) AS risk FROM risk_assessment WHERE risk_owner = '$username' AND risk IN ('Very Low', 'Low'))";
                    $result = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_array($result)) {
                ?>

                <p>Low Risks:
                    <?php echo $row['risk']; ?>
                </p>

                <?php } ?>

                <?php
                    $select = "(SELECT COUNT(risk) AS risk FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND risk='Medium') UNION (SELECT COUNT(risk) AS risk FROM risk_assessment WHERE risk_owner = '$username' AND risk='Medium')";
                    $result = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_array($result)) {
                ?>

                <p>Medium Risks:
                    <?php echo $row['risk']; ?>
                </p>

                <?php } ?>

                <?php
                    $select = "(SELECT COUNT(risk) AS risk FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND risk IN ('Very High', 'High', 'Extreme')) UNION (SELECT COUNT(risk) AS risk FROM risk_assessment WHERE risk_owner = '$username' AND risk IN ('Very High', 'High', 'Extreme'))";
                    $result = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_array($result)) {
                ?>

                <p>High Risks:
                    <?php echo $row['risk']; ?>
                </p>

                <?php } ?>

                <?php
                    $select = "(SELECT COUNT(risk) AS risk FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '') UNION (SELECT COUNT(risk) AS risk FROM risk_assessment WHERE risk_owner = '$username')";
                    $result = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_array($result)) {
                ?>

                <p>Total Risks:
                    <?php echo $row['risk']; ?>
                </p>

                <?php } ?>

            </div>

        </br>
        </br>
        </br>
        </br>
        </br>
        </br>

            <div class="graphs">
                
                <h5 class="mt-5">Graphical Data:</h5>

                <div class="risk-wheel">

                    <p>Risk Wheel:</p>
                    <small style="font-style: italic;">This data presents the percentage of risk status' across the total risks identified.</small>
                    
                    <div class="mt-2" id="piechartPDF" style="width: 25%; height: 200px;"></div>    
                    
                </div>
            </br>
                <div class="business-wheel">
                
                    <p>Business Areas At Risk:</p>
                    <small style="font-style: italic;">This data presents the percentage of risks across the business that are related to specific business areas.</small>
                
                    <div class="mt-2" id="piechartResPDF" style="width: 25%; height: 200px;"></div>
                
                </div>
                
            </div>
    
    </div>    
        
    </div>

    <script>

        var element = document.getElementById('exportPdf');
        var opt = {
            margin: 1,
            filename: 'trends.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2,
                dpi: 300
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        };

        function exportPdf() {
            html2pdf().set(opt).from(element).save();
        }

    </script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>


</body>

</html>