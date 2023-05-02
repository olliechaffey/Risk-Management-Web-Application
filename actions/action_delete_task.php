<?php

require 'includes/dbh.inc.php';

$id = $_GET['id'];

$query = "DELETE FROM risk_assessment WHERE id = '$id';";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    header("location: ../fyp/tasks.php");
    exit();
} else {
    echo "Error deleting record";
}

?>