<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			$id=$_POST['id'];
			$subjects=$_POST['subjects'];
			
			require_once('../config.php');
			
			foreach($subjects as $subject) {
				$query="INSERT INTO student_subject (student_id, subject_id) VALUES ('$id', '$subject')";
			
				$result=mysqli_query($con,$query);
			
				if(!$result){
					echo mysqli_error($con);
				}
			}
			
			
			header('location:index.php');
	}
?>