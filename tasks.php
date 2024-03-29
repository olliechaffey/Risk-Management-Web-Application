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
                    <a class="active" href="tasks.php"><i class="fa-solid fa-list-check"></i> Risk Treatment</a>
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
        
                <h1 class="heading">Risk Treatment</h1>
                <span id="live-date" class="hovertext" data-hover="MM/DD/YYYY"></span>
                <div class="sub-heading title-ul">
                    <script src="scripts.js"></script>
                    <ol class="breadcrumb bg-transparent w-50 m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa-sharp fa-solid fa-house"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Risk Treatment</li>
                    </ol>
                </div>
        
                <div class="row">
                    <div class="col-xl col-md-6">
                        <div class="card bg-2-border text-white mb-4 mt-2">
                            <div class="card-body" style="border-width: 1rem; border-bottom: solid #f0ad4e; border-bottom-left-radius: 2%; border-bottom-right-radius: 2%;"><p>In Review</p>
                                <?php
                                        $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                    
                                        $dash_riskcount_query = "SELECT * from risk_assessment where status='In Review'";
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
                            <div class="card-body" style="border-width: 1rem; border-bottom: solid #d9534f; border-bottom-left-radius: 2%; border-bottom-right-radius: 2%;"><p>Mitigate</p>
                                <?php
                                        $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                    
                                        $dash_riskcount_query = "SELECT * from risk_assessment where status='Mitigate'";
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
                            <div class="card-body" style="border-width: 1rem; border-bottom: solid #0275d8; border-bottom-left-radius: 2%; border-bottom-right-radius: 2%;"><p>Transfer</p>
                                <?php
                                        $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                    
                                        $dash_riskcount_query = "SELECT * from risk_assessment where status='Transfer'";
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
                            <div class="card-body" style="border-width: 1rem; border-bottom: solid #5cb85c; border-bottom-left-radius: 2%; border-bottom-right-radius: 2%;"><p>Done</p>
                                <?php
                                        $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                    
                                        $dash_riskcount_query = "SELECT * from risk_assessment where status='Done'";
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

                <div class="top-button mt-4">
                    <p>Update Risk Status:</p>
                    <form class="form-inline mt-3" id="insert-form" method="post" action="action_treat.php">
                        <div class="mr-2">
                            <input class="form-control bg-2-border text-white" type="text" name="id" required="" placeholder="Enter Risk ID...">
                            <select class="form-control bg-2-border text-white" type="text" name="status" required=""><option selected disabled value="">Select</option><option value="In Review">In Review</option><option value="Mitigate">Mitigate</option><option value="Transfer">Transfer</option><option value="Done">Done</option></select>
                        </div>
                        <button class="btn btn-success" type="submit" name="submit">Update</button>
                    </form>
                </div>

                <table class="my-table mt-5">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">ID</th>
                        <th>Task/Treatment</th>
                        <th style="width: 700px;">Mitigation Notes</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Risk Level</th>
                        <th class="text-center">Days Left</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                    <?php
                        $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");

                        $select = "(SELECT *, abs(DATEDIFF(NOW(), expDate)) as dayLeft FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '') UNION (SELECT *, abs(DATEDIFF(NOW(), expDate)) as expDate FROM risk_assessment WHERE risk_owner = '$username') ORDER BY CASE WHEN risk = 'High' THEN 1 WHEN risk = 'Medium' THEN 2 WHEN risk = 'Low' THEN 3 ELSE 4 END ASC";
                        $result = mysqli_query($conn, $select);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tbody>
                    <tr>
                        <td class="text-center"><?php echo $row['id']; ?></td>
                        <td><?php echo $row['task']; ?></td>
                        <td style="width: 400px; word-wrap: break-word;"><?php echo $row['mitigation']; ?></td>
                        <td class="table-center">
                            <p class="<?php if($row['status'] == 'In Review'){
                            echo 'text-center alert-orange';
                        }elseif($row['status'] == 'Mitigate'){
                            echo 'text-center alert-red';
                        }elseif($row['status'] == 'Transfer'){
                            echo 'text-center alert-blue';
                        }elseif($row['status'] == 'Done'){
                            echo 'text-center alert-green';
                        }else{
                            echo 'text-center status-s';
                        }
                        ?>"><?php echo $row['status']; ?></p></td>
                        <td><p class="<?php if($row['risk'] == 'High'){
                            echo 'text-center alert-red';
                        }elseif ($row['risk'] == 'Medium'){
                            echo 'text-center alert-orange';
                        }elseif ($row['risk'] == 'Low'){
                            echo 'text-center alert-green';
                        }else{
                            echo 'text-center status-s';
                        }
                        ?>"><?php echo $row['risk']; ?></p></td>
                        <td id="exp" class="text-center">
                        <?php
                        
                        $date = date('Y-m-d');

                        if($row['expDate'] > $date){
                            echo $row['dayLeft'];
                        }else if($row['expDate'] = $date){
                            echo '<span style="color: red;">Expired</span>';
                        }else{
                            echo '<span style="color: red;">Expired</span>';
                        }
                        
                        ?></td>
                        <td>
                            <a class="btn btn-danger my-3" href="action_delete_task.php?id=<?php echo $row['id']; ?>">
                              Delete
                            </a>
                          </td>
                    </tr>
                </tbody>
        
                    <?php 
                        }
                    ?>
        
                </table>
        
            </div>
        </div>
        <!-- /#page-content-wrapper -->

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