<html>

<head>
	<title>View Records</title>
</head>

<body>

<?php

include('index.php');

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

echo "</div>";
echo "<p><b>View All Users</b></p>";
echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>UserID</th> <th>User Name</th> <th>Password</th> <th></th> <th></th> <th></th></tr>";

if($result->num_rows)
{
	while($row=$result->fetch_assoc())
	{
		echo "<tr>";
		echo '<td>' . $row['userid'] . '</td>';
		echo '<td>' . $row['username'] . '</td>';
		echo '<td>' . $row['password'] . '</td>';
		echo '<td><a href="edit.php?userid=' . $row['userid'] . '">Edit</a></td>';
		echo '<td><a href="delete.php?userid=' . $row['userid'] . '">Delete</a></td>';
		echo '<td><a href="viewproject.php?userid=' . $row['userid'] . '">Projects</a></td>';
		echo "</tr>";
	}
}

echo "</table>";
?>

<p><a href="new.php">Add a new record</a></p>

</body>

</html>