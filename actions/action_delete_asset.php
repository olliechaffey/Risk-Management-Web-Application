<?php

$id = htmlspecialchars($_POST["id"]);

if (!empty($_POST)) {
    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    
    //$hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "DELETE FROM company_assets WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    echo '<script>alert("Asset deleted successfully")</script>';
    echo "<script> location.href='assets.php'; </script>";
    exit;
}

$conn->close();
?>