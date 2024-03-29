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
    
            var html = '<td><input class="form-control" type="text" name="name" required=""></td><td><input class="form-control" type="text" name="category" required=""></td><td><input class="form-control" type="text" name="product_name" required=""></td><td><input class="form-control" type="text" name="version" required=""></td><td><input class="form-control" type="text" name="vendor" required=""></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>';
    
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
                    <a class="active" href="assets.php"><i class="fa-solid fa-computer-mouse"></i> Asset Register</a>
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

                <h1 class="heading">Asset Register</h1>
                <span id="live-date" class="hovertext" data-hover="MM/DD/YYYY"></span>
                <div class="sub-heading title-ul">
                    <script src="scripts.js"></script>
                    <ol class="breadcrumb bg-transparent w-50 m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa-sharp fa-solid fa-house"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Asset Register</li>
                    </ol>
                </div>

                <!-- <form class="insert-form mt-3" id="insert-form" method="post" action="action_assets.php">
                    <div class="input-field">
        
                        <table class="w-100 text-center" id="table_field">
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Version</th>
                                <th>Vendor</th>
                            </tr>
        
                            <tr class="mt-1">
                                <td class="p-2"><input class="form-control" type="text" name="name" required=""></td>
                                <td class="p-2"><input class="form-control" type="text" name="category" required=""></td>
                                <td class="p-2"><input class="form-control" type="text" name="product_name" required=""></td>
                                <td class="p-2"><input class="form-control" type="text" name="version" required=""></td>
                                <td class="p-2"><input class="form-control" type="text" name="vendor" required=""></td>
                                <td class="p-2"><input class="btn btn-primary btn-block" type="button" name="add" id="add" value="Add"></td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            <input class="btn btn-success" type="submit" name="submit" value="Submit Data">
                        </div>
        
                    </div>
                </form> -->

                <div class="top-button mt-4">
                    <form class="form-inline mt-3" id="insert-form" method="post" action="action_delete_asset.php">
                        <div class="mr-2">
                        <a href="newasset.php"><input class="btn btn-success btn-block" type="button" value="Add"></a>
                        </div>
                        <div class="mr-2">
                        <input class="form-control bg-2-border text-white" type="text" name="id" required="" placeholder="Enter Asset ID...">
                        </div>
                        <button class="btn btn-danger" type="submit" name="submit">Delete</button>
                        <div class="table-filter ml-2">
                            <input class="form-control bg-2-border text-white" type="text" id="myInput" onkeyup="myFunction()" placeholder="Filter by Name...">
                        </div>
                    </form>
                </div>

                <table id="myTable" class="my-table mt-4">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Primary Location</th>
                        <th>Product Name</th>
                        <th>Version</th>
                        <th>Vendor</th>
                        <th>Assigned To</th>
                    </tr>
                </thead>
                    <?php
                        $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
                    
                        $select = "(SELECT * FROM company_assets WHERE teamId = '$teamcode' AND NOT teamId = '') UNION (SELECT * FROM company_assets WHERE assignedTo = '$username')";
                        $result = mysqli_query($conn, $select);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
        
                    <tr>
                        <th><?php echo $row['id']; ?></th>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><p class="<?php if($row['category'] == 'Hardware'){
                            echo 'text-center alert-green';
                        }elseif($row['category'] == 'Software'){
                            echo 'text-center alert-orange';
                        }elseif($row['category'] == 'Networking'){
                            echo 'text-center alert-blue';
                        }elseif($row['category'] == 'Non-IT Asset'){
                            echo 'text-center alert-red';
                        }else{
                            echo 'text-center status-s';
                        }
                        ?>"><?php echo $row['category']; ?></p></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['version']; ?></td>
                        <td><?php echo $row['vendor']; ?></td>
                        <td><?php echo decryptthis($row['assignedTo'], $key); ?></td>
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