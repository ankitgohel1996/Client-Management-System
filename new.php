<?php

function renderForm($username,$password)
{
?>

<html>

<head>
	<title>New Record</title>
</head>

<body>

	<form action="" method="post">
	<div>

		<b>Client Name: </b> <input type="text" name="username" value="<?php echo $username; ?>"></br>
		<b>Password: </b> <input type="password" name="password" value="<?php echo $password; ?>" /><br/>
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
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "INSERT INTO user SET username='$username', password='$password'";
	$result = $conn->query($sql);

	header("Location: view.php");
}

else
{
	renderForm('','');
}

?>