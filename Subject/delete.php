<?php
	$id=$_GET['id'];
			
			require_once('../config.php');
			$check_query="SELECT subject_id FROM student_subject WHERE subject_id='$id'  AND deleted_at IS NULL";
			$check_res=mysqli_query($con, $check_query);
			if(!$check_res){
				die("Query failed".mysqli_error($con));
			}

			if(mysqli_num_rows($check_res)>0) {
				header('location:../index.php?section=subject&page=index&e=1');
				exit();
			}
			else if(mysqli_num_rows($check_res)==0){
				$query = "DELETE FROM subjects WHERE id='$id'";	
			
				$result=mysqli_query($con,$query);
			
				if(!$result){
					die("Query failed".mysqli_error($con));
				}
				
				header('location:../index.php?section=subject&page=index');
				exit();
			}
	
?>