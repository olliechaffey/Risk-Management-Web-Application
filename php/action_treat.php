<?php

session_start();

$id = $_POST["id"];
$status = $_POST["status"];


if (!empty($_POST)) {
    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    
    //$hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "UPDATE risk_assessment SET status='$status' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    echo "<script> location.href='tasks.php'; </script>";
    exit;
}

?>