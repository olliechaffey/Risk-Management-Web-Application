<?php

session_start();

$title = $_POST["title"];
$status = $_POST["status"];
$task = $_POST["task"];
$impact = $_POST["impact"];
$likelihood = $_POST["likelihood"];
$risk_owner = $_POST["risk_owner"];

$conn = new mysqli("localhost", "oc277_db_user", "Yevtak2d", "oc277_fyp");

foreach($_POST['title'] as $key => $value){
    $sql = 'INSERT INTO risk_assessment(title, status, task, impact, likelihood, risk_owner) VALUES ($title, $status, $task, $impact, $likelihood, $risk_owner)';
    $result = mysqli_query($conn, $sql);
    if($result){
        mysqli_close($conn);
        echo "Successfully added risk.";
    }
}

?>
