<?php

session_start();

$name = $_POST["name"];
$category = $_POST["category"];
$product_name = $_POST["prodName"];
$status = $_POST["status"];
$location = $_POST["location"];
$version = $_POST["version"];
$vendor = $_POST["vendor"];
$assignedTo = $_POST["assignedTo"];

if (!empty($_POST)) {
    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    
    //$hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO company_assets (name, category, product_name, version, vendor, status, location, assignedTo, teamId) VALUES ('$name', '$category', '$product_name', '$version', '$vendor', '$status', '$location', '$assignedTo', '$_SESSION[teamcode]')";
    $result = mysqli_query($conn, $sql);
    echo '<script>alert("Asset added successfully")</script>';
    echo "<script> location.href='assets.php'; </script>";
    exit;
}

?>