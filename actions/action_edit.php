<?php

session_start();

$uName = htmlspecialchars($_POST["username"]);
$name = htmlspecialchars($_POST["name"]);
$number = htmlspecialchars($_POST["number"]);
$country = htmlspecialchars($_POST["country"]);
$city = htmlspecialchars($_POST["city"]);
$email = htmlspecialchars($_POST["email"]);
$jobRole = htmlspecialchars($_POST["jobRole"]);

if (!empty($_POST)) {
    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    
    //$hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "UPDATE users SET usersName='$name', usersEmail='$email', usersUid='$uName', phoneNumber='$number', city='$city', country='$country', jobRole='$jobRole' WHERE usersId= '{$_SESSION['id']}'";
    $result = mysqli_query($conn, $sql);
    echo "<script> location.href='edit-account.php'; </script>";
    exit;
}
?>