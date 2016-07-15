<html>

<head>
	<title>View Tasks</title>
</head>
<body>

<?php

include('index.php');

$projectid = $_GET['projectid'];
$sql = "SELECT * FROM task WHERE projectid='$projectid'";
$result = $conn->query($sql);

echo "</div>";
echo "<p><b>View Tasks for Project</b></p>";
echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>ProjectID</th> <th>Task ID </th> <th>Task Description</th> <th>Estimated Cost</th> <th>Progress</th> <th> </th> <th></th></tr>";

if($result->num_rows)
{
	while($row=$result->fetch_assoc())
	{
		echo "<tr>";
		echo '<td>' . $row['projectid'] . '</td>';
		echo '<td>' . $row['taskid'] . '</td>';
		echo '<td>' . $row['taskname'] . '</td>';
		echo '<td>' . $row['taskcost'] . '</td>';
		echo '<td>' . $row['progress'] . '</td>';
		echo '<td><a href="edittask.php?projectid=' . $projectid .'&taskid=' . $row['taskid'] . '">Edit</a></td>';
		echo '<td><a href="deletetask.php?projectid=' .$projectid .'&taskid=' . $row['taskid'] . '">Delete</a></td>';
		echo "</tr>";
	}
}

echo "</table>";
?>

<p><a href="addtask.php?projectid=<?php echo $projectid ?>">Add a new task</a></p>

</body>

</html>