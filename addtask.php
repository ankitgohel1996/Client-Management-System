<?php

function renderForm($projectid,$taskname,$taskcost, $progress)
{
?>

<html>

<head>
	<title>New Task</title>
</head>

<body>

	<form action="" method="post">
	<div>

		<b>Task Description: </b> <input type="text" name="taskname" value="<?php echo $taskname; ?>" /><br/>
		<b>Estimated Cost: </b> <input type="text" name="taskcost" value="<?php echo $taskcost; ?>" /><br/>
		<b>Progress: </b> <input type="text" name="progress" value="<?php echo $progress; ?>" /><br/>
		
		<input type="submit" name="submit" value="Submit">

	</div>
	</form>
</body>
</html>

<?php
}

include('index.php');

if (isset($_POST['submit']))
{
	$projectid = $_GET['projectid'];
	$taskname = $_POST['taskname'];
	$taskcost = $_POST['taskcost'];
	$progress = $_POST['progress'];
	

	$sql = "INSERT INTO task SET projectid='$projectid', taskname='$taskname', taskcost='$taskcost', progress='$progress'";
	$result = $conn->query($sql);

	$projectid = $_GET['projectid'];
	header("Location: viewtask.php?projectid=" . "$projectid");
}

else
{
	renderForm('','','','');
}

?>