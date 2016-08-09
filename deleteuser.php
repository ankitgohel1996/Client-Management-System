<?php

include('connect.php');
if (isset($_GET['userid'])) 
{
	$userid = $_GET['userid'];

	$sql = "DELETE FROM user WHERE userid='$userid'";
	$result = $conn->query($sql);

	header("Location: index.php");
}

else
{
	header("Location: index.php");
}

?>