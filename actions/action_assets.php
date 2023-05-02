<?php

session_start();

$name = htmlspecialchars($_POST["name"]);
$category = htmlspecialchars($_POST["category"]);
$product_name = htmlspecialchars($_POST["prodName"]);
$status = htmlspecialchars($_POST["status"]);
$location = htmlspecialchars($_POST["location"]);
$version = htmlspecialchars($_POST["version"]);
$vendor = htmlspecialchars($_POST["vendor"]);
$assignedTo = htmlspecialchars($_POST["assignedTo"]);

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