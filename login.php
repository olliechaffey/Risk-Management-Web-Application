<?php
    session_start();
?>  

<html>

<head>

    <title>Login</title>

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
    
    <link href="bootstrap-pincode-input.css" rel="stylesheet">
    <script src="bootstrap-pincode-input.js"></script>
    
</head>

<body style="background-color: #141824; color: white">
    
    <div class="container h-100 d-flex align-items-center justify-content-center">
    <section class="signup-form p-4" style="background-color: #222834; border-radius: 10px;">
        <h1 class="m-2 d-flex align-items-center justify-content-center">Log In</h1>
        <h6 class="m-2 sub-heading title-ul d-flex align-items-center justify-content-center">Welcome back!</h6>
        <form action="includes/login.inc.php" method="post">
            <div class="row">
                <div class="col">
                    <div class="m-2">
                        <input class="form-control bg-2-border text-white" type="text" name="name" placeholder="Username...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="m-2">
                        <input class="form-control bg-2-border text-white" type="password" name="pwd" placeholder="Password...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center m-2">
                        <button class="mr-2 btn btn-primary" type="submit" name="submit">Log In</button>
                        <button class="ml-2 btn bg-2-border text-white" onclick="location.href='https://oc277.brighton.domains/fyp/signup.php'" type="button" name="signup">Sign Up</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

</body>

</html>
    $_SESSION["valid"] = true;
    session_start();
?>  

<html>

<head>

    <title>Login</title>

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
    
    <link href="bootstrap-pincode-input.css" rel="stylesheet">
    <script src="bootstrap-pincode-input.js"></script>
    
</head>

<body style="background-color: #141824; color: white">
    
    <div class="container h-100 d-flex align-items-center justify-content-center">
    <section class="signup-form p-4" style="background-color: #222834; border-radius: 10px;">
        <h1 class="m-2 d-flex align-items-center justify-content-center">Log In</h1>
        <h6 class="m-2 sub-heading title-ul d-flex align-items-center justify-content-center">Welcome back!</h6>
        <form action="includes/login.inc.php" method="post">
            <div class="row">
                <div class="col">
                    <div class="m-2">
                        <input class="form-control bg-2-border text-white" type="text" name="name" placeholder="Username...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="m-2">
                        <input class="form-control bg-2-border text-white" type="password" name="pwd" placeholder="Password...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center m-2">
                        <button class="mr-2 btn btn-primary" type="submit" name="submit">Log In</button>
                        <button class="ml-2 btn bg-2-border text-white" onclick="location.href='https://oc277.brighton.domains/fyp/signup.php'" type="button" name="signup">Sign Up</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

</body>

</html>