<?php

session_start();

$title = $_POST["title"];
$status = $_POST["status"];
$task = $_POST["task"];
$impact = $_POST["impact"];
$likelihood = $_POST["likelihood"];
$risk = $_POST["risk"];

if (!empty($_POST)) {
    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    
    //$hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO risk_assessment (title, status, task, impact, likelihood, risk, risk_owner, teamId) VALUES ('$title', '$status', '$task', '$impact', '$likelihood', '$risk', '$_SESSION[username]', '$_SESSION[teamcode]')";
    $result = mysqli_query($conn, $sql);
    echo "<script> location.href='riskment.php'; </script>";
    exit;
}

?>