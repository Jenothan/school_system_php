<?php 
	require_once('../config.php');
	$sub_id=$_GET['sub_id'];
	$stu_id=$_GET['stu_id'];
	
		$query= "DELETE FROM student_subject WHERE student_id='$stu_id' AND subject_id='$sub_id'";
		$result = mysqli_query($con,$query);
			if(!$result){
				die("query failed".mysqli_error($con));
			}
	header("Location: addsub_form.php?id=$stu_id");
?>