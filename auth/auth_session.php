<?php
	define('BASE_URL','http://localhost/jenothan/School_Data');
	session_start();

	if (!isset($_SESSION['username'])) {
		header('Location:'. BASE_URL .'/auth/login_form.php');
		exit();
	}
?>
