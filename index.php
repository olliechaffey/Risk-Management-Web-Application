<?php
    session_start();
    include 'includes/dbh.inc.php';
    include "includes/functions.inc.php";

    if(!isset($_SESSION['useruid']))
    {
        header('Location: login.php');
        exit();
    }

    $username = $_SESSION['useruid'];
    $_SESSION['username'] = $username;
    $teamcode = $_SESSION['teamid'];
    $_SESSION['teamcode'] = $teamcode;
    $id = $_SESSION['userid'];
    $_SESSION['id'] = $id;
?>

<?php
    $query = "SELECT risk, count(*) as number FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' OR risk_owner = '$username' GROUP BY risk";
    $result = mysqli_query($conn, $query);
    $queryRes = "SELECT status, count(*) as numberRes FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' OR risk_owner = '$username' GROUP BY status";
    $resultRes = mysqli_query($conn, $queryRes);
    $queryR = "SELECT CAST(riskDate AS DATE) as riskDate, COUNT(CASE WHEN risk = 'Very Low' THEN 1 END) as 'Very Low', COUNT(CASE WHEN risk = 'Low' THEN 1 END) as 'Low', COUNT(CASE WHEN risk = 'Medium' THEN 1 END) as 'Medium', COUNT(CASE WHEN risk = 'High' THEN 1 END) as 'High', COUNT(CASE WHEN risk = 'Very High' THEN 1 END) as 'Very High', COUNT(CASE WHEN risk = 'Extreme' THEN 1 END) as 'Extreme' from risk_assessment GROUP BY CAST(riskDate AS DATE)";
    $res = mysqli_query($conn, $queryR);
    ?>

<!doctype html>
<html lang="en">

<head>

    <title>RM Tool v.1.0</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.scss">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link href=' http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>

    <script src="https://kit.fontawesome.com/8c8e392149.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChartRes);
        google.charts.setOnLoadCallback(drawChartLine);

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
                slices: [{ color: '#d9534f' }, { color: '#5cb85c' }, { color: '#f0ad4e' }],
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
                ['Status', 'Number'],

          <?php

            while ($row = mysqli_fetch_array($resultRes)) {
                echo "['".$row["status"]."', ".$row["numberRes"]."],";
            }

          ?>

        ]);

            var options = {
                //title: 'Risk Pie Chart',
                pieHole: 0.3,
                backgroundColor: 'transparent',
                slices: [{ color: '#f0ad4e' }, { color: '#d9534f' }, { color: '#0275d8' }],
                //is3D: true,
                fontSize: ['12'],
                chartArea: { left: 20, top: 20, bottom: 20, width: '100%', height: '100%' },
                legend: { textStyle: { color: 'white' } }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechartRes'));
            chart.draw(data, options);
        }

      function drawChartLine() {

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
        backgroundColor: '#222834',
        vAxis: { title: 'Risk Count', viewWindow: { min: -0.25}, },
        chartArea: {
              'backgroundColor': {
                  'fill': '#222834',
                  'opacity': 100
              },
          },
        width: 775,
        height: 250
      };

      var chart = new google.charts.Line(document.getElementById('lineChart'));

      chart.draw(data, google.charts.Line.convertOptions(options));
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
                    <a class="active" href="index.php"><i class="fa-solid fa-gauge"></i> Dashboard</a>
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
                    <a href="trends.php"><i class="fa-solid fa-arrow-trend-up"></i> Trends</a>
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

                <h1 class="heading">Dashboard</h1>
                <span id="live-date" class="hovertext" data-hover="MM/DD/YYYY"></span>
                <div class="sub-heading title-ul">
                    <script src="scripts.js"></script>
                    <ol class="breadcrumb bg-transparent w-50 m-0 p-0">
                        <li class="breadcrumb-item"><a href="#"><i class="fa-sharp fa-solid fa-house"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>

                <div class="card bg-primary mt-4">
                    <div class="card-body">
                        <i class="fa-solid fa-circle-info"></i> For more information about the web application please view the read me file <a href="https://github.com/olliechaffey/Final-Year-Project/blob/master/README.md" style="color: white;" target="_blank">here</a>.
                    </div>
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
            </div>
            <div class="container-fluid">
                <div class="row mt-1">
                        <div class="col">
                            <div class="card bg-2-border text-white">
                                <div class="card-header">
                                    <h3>Risk Wheel</h3>
                                </div>
                                    <div id="piechart" style="width: 100%; height: 200px;"></div>
                                <div class="card-footer d-flex align-items-ceneter justify-content-between">
                                    <a class="small text-white" href="assets.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
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
                                        echo '<a href="medium-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="medium-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="high-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="high-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="high-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="medium-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="medium-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="medium-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="high-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="high-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="low-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="medium-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="medium-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="medium-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="high-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="low-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="low-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="medium-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="medium-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="medium-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="low-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="low-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="low-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="medium-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
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
                                        echo '<a href="medium-risk.php" style="text-decoration: none; color: white;"><h2 class="mb-0"> '.$riskcount_total.' </h2></a>';
                                    }else{
                                        echo '<h2 class="mb-0"> </h2>';
                                    }
                                ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-ceneter justify-content-between">
                                <a class="small text-white" href="assets.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                        </div>
                    <div class="col">
                            <div class="card bg-2-border text-white">
                                <div class="card-header">
                                <h3>Response</h3>
                            </div>
                            <div id="piechartRes" style="width: 100%; height: 200px;"></div>
                            <div class="card-footer d-flex align-items-ceneter justify-content-between">
                                <a class="small text-white" href="assets.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                            </div>
                        </div>
                </div>
                <div class="row mt-4 mb-4">
                    <div class="col col-lg-3">
                        <div class="card bg-2-border text-white">
                            <div class="card-header">
                                <h3>Total Assets</h3>
                            </div>
                                        <div class="card-body" style="height: 250px;">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center bg-2">
                                                    Hardware
                                                    <?php
                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                
                                    $dash_riskcount_query = "(SELECT * FROM company_assets WHERE category='Hardware') UNION (SELECT * FROM company_assets WHERE category='Hardware')";
                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
    
                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                        echo '<span class="badge badge-primary badge-pill" style="width: 75px;"> '.$riskcount_total.' Total</span>';
                                    }else{
                                        echo '<span class="badge badge-primary badge-pill" style="width: 75px;">0 Total</span>';
                                    }
                                ?>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center bg-2">
                                                    Software
                                                    <?php
                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                
                                    $dash_riskcount_query = "(SELECT * FROM company_assets WHERE category='Software') UNION (SELECT * FROM company_assets WHERE category='Software')";
                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
    
                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                        echo '<span class="badge badge-primary badge-pill" style="width: 75px;"> '.$riskcount_total.' Total</span>';
                                    }else{
                                        echo '<span class="badge badge-primary badge-pill" style="width: 75px;">0 Total</span>';
                                    }
                                ?>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center bg-2">
                                                    Networking
                                                    <?php
                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                
                                    $dash_riskcount_query = "(SELECT * FROM company_assets WHERE category='Networking') UNION (SELECT * FROM company_assets WHERE category='Networking')";
                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
    
                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                        echo '<span class="badge badge-primary badge-pill" style="width: 75px;"> '.$riskcount_total.' Total</span>';
                                    }else{
                                        echo '<span class="badge badge-primary badge-pill" style="width: 75px;">0 Total</span>';
                                    }
                                ?>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center bg-2">
                                                    Non-IT Asset
                                                    <?php
                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                
                                    $dash_riskcount_query = "(SELECT * FROM company_assets WHERE category='Non-IT Asset') UNION (SELECT * FROM company_assets WHERE category='Non-IT Asset')";
                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);
    
                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                        echo '<span class="badge badge-primary badge-pill" style="width: 75px;"> '.$riskcount_total.' Total</span>';
                                    }else{
                                        echo '<span class="badge badge-primary badge-pill" style="width: 75px;">0 Total</span>';
                                    }
                                ?>
                                                </li>
                                            </ul>
                                        </div>
                            <div class="card-footer d-flex align-items-ceneter justify-content-between">
                                <a class="small text-white" href="assets.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                            <div class="card bg-2-border text-white">
                                <div class="card-header">
                                <h3>Risk Health</h3>
                            </div>
                            <div id="lineChart" style="width: 100%; height: 250px;"></div>
                            <div class="card-footer d-flex align-items-ceneter justify-content-between">
                                <a class="small text-white" href="assets.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                            </div>
                        </div>
                    <div class="col col-lg-3">
                        <div class="card bg-2-border text-white">
                            <div class="card-header">
                                <h3>Notifications</h3>
                            </div>
                            
                            <div class="card-body" style="height: 250px;">
                                <ul class="list-group">
                                                    <?php
                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                
                                    $select1 = "SELECT * FROM risk_assessment WHERE teamId = '$teamcode' ORDER BY CASE WHEN risk = 'Extreme' THEN '1' WHEN risk = 'Very High' THEN '2' WHEN risk = 'High' THEN '3' WHEN risk = 'Medium' THEN '4' WHEN risk = 'Low' THEN '5' WHEN risk = 'Very Low' THEN '6' ELSE risk END";
                                    $result1 = mysqli_query($conn, $select1);
                                    $counter = 0;
                                    $max = 4;
    
                                    while ($row = mysqli_fetch_array($result1) and ($counter < $max)) { 
                                        echo '<li class="list-group-item d-flex justify-content-between align-items-center bg-2"> '.$row['title'].' <span class="badge badge-primary badge-pill" style="width: 75px;"> '.$row['risk'].' </span> </li>';
                                        $counter++;
                                    }
                                ?>
                                </ul>
                            </div>

                            <div class="card-footer d-flex align-items-ceneter justify-content-between">
                                <a class="small text-white" href="riskment.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /#page-content-wrapper -->
            <footer class="bg-2 text-center text-white footer">
                <!-- Copyright -->
                <div class="text-center pt-3 bg-1">
                    © 2023 Copyright: Oliver Chaffey
                </div>
                <!-- Copyright -->
            </footer>

        </div>
    </div>
    <!-- /#wrapper -->

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