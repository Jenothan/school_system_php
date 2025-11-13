<?php 

    require_once('../config.php');
    include('../auth/auth_session.php');
    $id=$_GET['id'];
	
		$check_query="SELECT * FROM images WHERE student_id='$id'";
		$check_res=mysqli_query($con, $check_query);
		if(!$check_res){
			die("Query failed!" . mysqli_error($con));
		}
		
		
		$file_path="";
		if(mysqli_num_rows($check_res)>0) {
			$check_row=mysqli_fetch_array($check_res);
			$file_path=$check_row['file_name'];
			
			if(file_exists($file_path)) {
				unlink($file_path);
			}
			
		$delete_img="DELETE FROM images where student_id='$id'";
		$delete_res=mysqli_query($con, $delete_img);
		if(!$delete_res){
			die("query failed" . mysqli_error($con));
		}

        header('location:../index.php?page=edit&section=student&id=' . $id);	
		exit();
	} else {
			header('location:../index.php?page=edit&section=student&id=' . $id . '&e=2');	
	}
				
?>