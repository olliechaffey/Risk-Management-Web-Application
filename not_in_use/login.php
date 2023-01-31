<?php
    session_start();
    
    if (!empty($_POST)) {
        $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
        if ($conn->connect_error) {
            die("connection failed: " . $conn->connect_error);
        }
        
        $username = ($_POST['username']);
    	$password = ($_POST['password']);
    	
    	//$sql = "select * from users where username='$username' AND password='$password'";
    	$sql = "select * from users where username='$username'";
    	$result = mysqli_query($conn, $sql);
    	$num = mysqli_num_rows($result);
    	if($num == 1){
    	    while($row=mysqli_fetch_assoc($result)){
    	        if(password_verify($password, $row['password'])){
    	            $_SESSION['status'] = "loggedin";
    	            $_SESSION['username'] = $username;
    	            header("Location: https://oc277.brighton.domains/fyp");
    	            exit();
    	        }
    	    }
    	}
    	else{
    	    echo "Invalid Credentials";
    	}
	
    	
    }
?>

<html>

<head>

    <title>Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/login.css">
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

<body>
<div class="wrapper">
  <marquee>Login credentials will be set by the IT Manager. Use default login as of now. ID: <b>3003</b>, Password: <b>admin</b></marquee>
  <div class="container">
      <form class="form-signin vertical-center">
          <div class="text-center mb-5">
            <!--<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
            <h1 class="h3 mb-3 font-weight-normal">RM Tool v.1.0</h1>
          </div>
    
          <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control gap" placeholder="ID Key" required="" autofocus="">
          </div>
    
          <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control gap" placeholder="Password" required="">
          </div>
    
          <div class="text-center fp-label mb-3">
              <a href="fp_reset.html">Forgot password?</a></p>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          <p class="mt-5 mb-3 text-muted text-center">© University of Brighton - Oliver Chaffey</p>
        </form>

        <form action="" method="post">
    		username <input type="text" name="username">
    		<br> 
    		password <input type="text" name="password">
    		<br>
    		<input type="submit" value="submit">
    	</form>

  </div>
</div>


</body>

</html>