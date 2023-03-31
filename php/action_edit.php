<?php

session_start();

$userName = $_POST["username"];
$name = $_POST["name"];
$number = $_POST["number"];
$country = $_POST["country"];
$city = $_POST["city"];
$email = $_POST["email"];
$jobRole = $_POST["jobRole"];

if (!empty($_POST)) {
    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    
    //$hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "UPDATE users SET usersName='$name', usersEmail='$email', usersUid='$userName', phoneNumber='$number', city='$city', country='$country', jobRole='$jobRole' WHERE usersId='$_SESSION[id]'";
    $result = mysqli_query($conn, $sql);
    echo "<script> location.href='edit-account.php'; </script>";
    exit;
}
?>