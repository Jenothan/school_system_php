<html>
	<body>
		<?php 
			session_start();
			if(!isset($_SESSION['username'])) {
				header('location:login_form.php');
				exit();
			}
			echo"<h1> Welcome Home</h1>";
			echo"<p> Login success</p>"; 
		?>
		<a href="logout.php">Logout</a>
		
		
	</body>
</html>