<html>

<head>
	<title>View Projects</title>
</head>
<body>

<?php

include('index.php');

$userid = $_GET['userid'];
$sql = "SELECT * FROM project WHERE userid='$userid'";
$result = $conn->query($sql);

echo "</div>";
echo "<p><b>View Projects for Client</b></p>";
echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>UserID</th> <th>ProjectID</th> <th>ProjectName</th> <th>Estimated Time</th> <th>Project Manager</th> <th> </th> <th></th><th></th></tr>";

if($result->num_rows)
{
	while($row=$result->fetch_assoc())
	{
		echo "<tr>";
		echo '<td>' . $row['userid'] . '</td>';
		echo '<td>' . $row['projectid'] . '</td>';
		echo '<td>' . $row['projectname'] . '</td>';
		echo '<td>' . $row['time'] . '</td>';
		echo '<td>' . $row['managername'] . '</td>';
		echo '<td><a href="editproject.php?projectid=' . $row['projectid'] . '">Edit</a></td>';
		echo '<td><a href="deleteproject.php?projectid=' . $row['projectid'] . '">Delete</a></td>';
		echo '<td><a href="viewtask.php?projectid=' . $row['projectid'] . '">Tasks</a></td>';
		echo "</tr>";
	}
}

echo "</table>";
?>

<p><a href="addproject.php?userid=<?php echo $userid ?>">Add a new project</a></p>

</body>

</html>