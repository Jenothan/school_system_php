<?php 
    require_once('../config.php');
    include('../auth/auth_session.php');
    $id=$_GET['id'];

				$delete_img="DELETE FROM images where student_id='$id'";
				$delete_res=mysqli_query($con, $delete_img);
				if(!$delete_res){
					die("query failed" . mysqli_error($con));
				}

                header('location:edit.php?id=' . $id);
				?>