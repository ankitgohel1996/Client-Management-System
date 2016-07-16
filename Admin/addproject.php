<?php

function renderForm($userid,$projectname,$time, $managername)
{
?>

<html>

<head>
	<title>New Project</title>
</head>

<body>

	<form action="" method="post">
	<div>

		<b>Project Name: </b> <input type="text" name="projectname" value="<?php echo $projectname; ?>" /><br/>
		<b>Estimated Time: </b> <input type="text" name="time" value="<?php echo $time; ?>" /><br/>
		<b>Project Manager: </b> <input type="text" name="managername" value="<?php echo $managername; ?>" /><br/>
		
		<input type="submit" name="submit" value="Submit">

	</div>
	</form>
</body>
</html>

<?php
}

session_start()''

include('index.php');

if (!isset($_SESSION['username'])) 
{
	header('Location: login.html');
}

if (isset($_POST['submit']))
{
	$userid = $_GET['userid'];
	$projectname = $_POST['projectname'];
	$time = $_POST['time'];
	$managername = $_POST['managername'];
	

	$sql = "INSERT INTO project SET userid='$userid', projectname='$projectname', time='$time', managername='$managername'";
	$result = $conn->query($sql);

	header("Location: view.php");
}

else
{
	renderForm('','','','');
}

?>