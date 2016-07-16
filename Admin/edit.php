<?php

function renderForm($userid, $username, $password)

{
?>

<html>
<head>
	<title>Edit Record</title>
</head>

<body>

<form action="" method="post">

	<b>User ID:</b> <input name="userid" readonly value="<?php echo $userid; ?>"/>
	<form action="" method="post">
	<div>
		<b>Client Name: </b> <input type="text" name="username" value="<?php echo $username; ?>" /><br/>
		<b>Password: </b> <input type="password" name="password" value="<?php echo $password; ?>" /><br/>
		<input type="submit" name="submit" value="Submit">
	</div>
	</form>
</form>
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
	if (is_numeric($_POST['userid']))
	{

		$userid = $_POST['userid'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "UPDATE user SET username='$username', password='$password' WHERE userid='$userid'";
		$result = $conn->query($sql);

		header("Location: view.php");
	}
}

else
{

	$userid = $_GET['userid'];

	$sql = "SELECT * FROM user WHERE userid='$userid'";
	$result = $conn->query($sql);

	$row=$result->fetch_assoc();

	$username = $row['username'];
	$password = $row['password'];

	renderForm($userid, $username, $password);
}

?>