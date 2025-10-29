<html>
  <head>
    <link rel="stylesheet" href="../global.css">
	<style>
		.form {
			width: 500px;
		}
	</style>
  </head>
  <body>
   <?php $id=$_GET['id']; ?>
   
	<?php 
		require_once('../config.php');
		
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
      <form action="update.php" method="POST">
        <h1>Edit Student</h1>
			<input type='hidden' name='id' id='id' value="<?php echo $id; ?>"/>
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
            <input type="text" id="grade_id" name="grade_id" value="<?php echo $grade_id; ?>" required />
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
