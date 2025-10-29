<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			$father_name=$_POST['father_name'];
			$student_name=$_POST['student_name'];
			$addmission_no=$_POST['addmission_no'];
			$grade_id=$_POST['grade_id'];
			$nic=$_POST['nic'];
			$dob=$_POST['dob'];
			$gender=$_POST['gender'];
			$telephone=$_POST['telephone'];
			$address=$_POST['address'];
			
			require_once('../config.php');
			
			$query="INSERT INTO students (father_name, student_name, addmission_no, grade_id, nic, dob, gender, telephone, address) VALUES ('$father_name', '$student_name', '$addmission_no', '$grade_id', '$nic', '$dob', '$gender', '$telephone', '$address')";
			
			$result=mysqli_query($con,$query);
		
			if(!$result){
				echo mysqli_error($con);
			}
			
			header('location:index.php');
	}
?>