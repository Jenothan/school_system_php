<?php
	include('../auth/auth-session.php');

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
			
			
			
			$check_query="SELECT addmission_no, nic FROM students WHERE addmission_no='$addmission_no' OR nic='$nic'";
			$check_res=mysqli_query($con, $check_query);
			
			if(mysqli_num_rows($check_res)>0) {
				header('location:../index.php?page=create-form&section=student&e=1');
			}
			else {
				$query="INSERT INTO students (father_name, student_name, addmission_no, grade_id, nic, dob, gender, telephone, address, created_by) VALUES ('$father_name', '$student_name', '$addmission_no', '$grade_id', '$nic', '$dob', '$gender', '$telephone', '$address', '$username')";
			
				$result=mysqli_query($con,$query);
			
				if(!$result){
					echo mysqli_error($con);
				}
				
				header('location:../index.php?page=index&section=student');
			}
			
	}
?>