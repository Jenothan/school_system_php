<html>	
  <head>
    <link rel="stylesheet" href="../global.css">
	<style>
	.check-loop{
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
		  <?php 
				$stu_sub_query="SELECT subject_id FROM student_subject WHERE student_id='$id'";
				$stu_sub_res=mysqli_query($con, $stu_sub_query);
				if(!$stu_sub_res) {
					die("Query Failed!".mysqli_error($con));
				}
				
				$subject_ids=[];
				while($stu_sub_row=mysqli_fetch_array($stu_sub_res)){
					$subject_ids[]=$stu_sub_row['subject_id'];
				}
				
				if(!$stu_sub_row){
					echo "subjects found";
				}
				else {
					echo "Subjects not found";
				}
				
		  ?>
		  <?php
			$quer="SELECT id, subject_name FROM subjects";
		
			$res=mysqli_query($con, $quer);
			
			if(!$res) {
				die("Query Failed!".mysqli_error($con));
			}
			while($rows=mysqli_fetch_assoc($res)) { ?>
			<div class="check-loop">
		  <input type="checkbox" id="="<?php echo $rows['subject_name']; ?>" value="<?php echo $rows['id']; ?>" name="subjects[]" <?php if(in_array($rows['id'], $subject_ids)) { echo "checked"; } ?> />
		  <label for="<?php echo $rows['subject_name']; ?>" ><?php echo $rows['subject_name']; ?></label>
		  </div>
			<?php } ?>
			</div>
			
		<div class="actions">
          <input type="reset" />
          <input type="submit" />
        </div>
		  
        </div>
      </form>
    </div>
  </body>
</html>

