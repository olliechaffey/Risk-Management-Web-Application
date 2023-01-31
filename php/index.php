<!doctype html>
<html lang="en">

<head>

    <title>RM Tool v.1.0</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/8c8e392149.js" crossorigin="anonymous"></script>

</head>

<body class="bg-1">

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="bg-2">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        RM Tool v.1.0
                    </a>
                </li>
                <label class="nav-label">main</label>
                <li>
                    <a class="active" href="index.php">Dashboard</a>
                </li>
                <label class="nav-label">tools</label>
                <li>
                    <a href="riskment.php">Risk Assessment</a>
                </li>
                <li>
                    <a href="assets.php">Assets</a>
                </li>
                <li>
                    <a href="tasks.php">Tasks</a>
                </li>
                <label class="nav-label">categories</label>
                <li>
                    <a href="low-risk.php">Low Risk</a>
                </li>
                <li>
                    <a href="medium-risk.php">Medium Risk</a>
                </li>
                <li>
                    <a href="high-risk.php">High Risk</a>
                </li>
                <label class="nav-label">other</label>
                <li>
                    <a href="user-account.php">My Account</a>
                </li>
                <li>
                    <a href="admin-portal.php">Admin Portal</a>
                </li>
                <li>
                    <a href="support.php">Support</a>
                </li>
                <li>
                    <a href="settings.php">Settings</a>
                </li>
                <li>
                    <a href="#">Exit</a>
                </li>
                <label class="nav-label">Reference</label>
                <li>
                    <a href="https://github.com/olliechaffey" target="_blank">GitHub</a>
                </li>
                <li>
                    <a href="#">Dissertation</a>
                </li>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">

                <h1 class="heading">Dashboard</h1>
                <span id="live-date" class="hovertext" data-hover="MM/DD/YYYY"></span>
                <script src="scripts.js"></script>
                <h6 class="sub-heading title-ul">Here’s an overview of the business right now.</h6>

                    <div class="row">
                        <div class="col-xl col-md-6">
                            <div class="card bg-dark text-white mb-4 mt-2">
                                <div class="card-body">Low Risks
                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "SELECT * from risk_assessment where risk='Low'";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);

                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> No Data </h2>';
                                                    }
                                                ?>
                                </div>
                                <div class="card-footer d-flex align-items-ceneter justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card bg-dark text-white mb-4 mt-2">
                                <div class="card-body">Medium Risks
                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "SELECT * from risk_assessment where risk='Medium'";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);

                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> No Data </h2>';
                                                    }
                                                ?>
                                </div>
                                <div class="card-footer d-flex align-items-ceneter justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card bg-dark text-white mb-4 mt-2">
                                <div class="card-body">High Risks
                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "SELECT * from risk_assessment where risk='High'";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);

                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> No Data </h2>';
                                                    }
                                                ?>
                                </div>
                                <div class="card-footer d-flex align-items-ceneter justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card bg-dark text-white mb-4 mt-2">
                                <div class="card-body">Total Risk Count
                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "SELECT * from risk_assessment";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);

                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> No Data </h2>';
                                                    }
                                                ?>
                                </div>
                                <div class="card-footer d-flex align-items-ceneter justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card bg-dark text-white mb-4 mt-2">
                                <div class="card-body">Total Assets
                                    <?php
                                                    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                                                
                                                    $dash_riskcount_query = "SELECT * from risk_assessment";
                                                    $dash_riskcount_query_run = mysqli_query($conn, $dash_riskcount_query);

                                                    if($riskcount_total = mysqli_num_rows($dash_riskcount_query_run)){
                                                        echo '<h2 class="mb-0"> '.$riskcount_total.' </h2>';
                                                    }else{
                                                        echo '<h2 class="mb-0"> No Data </h2>';
                                                    }
                                                ?>
                                </div>
                                <div class="card-footer d-flex align-items-ceneter justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="container-charts">

                    <div class="container-charts-left">
                        <h3 class="heading-indiv">Risk Wheel</h3>
                        <h6 class="sub-heading sub-heading-indiv">Explain the pie chart*</h6>
                    </div>
                    <div class="container-charts-right">
                        <h3 class="heading-indiv">Risk Category</h3>
                        <h6 class="sub-heading sub-heading-indiv">Explain the risk matrix*</h6>
                    </div>

                </div>

                <div class="container-triple">

                    <div class="container-triple-1">
                        <h3 class="heading-indiv">Total Assets</h3>
                        <h6 class="sub-heading sub-heading-indiv">Totol number of assets throughout the business</h6>
                    </div>
                    <div class="container-triple-2">
                        <h3 class="heading-indiv">Local Assets Detected</h3>
                        <h6 class="sub-heading sub-heading-indiv">Assets / Devices detected on local machine</h6>
                    </div>

                </div>
                <div class="container-triple-4">
                    <div class="container-triple-3">
                        <h3 class="heading-indiv">Overall Comapany Risk Score</h3>
                        <h6 class="sub-heading sub-heading-indiv">Calculated risk score over the past year</h6>
                    </div>
                </div>

                <div class="container-bottom">

                    <div class="container-bottom-1">
                        <h3 class="heading-indiv">Overall Comapany Risk Score</h3>
                        <h6 class="sub-heading sub-heading-indiv">Calculated risk score over the past year</h6>
                    </div>

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
                <footer class="bg-2 text-center text-white footer">
                    <!-- Grid container -->
                    <div class="container p-4">
                      <!--Grid row-->
                      <div class="row">
                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                          <h5 class="text-uppercase">Links</h5>
                  
                          <ul class="list-unstyled mb-0">
                            <li>
                              <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                              <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                              <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                              <a href="#!" class="text-white">Link 4</a>
                            </li>
                          </ul>
                        </div>
                        <!--Grid column-->
                  
                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                          <h5 class="text-uppercase mb-0">Links</h5>
                  
                          <ul class="list-unstyled">
                            <li>
                              <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                              <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                              <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                              <a href="#!" class="text-white">Link 4</a>
                            </li>
                          </ul>
                        </div>
                        <!--Grid column-->
                  
                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                          <h5 class="text-uppercase">Links</h5>
                  
                          <ul class="list-unstyled mb-0">
                            <li>
                              <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                              <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                              <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                              <a href="#!" class="text-white">Link 4</a>
                            </li>
                          </ul>
                        </div>
                        <!--Grid column-->
                  
                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                          <h5 class="text-uppercase mb-0">Links</h5>
                  
                          <ul class="list-unstyled">
                            <li>
                              <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                              <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                              <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                              <a href="#!" class="text-white">Link 4</a>
                            </li>
                          </ul>
                        </div>
                        <!--Grid column-->
                      </div>
                      <!--Grid row-->
                    </div>
                    <!-- Grid container -->
                  
                    <!-- Copyright -->
                    <div class="text-center p-3 bg-1">
                      © 2023 Copyright: Oliver Chaffey
                    </div>
                    <!-- Copyright -->
                  </footer>

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