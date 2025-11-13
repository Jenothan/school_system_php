<html>
  <head>
    <!-- <link rel="stylesheet" href="../global.css"> -->
	<!-- <style>
		.form {
			width: 500px;
		}
	</style> -->
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  </head>
  <body>
   <?php $id=$_GET['id'];
		 $error=$_GET['e'] ?? 0;
		 if($error == 1) {
		 $error_msg="Student Addmission number or nic already exist!";
		 }
		 else if($error == 2) {
			 $error_msg="Image not found!";
		 }
	?>
   
	<?php 
		// include('../auth/auth_session.php');
		// require_once('../config.php');
		
		$query="SELECT * FROM students WHERE id='$id'";
		
		$result=mysqli_query($con, $query);
		
		if(!$result) {
			die("Query Failed".mysqli_error($con));
		}
		
		$row=mysqli_fetch_array($result);
		
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
	
    <div class="form">
      <form action="student/update.php" method="POST" enctype="multipart/form-data">
        <h1>Edit Student</h1>
		
		<?php if($error==1 or $error==2) { ?>
			<div class="alert alert-danger" role="alert">
			  <?php echo $error_msg; ?>
			</div>
		<?php } ?>
		
			<input type='hidden' name='id' id='id' value="<?php echo $id; ?>"/>
			
			<?php 
				$img_query="SELECT * FROM images WHERE student_id='$id'";
				$img_res=mysqli_query($con, $img_query);
				if(!$img_res){
					die("query failed" . mysqli_error($con));
				}
				$path="profiles/def.jpg";
				if(mysqli_num_rows($img_res)>0) {
					$img_row=mysqli_fetch_array($img_res);
					$path=substr($img_row['file_name'],3);
				}
			?>
		<div style='background-color: #F6F7EB; padding: 20px; display: flex; flex-direction: column; justify-content: center; align-items: center; border-radius: 10px; border: 1px solid #ADD2C2; margin-bottom: 10px; gap: 10px;'>
			<img src='<?php echo $path; ?>' alt='profile image' width=150 height=150 style='border-radius:100%;' /> 
			

			<a href="student/delete_img.php?id=<?php echo $id; ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete?')">Delete</a>
		</div>
			<input type="file" id="file" name="imagefile" accept="image/*" class="form-control" >
		
        <div class="row">
          <div class="col">
            <label for="father_name">Father Name</label>
            <input type="text" name="father_name" id="father_name" value="<?php echo $father_name; ?>" required />
          </div>
		  
		  <div class="col">
            <label for="student_name">Student Name</label>
            <input type="text" name="student_name" id="student_name" value="<?php echo $student_name; ?>" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="addmission_no">Addmission No</label>
            <input type="text" id="addmission_no" name="addmission_no" value="<?php echo $addmission_no; ?>" required />
          </div>
        </div>
		
		
		<div class="row">
          <div class="col">
            <label for="grade_id">Grade ID</label>
			<select name="grade_id" id="grade_id" required>
				<option value="" disabled selected>Select your Grade</option>
				
	<?php
			$quer="SELECT id, grade_name FROM grades";
			
			$res=mysqli_query($con, $quer);
			
			if(!$res) {
				die("Query Failed!".mysqli_error($con));
			}
			while($rows=mysqli_fetch_assoc($res)) { ?>
				<option value="<?php echo $rows['id']; ?>" <?php echo $rows['id']==$grade_id ? 'selected' : ''; ?>><?php echo $rows['grade_name']; ?></option>
			<?php } ?>
			</select>
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="nic">NIC</label>
            <input type="text" id="nic" name="nic" value="<?php echo $nic; ?>" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required />
          </div>
        </div>

        <label for="gender">Gender</label>
		<div class="gender-row" required>
		  <input type="radio" id="male" value="male" name="gender" <?php echo $gender=='male' ? 'checked' : '' ?> required />
		  <label for="male">Male</label>
		  <input type="radio" id="female" value="female" name="gender" <?php echo $gender=='female' ? 'checked' : '' ?> required />
		  <label for="female">Female</label>
		</div>

        <div class="row">
		  <div class="col">
            <label for="address">Address</label>
			<textarea id="address" name="address" rows="3" required><?php echo $address; ?></textarea>
          </div>
		</div>
		 
		<div class="row">
          <div class="col">
            <label for="phone">Telephone</label>
            <input type="tel" id="phone" name="telephone" value="<?php echo $telephone; ?>" required />
          </div>
        </div>

        

        <div class="actions">
          <input type="reset" />
          <input type="submit" />
        </div>
      </form>
    </div>
  </body>
</html>
