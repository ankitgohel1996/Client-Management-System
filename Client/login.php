<?php
session_start();

include('index.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if($row['password']==$password)
{
	$userid=$row['userid'];
	$_SESSION['userid'] = $userid;
	header("Location: dashboard.php?userid=" . "$userid");
}

else
{
	header("Location:login.html");
}

?>