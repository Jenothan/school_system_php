<html>	
  <head>
    <!-- <link rel="stylesheet" href="../global.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  </head>
  <body>
<?php 
		// include('../auth/auth_session.php');
		$id=$_GET['id'];
		// require_once('../config.php');

		$query="SELECT * FROM students WHERE id='$id'";
		
		$results=mysqli_query($con, $query );
		
		if(!$results){
			echo mysqli_error($con);
		}
		
		$row = mysqli_fetch_array($results);
		
			$father_name=$row['father_name'];
			$student_name=$row['student_name'];
			$addmission_no=$row['addmission_no'];
			$grade_id=$row['grade_id'];
			$nic=$row['nic'];
			$dob=$row['dob'];
			$gender=$row['gender']?? "";
			$telephone=$row['telephone'];
			$address=$row['address'];
			
		$grade_query="SELECT grade_name FROM grades WHERE id='$grade_id'";
		$grade_res=mysqli_query($con, $grade_query);
		$grade_row=mysqli_fetch_array($grade_res);
		$grade_name=$grade_row['grade_name'];
	
?>

<div>

      <form>
        <h1>Student Details</h1>
		<?php 
				$img_query="SELECT * FROM images WHERE student_id='$id'";
				$img_res=mysqli_query($con, $img_query);
				if(!$img_res){
					die("query failed" . mysqli_error($con));
				}
				$path="../profiles/def";
				if(mysqli_num_rows($img_res)>0) {
					$img_row=mysqli_fetch_array($img_res);
					$path=$img_row['file_name'];
				}
				
				$quer="SELECT subject_id FROM student_subject WHERE student_id='$id'";
				$res=mysqli_query($con, $quer);
				if(!$res) {
					die("Query Failed!".mysqli_error($con));
				}
				
				$subjects=[];
			  while($table_rows=mysqli_fetch_assoc($res)) {
					$sub_id=$table_rows['subject_id'];
					$table_que="SELECT subject_name FROM subjects WHERE id='$sub_id'";
			
					$table_res=mysqli_query($con, $table_que);
					
					if(!$table_res) {
						die("Query Failed!".mysqli_error($con));
					}
				
					$table_r=mysqli_fetch_assoc($table_res);
					$subjects[]=$table_r['subject_name'];
			  }
			  
			  $subject_string=implode(", ", $subjects);
			?>
		
        <div class="name-row">
			<div class="name-col">
				<img src='<?php echo $path; ?>' alt='profile image' width=150 height=150 style='border-radius:100%;' /> 
			</div>
          <div class="name-col">
            <label for="father_name">Father Name:</label>
            <p><?php echo $father_name; ?></p>
          </div>

          <div class="name-col">
            <label for="student_name">Student Name:</label>
            <p><?php echo $student_name; ?></p>
          </div>
		  
		  <div class="name-col">
            <label for="addmission_no">Addmission Number:</label>
            <p><?php echo $addmission_no; ?></p>
          </div>

          <div class="name-col">
            <label for="grade_id">Grade ID:</label>
            <p><?php echo $grade_name; ?></p>
          </div>
		  
		  <div class="name-col">
            <label for="nic">NIC:</label>
            <p><?php echo $nic; ?></p>
          </div>
		  
		  <div class="name-col">
            <label for="dob">DOB:</label>
            <p><?php echo $dob; ?></p>
          </div>
		  
		  <div class="name-col">
            <label for="gender">Gender:</label>
            <p><?php echo $gender; ?></p>
          </div>
		  
		  <div class="name-col">
            <label for="telephone">Telephone:</label>
            <p><?php echo $telephone; ?></p>
          </div>
		  
		  <div class="name-col">
            <label for="address">Address:</label>
            <p><?php echo $address; ?></p>
          </div>
		  
		  <div class="name-col">
            <label for="subjects">Subjects:</label>
            <p><?php echo !empty($subjects) ? $subject_string : 'Subjects not assigned'; ?></p>
          </div>
		  
        </div>
		<a href="?section=student&page=edit&id=<?php echo $id; ?>" class="btn btn-warning">Edit</a>
      </form>
    </div>
  </body>
</html>

