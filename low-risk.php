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

<!doctype html>
<html lang="en">

<head>

    <title>RM Tool v.1.0</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/8c8e392149.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
    
            var html = '<td><input class="form-control" type="text" name="title" required=""></td><td><input class="form-control" type="text" name="status" required=""></td><td><input class="form-control" type="text" name="task" required=""></td><td><select class="form-control" name="impact" required=""><option selected disabled value="">Select</option><option value="Low">Low</option><option value="Medium">Medium</option><option value="High">High</option></select></td><td><select class="form-control" name="likelihood" required=""><option selected disabled value="">Select</option><option value="Low">Low</option><option value="Medium">Medium</option><option value="High">High</option></select></td><td><select class="form-control" name="risk" required=""><option value="low">Low</option><option value="medium">Medium</option><option value="high">High</option></select></td><td><input class="form-control" type="text" name="risk_owner" required=""></td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>';
    
            var max = 4;
            var x = 1;
    
            $('#add').click(function(){
                if(x <= max){
                    $("#table_field").append(html);
                    x++;
                }
            });
    
            $('#table_field').on('click','#remove',function(){
                $(this).closest('tr').remove();
                x--;
            });
        });
    
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
                    <a href="trends.php"><i class="fa-solid fa-arrow-trend-up"></i> Trends</a>
                </li>
                <label class="nav-label">categories</label>
                <li>
                    <a class="active" href="low-risk.php"><i class="fa-solid fa-gauge-simple"></i> Low Risk</a>
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

                <h1 class="heading">Low Risk Vulnerabilities</h1>
                <span id="live-date" class="hovertext" data-hover="MM/DD/YYYY"></span>
                <div class="sub-heading title-ul">
                    <script src="scripts.js"></script>
                    <ol class="breadcrumb bg-transparent w-50 m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa-sharp fa-solid fa-house"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Low Risk Vulnerabilities</li>
                    </ol>
                </div>

                <div>
                    <div class="card bg-2-border text-white mt-3">
                        <div class="card-body" style="border-width: 1rem; border-bottom: solid #5cb85c; border-bottom-left-radius: 1%; border-bottom-right-radius: 1%;">Current total low risk:
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

                <table class="my-table mt-4">
                    <thead>
                    <tr>
                        <th class="text-center" width="5%" scope="col">ID</th>
                        <th width="20%" scope="col">Title</th>
                        <th class="text-center" scope="col">Status</th>
                        <th width="20%" scope="col">Task</th>
                        <th class="text-center" scope="col">Impact</th>
                        <th class="text-center" scope="col">Likelihood</th>
                        <th class="text-center" scope="col">Risk</th>
                        <th scope="col">Risk Owner</th>
                    </tr>
                </thead>
                    <?php
                        $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                    
                        $select = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '' AND risk IN('Very Low', 'Low')) UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username' AND risk IN('Very Low', 'Low'))";
                        $result = mysqli_query($conn, $select);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
        
                    <tr>
                        <th class="text-center" scope="col"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['title']; ?></td>
                        <td class="text-center"><?php echo $row['status']; ?></td>
                        <td><?php echo $row['task']; ?></td>
                        <td class="text-center"><?php echo $row['impact']; ?></td>
                        <td class="text-center"><?php echo $row['likelihood']; ?></td>
                        <td class="text-center"><?php echo $row['risk']; ?></td>
                        <td><?php echo $row['risk_owner']; ?></td>
                    </tr>
        
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