<?php
session_start();

include('index.php');

if (!isset($_SESSION['username'])) 
{
	header('Location: login.html');
}

if (isset($_GET['taskid'])) 
{
	$taskid = $_GET['taskid'];

	$sql = "DELETE FROM task WHERE taskid='$taskid'";
	$result = $conn->query($sql);

	$projectid = $_GET['projectid'];
	header("Location: viewtask.php?projectid=" . "$projectid");
}

else
{
	header("Location: view.php");
}
?>