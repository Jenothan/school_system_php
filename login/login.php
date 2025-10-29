<?php 
	if($_SERVER['REQUEST_METHOD']== 'POST') {
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		require_once('../config.php');
		
		$query="SELECT * FROM users WHERE username='$username' AND password='$password'";
		
		$result=mysqli_query($con, $query);
		
		if(!$result) {
			mysqli_error($con);
		}
		
		$row=mysqli_num_rows($result);
		
		if($row==1){
			session_start();
			$_SESSION['username'] = $username;
			header('location:welcome.php');
		}
		else {
			
			die("Login Failed!");
		}
		
	}
	else {
		echo "It's not POST method";
	}
?>