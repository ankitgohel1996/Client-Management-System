<?php

$servername= "localhost";
$username= "Ankit";
$password= "12345678";
$dbname= "sadgi";

$conn= new mysqli($servername, $username, $password, $dbname);

if($conn-> connect_error)
{
	die("Connection failed: ".$conn-> connect_error );
}

?>