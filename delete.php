<?php

include('index.php');

if (isset($_GET['userid'])) 
{
	$userid = $_GET['userid'];

	$sql = "DELETE FROM user WHERE userid='$userid'";
	$result = $conn->query($sql);

	header("Location: view.php");
}

else
{
	header("Location: view.php");
}
?>