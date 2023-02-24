<?php

$conn = new mysqli("localhost", "oc277_ciso_user", "Yevtak2d", "oc277_finalyear");

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}