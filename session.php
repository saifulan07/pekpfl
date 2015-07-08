<?php
	session_start();
	if(isset($_SESSION))
	{
		$global_userID = $_SESSION['userID'];
		$global_userName = $_SESSION['userName'];
		$global_userRole = $_SESSION['role'];
	}
	else
	{
		$global_userID = NULL;
		$global_userName = NULL;
		$global_userRole = NULL;
		header('Location: index.php');
	}
?>