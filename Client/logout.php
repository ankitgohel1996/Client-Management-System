<?php
	
	session_start();
	unset($_SESSION['userid']);
	header("location: login.html");
	
?>