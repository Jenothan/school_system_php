<?php
	define('BASE_URL','http://localhost/jenothan/school-data');
	session_start();

	if (!isset($_SESSION['username'])) {
		header('Location:'. BASE_URL .'/auth/login_form.php');
		exit();
	}
	
	$username='';
	if(isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
	}
?>