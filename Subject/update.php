<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			$id=$_POST['id'];
			$subject_name=$_POST['subject_name'];
			$subject_index=$_POST['subject_index'];
			$subject_order=$_POST['subject_order'];
			$subject_color=$_POST['subject_color'];
			$subject_number=$_POST['subject_number'];
			
			require_once('../config.php');
			
			$query = "UPDATE subjects SET subject_order = '$subject_order', subject_color = '$subject_color', subject_number = '$subject_number'";	
			
			$result=mysqli_query($con,$query);
		
			if(!$result){
				die("Query failed".mysqli_error($con));
			}
			
			header('location:index.php');
	}
?>