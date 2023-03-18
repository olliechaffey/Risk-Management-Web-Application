<?php

session_start();

if(isset($_SESSION['useruid']))
{
	unset($_SESSION['userid']);
	unset($_SESSION['useruid']);
	unset($_SESSION['teamid']);

}

header("Location: login.php");
die;