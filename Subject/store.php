<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			$subject_name=$_POST['subject_name'];
			$subject_index=$_POST['subject_index'];
			$subject_order=$_POST['subject_order'];
			$subject_color=$_POST['subject_color'];
			$subject_number=$_POST['subject_number'];
			
			require_once('../config.php');
			
			$check_query="SELECT subject_name, subject_index FROM subjects";
			$check_res=mysqli_query($con, $check_query);
			if(!$check_res){
				die("query error!" . mysqli_error($check_res));
			}
			
			$subject_names=[];
			$subject_indexs=[];
			while($check_row=mysqli_fetch_array($check_res)) {
				$subject_names[]=$check_row['subject_name'];
				$subject_indexs[]=$check_row['subject_index'];
			}
			
			if(in_array($subject_name, $subject_names) or in_array($subject_index, $subject_indexs)) {
				header('location:create_subject_form.php?e=1');
				exit();
			}
			else {
				
				$query="INSERT INTO subjects (subject_name, subject_index, subject_order, subject_color, subject_number) VALUES ('$subject_name', '$subject_index', '$subject_order', '$subject_color', '$subject_number')";
			
				$result=mysqli_query($con,$query);
			
				if(!$result){
					echo mysqli_error($con);
				}
				
				header('location:index.php');
			}
			
			
	}
?>