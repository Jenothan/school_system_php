<!-- add_grade_sub.php -->
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			$id=$_POST['id'];
			$subjects=$_POST['subjects'];
			
			require_once('../config.php');
			
			if(!empty($subjects)){
				$que= "DELETE FROM grade_subject WHERE grade_id=$id";
					$res = mysqli_query($con, $que);
					
					if(!$res){
						die("query failed".mysqli_error($con));
					}
			}
			
			foreach($subjects as $subject) {
				$query="INSERT INTO grade_subject (grade_id, subject_id) VALUES ('$id', '$subject')";
			
				$result=mysqli_query($con,$query);
			
				if(!$result){
					die("Query failed".mysqli_error($con));
				}
			}
			
			
			header('location:index.php');
	}
?>