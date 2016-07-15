<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];


if($username == "admin" && $password == "mayank")
{
	$_SESSION['username'] = $username;
	header("Location: view.php");
}

else
{
	header("Location:login.html");
}

?>