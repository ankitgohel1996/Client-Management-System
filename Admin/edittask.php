<?php

function renderForm($taskid,$taskname, $taskcost, $progress)

{
?>

<html>
<head>
	<title>Edit Task</title>
</head>

<body>

<form action="" method="post">

	<input name="taskid" readonly value="<?php echo $taskid; ?>"/>
	<form action="" method="post">
	<div>

		<b>Task Description: </b> <input type="text" name="taskname" value="<?php echo $taskname; ?>" /><br/>
		<b>Estimated Cost: </b> <input type="text" name="taskcost" value="<?php echo $taskcost; ?>" /><br/>
		<b>Progress: </b> <input type="text" name="progress" value="<?php echo $progress; ?>" /><br/>
		
		<input type="submit" name="submit" value="Submit">

	</div>

</body>
</html>

<?php
}
session_start();

include('index.php');

if (!isset($_SESSION['username'])) 
{
	header('Location: login.html');
}

if (isset($_POST['submit']))
{
	if (is_numeric($_POST['taskid']))
	{
		$taskid = $_POST['taskid'];
		$taskname = $_POST['taskname'];
		$taskcost = $_POST['taskcost'];
		$progress = $_POST['progress'];

		$sql = "UPDATE task SET taskname='$taskname', progress='$progress' ,taskcost='$taskcost' WHERE taskid='$taskid'";
		$result = $conn->query($sql);

		$projectid = $_GET['projectid'];
		header("Location: viewtask.php?projectid=" . "$projectid");
	}
}

else
{

	$taskid = $_GET['taskid'];

	$sql = "SELECT * FROM task WHERE taskid='$taskid'";
	$result = $conn->query($sql);

	$row=$result->fetch_assoc();

	$taskname = $row['taskname'];
	$taskcost = $row['taskcost'];
	$progress = $row['progress'];

	renderForm($taskid,$taskname, $taskcost, $progress);
}

?>