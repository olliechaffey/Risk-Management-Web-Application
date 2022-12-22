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

        var html = '<td><input class="form-control" type="text" name="title" required=""></td><td><input class="form-control" type="text" name="status" required=""></td><td><input class="form-control" type="text" name="task" required=""></td><td><input class="form-control" type="text" name="impact" required=""></td><td><input class="form-control" type="text" name="likelihood" required=""></td><td><input class="form-control" type="text" name="risk" required=""></td><td><input class="form-control" type="text" name="risk_owner" required=""></td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>';

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

<body>
    <div class="container-fluid">
        <form class="insert-form" id="insert-form" method="post" action="action.php">
            <hr>
            <h1 class="text-center">Insert Data</h1>
            <hr>
            <div class="input-field">

                <table class="table table-bordered" id="table_field">
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Task</th>
                        <th>Impact</th>
                        <th>Likelihood</th>
                        <th>Risk</th>
                        <th>Risk Owner</th>
                        <th>Add or Remove</th>
                    </tr>

                    <tr>
                        <td><input class="form-control" type="text" name="title" required=""></td>
                        <td><input class="form-control" type="text" name="status" required=""></td>
                        <td><input class="form-control" type="text" name="task" required=""></td>
                        <td><input class="form-control" type="text" name="impact" required=""></td>
                        <td><input class="form-control" type="text" name="likelihood" required=""></td>
                        <td><input class="form-control" type="text" name="risk" required=""></td>
                        <td><input class="form-control" type="text" name="risk_owner" required=""></td>
                        <td><input class="btn btn-warning" type="button" name="add" id="add" value="Add"></td>
                    </tr>
                </table>
                <div class="d-flex justify-content-center">
                    <input class="btn btn-success" type="submit" name="submit" value="Submit Data">
                </div>

            </div>
        </form>
    </div>



</body>

</html>