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
                <a class="active"href="user-account.php"><i class="fa-solid fa-user"></i> My Account</a>
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

                <h1 class="heading">My Account</h1>
                <span id="live-date" class="hovertext" data-hover="MM/DD/YYYY"></span>
                <div class="sub-heading title-ul">
                <script src="scripts.js"></script>
                <ol class="breadcrumb bg-transparent w-50 m-0 p-0">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fa-sharp fa-solid fa-house"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
              </div>

                  <div class="mb-2 mt-4">
                    <a href="edit-account.php"><button type="button" class="btn btn-outline-primary">Edit Profile</button></a>
                  </div>

                <div class="py-3">

                  <?php
                        $select = "SELECT * FROM users WHERE usersId = '$id'";
                        $result = mysqli_query($conn, $select);
                        while ($row = mysqli_fetch_array($result)) {

                      ?>
                
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="card flex-row flex-wrap align-items-center mb-4 bg-2-border">
                          <div class="card-header border-0">
                            <img src="img/default_avatar.png" alt="avatar"
                              class="rounded-circle img-fluid" style="width: 150px;">
                          </div>
                          <div class="card-block ml-3">
                            <h5 class="my-3"><?php echo decryptthis($row['usersName'], $key); ?></h5>
                            <p class="text-muted mb-1"><?php echo $row['jobRole']; ?></p>
                            <p class="text-muted mb-4">
                              <?php if($row['city'] OR $row['country'] == true){
                                echo $row['city'], ', ', $row['country'] ;
                            }else{
                              echo 'No location set.';
                            } 
                            ?></p>
                          </div>
                        </div>
                        <div class="card mb-4 bg-2-border">
                          <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="title-ul">User Details</h3>
                                </div>
                              </div>
                            <div class="row pt-2">
                              <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                              </div>
                              <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo decryptthis($row['usersName'], $key); ?></p>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                              </div>
                              <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo decryptthis($row['usersEmail'], $key); ?></p>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <p class="mb-0">Team Code</p>
                              </div>
                              <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row['teamId']; ?></p>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <p class="mb-0">Mobile</p>
                              </div>
                              <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row['phoneNumber']; ?></p>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                              </div>
                              <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row['city'], ', ', $row['country'] ; ?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                        <?php 
                        }
                        ?>

                        <?php
                        $select = "SELECT * FROM users WHERE usersId = '$id'";
                        $result = mysqli_query($conn, $select);
                        while ($row = mysqli_fetch_array($result)) {
                      ?>

                      <div class="col-lg-8">
                        <div class="card mb-4 bg-2-border">
                          <div class="card-body">
                            <h4 class="card-title title-ul">Team Members</h4>
                            <div class="table-responsive">
                              <table class="my-table">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Job Role</th>
                                    <th>Member Since</th>
                                  </tr>
                                </thead>
                                <?php
                                  $select = "SELECT *, CAST(memberSince AS DATE) as riskDate FROM users WHERE teamId = '$teamcode' AND NOT teamId = '' ORDER BY riskDate DESC";
                                  $result = mysqli_query($conn, $select);
                                  while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                  <td><?php echo decryptthis($row['usersName'], $key); ?></td>
                                  <td><?php echo $row['city']; ?></td>
                                  <td><?php echo $row['jobRole']; ?></td>
                                  <td><?php echo $row['riskDate']; ?></td>
                                </tr>
                                <?php } ?>
                              </table>
                            </div>
                          </div>
                          </div>

                        <?php } ?>
                        <div class="row">
                          <div class="col">
                            <div class="card mb-4 mb-md-0 bg-2-border">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm">
                                    <h3>Total risks identified:</h3>
                                  </div>
                                  <div class="col-sm">
                                    One of three columns
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card mb-4 mb-md-0 bg-2-border">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm">
                                    <h3>Total assets identified:</h3>
                                  </div>
                                  <div class="col-sm">
                                    One of three columns
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                        </div>
                      </div>

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