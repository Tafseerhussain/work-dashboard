<?php
	session_start();
	date_default_timezone_set("Asia/Karachi");
	if (isset($_SESSION['loggedIn'])) {
		if (basename($_SERVER['SCRIPT_NAME']) == 'login.php') {
			header("location:index");
		}
	} else {
		header("location:login");
	}
	// LOGOUT
	if (isset($_POST['logout'])) {
		unset($_SESSION['loggedIn']);
		header("location:login");
	}
?>