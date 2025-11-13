<!-- addsub.php -->
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			$id=$_POST['id'];
			$subjects=$_POST['subjects'];
			print_r($subjects);
			require_once('../config.php');
			
			$stu_query="SELECT subject_id FROM student_subject WHERE student_id='$id'";
			$stu_res=mysqli_query($con, $stu_query);
			if(!$stu_res) {
				die("query failed!" . mysqli_error($con));
			}
				
				$sub_ids=[];
			while($stu_row=mysqli_fetch_array($stu_res)) {
				$sub_ids[]=$stu_row['subject_id'];
				}
				
			foreach($subjects as $subject) {
				if(!in_array($subject, $sub_ids)) {
					$sub_query="INSERT INTO student_subject (student_id, subject_id) VALUES ('$id', '$subject')";
					$sub_res=mysqli_query($con, $sub_query);
				}
			}
			header('location:../index.php?page=addsub_form&section=student&id='.$id);
	}
?>