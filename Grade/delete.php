<?php
	$id=$_GET['id'];
			
			require_once('../config.php');
			
			$query = "DELETE FROM grades SET deleted_at=NOW() WHERE id='$id'";	
			
			$result=mysqli_query($con,$query);
		
			if(!$result){
				die("Query failed".mysqli_error($con));
			}
			
			header('location:index.php');
	
?>