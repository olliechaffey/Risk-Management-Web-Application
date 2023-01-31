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

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function(){
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = '<tr>' +
                    '<td><input type="text" class="form-control" name="id" id="id"></td>' +
                    '<td><input type="text" class="form-control" name="title" id="title"></td>' +
                    '<td><select class="form-control" name="status" id="status"><option value="impact-review">In Review</option><option value="impact-compelte">Complete</option></td>' +
                    '<td><input type="text" class="form-control" name="task" id="task"></td>' +
                    '<td><select class="form-control" name="impact" id="impact"><option value="impact-verylow">Very Low</option><option value="impact-low">Low</option><option value="impact-medium">Medium</option><option value="impact-high">High</option><option value="impact-veryhigh">Very High</option></select></td>' +
                    '<td><select class="form-control" name="likelihood" id="likelihood"><option value="likelihood-verylow">Very Low</option><option value="likelihood-low">Low</option><option value="likelihood-medium">Medium</option><option value="likelihood-high">High</option><option value="likelihood-veryhigh">Very High</option></select></td>' +
                    '<td><select class="form-control" name="risklevel" id="risklevel"><option value="risklevel-verylow">Very Low</option><option value="risklevel-low">Low</option><option value="risklevel-medium">Medium</option><option value="risklevel-high">High</option><option value="risklevel-veryhigh">Very High</option></select></td>' +
                    '<td><input type="text" class="form-control" name="riskowner" id="riskowner"></td>' +
                    '<td>' + actions + '</td>' +
                '</tr>';
                $("table").append(row);		
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();
            });
            // Add row on add button click
            $(document).on("click", ".add", function(){
                var empty = false;
                var input = $(this).parents("tr").find('input[type="text"]');
                input.each(function(){
                    if(!$(this).val()){
                        $(this).addClass("error");
                        empty = true;
                    } else{
                        $(this).removeClass("error");
                    }
                });
                $(this).parents("tr").find(".error").first().focus();
                if(!empty){
                    input.each(function(){
                        $(this).parent("td").html($(this).val());
                    });			
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                }		
            });
            // Edit row on edit button click
            $(document).on("click", ".edit", function(){		
                $(this).parents("tr").find("td:not(:last-child)").each(function(){
                    $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
                });		
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").attr("disabled", "disabled");
            });
            // Delete row on delete button click
            $(document).on("click", ".delete", function(){
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            });
        });
        </script>

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
                    <a href="index.php">Dashboard</a>
                </li>
                <label class="nav-label">tools</label>
                <li>
                    <a href="riskment.php">Risk Assessment</a>
                </li>
                <li>
                    <a href="assets.php">Assets</a>
                </li>
                <li>
                    <a class="active" href="tasks.php">Tasks</a>
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

                <h1 class="heading">Tasks</h1>
                <span id="live-date" class="hovertext" data-hover="MM/DD/YYYY"></span>
                <script src="scripts.js"></script>
                <h6 class="sub-heading title-ul">Current active tasks that need to be allocated.</h6>

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