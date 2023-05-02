<?php

session_start();

$title = htmlspecialchars($_POST["title"]);
$status = htmlspecialchars($_POST["status"]);
$task = htmlspecialchars($_POST["task"]);
$impact = htmlspecialchars($_POST["impact"]);
$likelihood = htmlspecialchars($_POST["likelihood"]);
$risk = "";
$expDate = htmlspecialchars($_POST["expDate"]);
$mitigation = htmlspecialchars($_POST["mitigation"]);
$assets = htmlspecialchars($_POST["assets"]);
$business = htmlspecialchars($_POST["business"]);
$assign = htmlspecialchars($_POST["assignedTo"]);

if($impact == 'Very Low' && $likelihood == 'Very Unlikely'){
    $risk = "Very Low";
}else if ($impact == 'Very Low' && $likelihood == 'Unlikely'){
    $risk = "Very Low";
}else if ($impact == 'Very Low' && $likelihood == 'Possible'){
    $risk = "Low";
}else if ($impact == 'Very Low' && $likelihood == 'Likely'){
    $risk = "Medium";
}else if ($impact == 'Very Low' && $likelihood == 'Very Likely'){
    $risk = "Medium";
}else if ($impact == 'Low' && $likelihood == 'Very Unlikely'){
    $risk = "Very Low";
}else if ($impact == 'Low' && $likelihood == 'Unlikely'){
    $risk = "Low";
}else if ($impact == 'Low' && $likelihood == 'Possible'){
    $risk = "Medium";
}else if ($impact == 'Low' && $likelihood == 'Likely'){
    $risk = "Medium";
}else if ($impact == 'Low' && $likelihood == 'Very Likely'){
    $risk = "High";
}else if ($impact == 'Medium' && $likelihood == 'Very Unlikely'){
    $risk = "Low";
}else if ($impact == 'Medium' && $likelihood == 'Unlikely'){
    $risk = "Medium";
}else if ($impact == 'Medium' && $likelihood == 'Possible'){
    $risk = "Medium";
}else if ($impact == 'Medium' && $likelihood == 'Likely'){
    $risk = "High";
}else if ($impact == 'Medium' && $likelihood == 'Very Likely'){
    $risk = "Very High";
}else if ($impact == 'High' && $likelihood == 'Very Unlikely'){
    $risk = "Medium";
}else if ($impact == 'High' && $likelihood == 'Unlikely'){
    $risk = "Medium";
}else if ($impact == 'High' && $likelihood == 'Possible'){
    $risk = "High";
}else if ($impact == 'High' && $likelihood == 'Likely'){
    $risk = "Very High";
}else if ($impact == 'High' && $likelihood == 'Very Likely'){
    $risk = "Extreme";
}else if ($impact == 'Very High' && $likelihood == 'Very Unlikely'){
    $risk = "Medium";
}else if ($impact == 'Very High' && $likelihood == 'Unlikely'){
    $risk = "High";
}else if ($impact == 'Very High' && $likelihood == 'Possible'){
    $risk = "Very High";
}else if ($impact == 'Very High' && $likelihood == 'Likely'){
    $risk = "Extreme";
}else if ($impact == 'Very High' && $likelihood == 'Very Likely'){
    $risk = "Extreme";
}

if (!empty($_POST)) {
    $conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    
    //$hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO risk_assessment (title, status, task, impact, likelihood, risk, risk_owner, teamId, expDate, mitigation, assets, business, assignedTo) VALUES ('$title', '$status', '$task', '$impact', '$likelihood', '$risk', '$_SESSION[username]', '$_SESSION[teamcode]', '$expDate', '$mitigation', '$assets', '$business', '$assign')";
    $result = mysqli_query($conn, $sql);
    echo "<script> location.href='riskment.php'; </script>";
    exit;
}

?>