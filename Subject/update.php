<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			$id=$_POST['id'];
			$subject_name=$_POST['subject_name'];
			$subject_index=$_POST['subject_index'];
			$subject_order=$_POST['subject_order'];
			$subject_color=$_POST['subject_color'];
			$subject_number=$_POST['subject_number'];
			
			require_once('../config.php');
			
			$check_query="SELECT subject_name, subject_index FROM subjects WHERE id!='$id'";
			$check_res=mysqli_query($con, $check_query);
			if(!$check_res){
				die("query error!" . mysqli_error($con));
			}
			
			$subject_names=[];
			$subject_indexs=[];
			while($check_row=mysqli_fetch_array($check_res)) {
				$subject_names[]=$check_row['subject_name'];
				$subject_indexs[]=$check_row['subject_index'];
			}
			
			if(in_array($subject_name, $subject_names) or in_array($subject_index, $subject_indexs)) {
				header('location:../index.php?page=edit&section=subject&id='.$id.'&e=1');
				exit();
			}
			else {
			
				$query = "UPDATE subjects SET subject_order = '$subject_order', subject_color = '$subject_color', subject_number = '$subject_number' WHERE id='$id'";	
				
				$result=mysqli_query($con,$query);
			
				if(!$result){
					die("Query failed".mysqli_error($con));
				}
				
				header('location:../index.php?page=index&section=subject&id='.$id);
			}
	}
?>