<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			$subject_name=$_POST['subject_name'];
			$subject_index=$_POST['subject_index'];
			$subject_order=$_POST['subject_order'];
			$subject_color=$_POST['subject_color'];
			$subject_number=$_POST['subject_number'];
			
			require_once('../config.php');
			
			$query="INSERT INTO subjects (subject_name, subject_index, subject_order, subject_color, subject_number) VALUES ('$subject_name', '$subject_index', '$subject_order', '$subject_color', '$subject_number')";
			
			$result=mysqli_query($con,$query);
		
			if(!$result){
				echo mysqli_error($con);
			}
			
			header('location:index.php');
	}
?>