<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			$grade_name=$_POST['grade_name'];
			$grade_group=$_POST['grade_group'];
			$grade_color=$_POST['grade_color'];
			$grade_order=$_POST['grade_order'];
			
			require_once('../config.php');
			
			$query="INSERT INTO grade (grade_name, grade_group, grade_color, grade_order) VALUES ('$grade_name', '$grade_group', '$grade_color', '$grade_order')";
			
			$result=mysqli_query($con,$query);
		
			if(!$result){
				echo mysqli_error($con);
			}
			
			header('location:index.php');
	}
?>