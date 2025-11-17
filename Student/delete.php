<?php
	$id=$_GET['id'];
			include('../auth/auth-session.php');
			$username=$_SESSION['username'];
			require_once('../config.php');
			
			$query = "UPDATE students SET deleted_at=NOW(), deleted_by='$username' WHERE id='$id'";	
			
			$result=mysqli_query($con,$query);
		
			if(!$result){
				die("Query failed".mysqli_error($con));
			}
			
			
			$image_query = "DELETE FROM images WHERE student_id='$id'";
			
			$image_res=mysqli_query($con, $image_query);
			if(!$image_res) {
				die("query error!" . mysqli_error($con));
			}
			
			header('location:../index.php?section=student&page=index');
	
?>