<!-- addsub_form.php -->
<html>	
  <head>
    <link rel="stylesheet" href="../global.css">
	<style>
	.check-loop {
		display: flex;
		flex-direction: row;
        justify-content: center;
        align-items: center;
	}
	</style>
  </head>
  <body>
<?php 
		include('../auth/auth_session.php');
		$id=$_GET['id'];
		require_once('../config.php');
		
		//---------------------------------------------------------------------------------

		$student_query="SELECT * FROM students WHERE id='$id'";
		$student_results=mysqli_query($con, $student_query);
		if(!$student_results){
			echo mysqli_error($con);
		}
		
		//---------------------------------------------------------------------------------
		
		$stu_sub_query="SELECT subject_id FROM student_subject WHERE student_id='$id'";
		$stu_sub_res=mysqli_query($con, $stu_sub_query);
		if(!$stu_sub_res) {
			die("Query Failed!".mysqli_error($con));
		}
		
		//----------------------------------------------------------------------------------
		
		
		$row = mysqli_fetch_array($student_results);
		
			$father_name=$row['father_name'];
			$student_name=$row['student_name'];
			$addmission_no=$row['addmission_no'];
			$grade_id=$row['grade_id'];
			$nic=$row['nic'];
			$dob=$row['dob'];
			$gender=$row['gender']?? "";
			$telephone=$row['telephone'];
			$address=$row['address'];
		
		//----------------------------------------------------------------------------------
			
		
		$quer="SELECT subject_id FROM grade_subject WHERE grade_id='$grade_id'";
		$res=mysqli_query($con, $quer);
		if(!$res) {
			die("Query Failed!".mysqli_error($con));
		}
	
?>

<div>

      <form action="addsub.php" method="POST">
        <h1>Student Details</h1>
	
        <div class="name-row">
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
            <p><?php echo $grade_id; ?></p>
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
		  <input type="hidden" value="<?php echo $id; ?>" name='id'/>
		  <div class="name-row">
		  
		  
		  <table>
			<tr>
					<th>Subject ID</th>
					<th>Subject Name</th>
			</tr>
		  
		  <?php 
		  
		  //--------------------Fetch subjects from student_subject table------------------------------------------
				
				$subject_ids=[];
				while($stu_sub_row=mysqli_fetch_array($stu_sub_res)){
					$subject_ids[]=$stu_sub_row['subject_id'];
				}
		
		  //--------------------Fetch subjects from student_subject table------------------------------------------
	  
		  while($table_rows=mysqli_fetch_assoc($res)) {
				$sub_id=$table_rows['subject_id'];
				$table_que="SELECT id, subject_name FROM subjects WHERE id='$sub_id'";
		
				$table_res=mysqli_query($con, $table_que);
				
				if(!$table_res) {
					die("Query Failed!".mysqli_error($con));
				}
			
				$table_rows=mysqli_fetch_assoc($table_res); ?>
				<?php if(in_array($table_rows['id'], $subject_ids)) { ?>
			<tr>
				<td><?php echo $table_rows['id']; ?></td>
				<td><?php echo $table_rows['subject_name']; ?></td>
			</tr>
			
			<?php } ?>
		  <?php } ?>
		  </table>
	<?php 		 
		 
				
				/*if(!empty($subject_ids)){
					echo "subjects found";
				}
				else {
					echo "Subjects not found";
				}*/
				
		//------------------------Fetch specific subject name from subjects table----------------------------------
			$quer="SELECT subject_id FROM grade_subject WHERE grade_id='$grade_id'";
			$res=mysqli_query($con, $quer);
			if(!$res) {
				die("Query Failed!".mysqli_error($con));
			}
		
			while($rows=mysqli_fetch_assoc($res)) {
				$sub_id=$rows['subject_id'];
				$que="SELECT id, subject_name FROM subjects WHERE id='$sub_id'";
		
				$re=mysqli_query($con, $que);
				
				if(!$re) {
					die("Query Failed!".mysqli_error($con));
				}
			
				$rows1=mysqli_fetch_assoc($re);
				
					
			//----------------------Show specific subject name------------------------------------------------------			
				?>
			<div class="check-loop">
			  <input type="checkbox" id="<?php echo $rows1['subject_name']; ?>" value="<?php echo $rows1['id']; ?>" name="subjects[]" <?php if(in_array($rows['subject_id'], $subject_ids)) { echo "checked"; } ?> />
			  <label for="<?php echo $rows1['subject_name']; ?>" ><?php echo $rows1['subject_name']; ?></label>
			</div>
			<?php } ?>
			</div>
			<br>
			
		<div class="actions">
          <input type="reset" />
          <input type="submit" />
        </div>
		  
        </div>
      </form>
    </div>
  </body>
</html>

