<?php

session_start();

$avatar = $_POST["avatar"];

if (!empty($_POST)) {
    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    
    //$hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users ('avatar') VALUES ('.$avatar.') WHERE usersId= '{$_SESSION['id']}'";
    $result = mysqli_query($conn, $sql);
    echo "<script> location.href='edit-account.php'; </script>";
    exit;
}
?>