<html>

<head>
	<title>View Records</title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <script>
    		 $(document).ready(function()
         {
            $('.modal-trigger').leanModal();
         });
    </script>
</head>

<body>

<nav>
	<div class="nav-wrapper">
    	<li><a class="waves-effect waves-light btn modal-trigger" href="#modal1">Add Client</a></li>
    </div>
</nav>


   
<?php

function renderForm($username,$password,$emailid)
{
?>

<html>

<div class="row">
  <div id="modal1" class="modal col s10 offset-s1 offset-m2 m8 l6 offset-l3" >

  	<div class="modal-content">

  		<div class="row">
  			<div class="col s12">
    			<h4 style="margin-left:10px; margin-top:15px"> Add a new user </h4>
    		</div>
    	</div>

      	<div class="row">
    		<form class="col s12" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

     			<div class="row">
      				<div class="input-field col s12">
          				<input id="first_name" name="username" type="text" required class="validate">
          				<label for="first_name">Username</label>
        			</div>
        		</div>

      			<div class="row">
        			<div class="input-field col s12">
          				<input id="password" name="password" type="password">
          				<label for="password">Password</label>
        			</div>
     			</div>

	      		<div class="row">
	        		<div class="input-field col s12">
          				<input id="emailid" name="emailid" type="email">
          				<label for="email">Email</label>
        			</div>
      			</div>

            <button class="btn waves-effect waves-light" type="submit" name="submit" style="float:right">Submit</button>
    		</form>
  		</div>
    </div>
   </div>
</div>
  <html>

<?php
}

include('connect.php');
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

echo '<div class="row">';

if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		echo '<div class="col s12 m4 l3">';

          echo '<div class="card blue-grey darken-1">';
            echo '<div class="card-content white-text">';
              echo '<span class="card-title">' . $row['username'] . '</span>';
             // echo '<i class="material-icons">delete</i>';
              echo '<br>';
              echo '<p> User ID : ' . $row['userid'] . '<br>';
              echo '<p> Email ID : ' . $row['email'] . '<br>';
              echo '<p> Password : ' . $row['password'] . '</p>';
              echo '</div>';
              echo '<div class="card-action">';
              echo '<a href="viewproject.php?userid=' . $row['userid'] . '">View Projects</a>';
              echo '<a href="deleteuser.php?userid=' . $row['userid'] . '">Delete User</a>';
            echo '</div>';
          echo '</div>';
        echo '</div>';
	}
}

echo '</div>';

if (isset($_POST['submit']))
{
	if(isset($_POST['username']))
	{
		$username = $_POST['username'];
	}
	
	if(isset($_POST['password']))
	{
		$password = $_POST['password'];
	}

  if(isset($_POST['emailid']))
  {
    $emailid = $_POST['emailid'];
  }

	$sqlinsert = "INSERT INTO user SET username='$username', password='$password', email='$emailid'";
	$result = $conn->query($sqlinsert);

  header("Location: index.php");
}
else
{
	renderForm('','','');
}

?>

</body>

</html>