<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			$id=$_POST['id'];
			$grade_name=$_POST['grade_name'];
			$grade_group=$_POST['grade_group'];
			$grade_color=$_POST['grade_color'];
			$grade_order=$_POST['grade_order'];
			
			require_once('../config.php');
			
			$check_query="SELECT grade_name FROM grades";
			$check_res=mysqli_query($con, $check_query);
			if(!$check_res){
				die("query error!" . mysqli_error($check_res));
			}
			
			$grade_names=[];
			while($check_row=mysqli_fetch_array($check_res)) {
				$grade_names[]=$check_row['grade_name'];
			}
			
			if(in_array($grade_name, $grade_names)) {
				header('location:edit.php?e=1');
				exit();
			}
			else {
				$query = "UPDATE grades SET grade_name = '$grade_name', grade_group = '$grade_group', grade_color = '$grade_color', grade_order = '$grade_order'";	
			
				$result=mysqli_query($con,$query);
			
				if(!$result){
					die("Query failed".mysqli_error($con));
				}
				
				header('location:index.php');
			}
	}
?>