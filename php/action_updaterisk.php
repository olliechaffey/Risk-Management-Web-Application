<?php

session_start();

$mitigation = $_POST["update_mitigation"];
$assets = $_POST["update_asset"];
$business = $_POST["update_business"];

if (!empty($_POST)) {
    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    
    //$hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "UPDATE risk_assessment SET mitigation = '$mitigation', assets = '$assets', business = '$business'";
    $result = mysqli_query($conn, $sql);
    echo '<script>alert("Table updated successfully")</script>';
    echo "<script> location.href='riskment.php'; </script>";
    exit;
}

?>