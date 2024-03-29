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

    <div id="wrapper" class="toggled" style="overflow: auto; height: 100%;">

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
                    <a class="active" href="riskment.php"><i class="fa-solid fa-bolt"></i> Risk Register</a>
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

                <h1 class="heading">Risk Register</h1>
                <span id="live-date" class="hovertext" data-hover="MM/DD/YYYY"></span>
                <div class="sub-heading title-ul">
                    <script src="scripts.js"></script>
                    <ol class="breadcrumb bg-transparent w-50 m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa-sharp fa-solid fa-house"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Risk Register</li>
                    </ol>
                </div>

                <div class="top-button mt-4">
                    <form class="form-inline mt-3" id="insert-form" method="post" action="action_delete_risk.php">
                        <div class="btn-group mr-2" role="group">
                            <button type="button" class="btn btn-secondary active">Risk Register</button>
                            <button type="button" class="btn btn-secondary">Risk Matrix</button>
                          </div>
                        <div class="mr-2">
                        <a href="newasset.php"><input class="btn btn-success btn-block" type="button" value="Add"></a>
                        </div>
                        <div class="mr-2">
                        <input class="form-control bg-2-border text-white" type="text" name="id" required="" placeholder="Enter Risk ID...">
                        </div>
                        <button class="btn btn-danger" type="submit" name="submit">Delete</button>
                        <div class="table-filter ml-2">
                            <input class="form-control bg-2-border text-white" type="text" id="myInput" onkeyup="myFunction()" placeholder="Filter by Title...">
                        </div>
                    </form>
                </div>
                <form method="post" action="action_updaterisk.php">
                <table id="myTable" class="my-table mt-4">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">ID</th>
                        <th style="width: 20%;">Title</th>
                        <th class="text-center" style="width: 10%;">Status</th>
                        <th style="width: 25%;">Task</th>
                        <th class="text-center" style="width: 10%;">Impact</th>
                        <th class="text-center" style="width: 10%;">Likelihood</th>
                        <th class="text-center" style="width: 10%;">Risk</th>
                        <th style="width: 10%;">Assigned To</th>
                        <th>+/-</th>
                    </tr>
                </thead>
                        <?php
                    $select = "(SELECT * FROM risk_assessment WHERE teamId = '$teamcode' AND NOT teamId = '') UNION (SELECT * FROM risk_assessment WHERE risk_owner = '$username')";
                    $result = mysqli_query($conn, $select);
                    $select2 = "SELECT * FROM company_assets WHERE teamId = '$teamcode' AND NOT teamId = ''";
                    $result2 = mysqli_query($conn, $select2);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <tbody>
                    <tr>
                        <th class="text-center"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['title']; ?></td>
                        <td class="table-center"><p class="<?php if($row['status'] == 'In Review'){
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
                        <td><?php echo $row['task']; ?></td>
                        <td class="text-center"><?php echo $row['impact']; ?></td>
                        <td class="text-center"><?php echo $row['likelihood']; ?></td>
                        <td class="table-center"><p class="text-center <?php if($row['risk'] == 'High'){
                            echo 'alert-red';
                        }elseif ($row['risk'] == 'Medium'){
                            echo 'alert-orange';
                        }elseif ($row['risk'] == 'Low'){
                            echo 'alert-green';
                        }else{
                            echo 'null';
                        }
                        ?>"><?php echo $row['risk']; ?></p></td>
                        <td><?php echo decryptthis($row['assignedTo'], $key); ?></td>
                        <td><input type="checkbox" id="management" data-toggle="toggle"></td>
                    </tr>
                    <tr class="collapse">
                        <td colspan="1" class="text-center" name="id"><?php echo $row['id']; ?></td>
                        <td colspan="8">
                            <p style="font-style: italic;">Mitigation Notes:</p>
                            <div name="update_mitigation" contenteditable>
                                <textarea class="form-control bg-2-border text-white" type="text" rows="3" name="update_mitigation" required="" value="<?php echo $row['mitigation']; ?>"><?php echo $row['mitigation']; ?></textarea>
                            </div></br>
                            <p><i>Risk Owner: </i><?php echo $row['risk_owner']; ?></p></br>
                            <p style="font-style: italic;">Associated Business Areas:</p>
                            <select class="form-control bg-2-border text-white" name="update_business">
                                <option value="<?php echo $row['business']; ?>"><?php echo $row['business']; ?></option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Information Technology">Information Technology</option>
                                <option value="Finance">Finance</option>
                                <option value="Accounting">Accounting</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Management">Management</option>
                                <option value="Operations">Operations</option>
                                <option value="">Unknown</option>
                            </select></br>
                            <p style="font-style: italic;">Associated Assets:</p>
                            <select class="form-control bg-2-border text-white" name="update_asset">
                                <option value="<?php echo $row['assets']; ?>"><?php echo $row['assets']; ?></option>
                                <option value="">Unassigned</option>
                                <?php
                                while ($row = mysqli_fetch_array($result2)):; ?>
                                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                <?php
                                endwhile;
                                ?>
                            </select></br>
                            <div>
                                <button class="btn btn-success" type="submit" name="id" value="<?php echo $row['id']; ?>">Update</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
                    <?php 
                }
            ?>
                </table>
            </form>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <script>
        $(document).ready(function() {
	$('[data-toggle="toggle"]').change(function(){
		$(this).parents().next('.collapse').toggle();
	});
});
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