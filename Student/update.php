<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			$id=$_POST['id'];
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
			
			$query = "UPDATE students SET father_name = '$father_name', student_name = '$student_name', addmission_no = '$addmission_no', grade_id = '$grade_id', nic = '$nic', dob = '$dob', gender = '$gender', telephone = '$telephone', address = '$address' WHERE id = '$id'";	
			
			$result=mysqli_query($con,$query);
		
			if(!$result){
				die("Query failed".mysqli_error($con));
			}
			
			header('location:index.php');
	}
?>