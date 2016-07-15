<html>

<head>
	<title>Dashboard</title>
</head>
<body>

<?php

session_start();
include('index.php');

if (!isset($_SESSION['userid'])) 
{
	header('Location: login.html');
}

$userid = $_GET['userid'];

if($_SESSION['userid']!=$userid)
{
	header('Location: login.html');
}

$sqlname= "SELECT username FROM user WHERE userid='$userid'";
$name= $conn->query($sqlname);
$rowname= $name->fetch_assoc();

$sql = "SELECT * FROM project WHERE userid='$userid'";
$result = $conn->query($sql);

echo "</div>";
echo "<p><b>Hi, " . $rowname['username'] . "</b></p>";

if($result->num_rows)
{
	while($row=$result->fetch_assoc())
	{
		echo "<br>";
		echo "<table border='1' cellpadding='10'>";
		echo "<tr> <th>ProjectName</th> <th>Estimated Time (days)</th> <th>Project Manager</th></tr>";
		echo "<tr>";
		echo '<td>' . $row['projectname'] . '</td>';
		echo '<td>' . $row['time'] . '</td>';
		echo '<td>' . $row['managername'] . '</td>';
		echo "</tr>";

		$projectid=$row['projectid'];

		$sql1 = "SELECT * FROM task WHERE projectid='$projectid'";
		$result1 = $conn->query($sql1);

		echo "</div>";
		echo "<table border='1' cellpadding='10'>";
		echo "<tr> <th>Task Description</th> <th>Estimated Cost</th> <th>Progress</th> </tr>";

		if($result1->num_rows)
		{
			while($row1=$result1->fetch_assoc())
			{
				echo "<br>";
				echo "<tr>";
				echo '<td>' . $row1['taskname'] . '</td>';
				echo '<td>' . $row1['taskcost'] . '</td>';
				echo '<td>' . $row1['progress'] . '</td>';
				echo "</tr>";
			}
		}

		echo "</table>";
	}
}

echo "</table>";
		
?>

<a href="logout.php">Logout </a>
</body>

</html>