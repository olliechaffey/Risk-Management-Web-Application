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
                    <a class="active" href="newasset.php"><i class="fa-solid fa-plus"></i> New Asset</a>
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
                <li>
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

                <h1 class="heading">Add New Asset</h1>
                <span id="live-date" class="hovertext" data-hover="MM/DD/YYYY"></span>
                <div class="sub-heading title-ul">
                    <script src="scripts.js"></script>
                    <ol class="breadcrumb bg-transparent w-50 m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa-sharp fa-solid fa-house"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Asset</li>
                    </ol>
                </div>

                <form class="insert-form mt-3" id="insert-form" method="post" action="action_assets.php">
                        <div class="row">
                            <div class="col">
                                <label>Name</label>
                                <input type="text" class="form-control bg-2-border text-white" name="name"
                                    placeholder="Enter asset name..." required="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="exampleFormControlSelect1">Category</label>
                                <select class="form-control bg-2-border text-white" name="category" required="">
                                    <option selected disabled value="">Select</option>
                                    <option value="Hardware">Hardware</option>
                                    <option value="Software">Software</option>
                                    <option value="Networking">Networking</option>
                                    <option value="Non-IT Asset">Non-IT Asset</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlSelect1">Product Name</label>
                                <input type="text" class="form-control bg-2-border text-white" name="prodName"
                                    placeholder="Enter official product name..." required="">
                            </div>
                            <div class="col">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control bg-2-border text-white" name="status" required="">
                                    <option selected disabled value="">Select</option>
                                    <option value="Live">Live</option>
                                    <option value="Down">Down</option>
                                    <option value="">n/a</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlSelect1">Location</label>
                                <select class="form-control bg-2-border text-white" name="location">
                                    <option selected disabled value="">Select</option>
                                    <option value="Human Resources">Human Resources</option>
                                    <option value="Information Technology">Information Technology</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Management">Management</option>
                                    <option value="Operations">Operations</option>
                                    <option value="">Unknown</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                    <label for="exampleFormControlSelect1">Vendor</label>
                                    <input type="text" class="form-control bg-2-border text-white" name="vendor"
                                        placeholder="Enter vendor for asset...">
                            </div>
                            <div class="col">
                                    <label for="exampleFormControlSelect1">Version</label>
                                    <input type="number" step=".000000000001" class="form-control bg-2-border text-white" name="version"
                                        placeholder="Enter version for asset...">
                            </div>
                            <div class="col">
                                    <label for="exampleFormControlInput1">Assign Asset</label>
                                    <select class="form-control bg-2-border text-white" name="assignedTo">
                                        <option selected disabled value="">Select</option>
                                        <option value="">Unassigned</option>
                                        <?php
                                        $select = "SELECT * FROM users WHERE teamId = '$teamcode' AND NOT teamId = ''";
                                        $result = mysqli_query($conn, $select);
                                        while ($row = mysqli_fetch_array($result)):; ?>
                                        <option value="<?php echo $row['usersName']; ?>"><?php echo decryptthis($row['usersName'], $key); ?></option>
                                        <?php
                endwhile;
            ?>
                                    </select>
                            </div>
                        </div>
                    <div class="d-flex justify-content-center mt-3">
                        <input class="btn btn-success" type="submit" name="submit" value="Submit Data">
                    </div>
                </form>
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