<html>
  <head>
    <link rel="stylesheet" href="../global.css">
	<style>
		.form {
			width: 500px;
		}
	</style>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

  </head>
  <body>
  <?php 
		// include('../auth/auth_session.php');
		// require_once('../config.php');
		
		$error=$_GET['e'] ?? 0;
		$error_msg="Student Addmission number or nic already exist!";
		
		$query="SELECT id, grade_name FROM grades";
		
		$result=mysqli_query($con, $query);
		
		if(!$result) {
			die("Query Failed!".mysqli_error($con));
		}
		
  ?>
    <div class="form">
      <form action="student/store.php" method="POST">
        <h1>Create Student</h1>
		
		<?php if($error==1) { ?>
			<div class="alert alert-danger" role="alert">
			  <?php echo $error_msg; ?>
			</div>
		<?php } ?>
	
        <div class="row">
          <div class="col">
            <label for="father_name">Father Name</label>
            <input type="text" name="father_name" id="father_name" required />
          </div>
		  
		  <div class="col">
            <label for="student_name">Student Name</label>
            <input type="text" name="student_name" id="student_name" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="addmission_no">Addmission No</label>
            <input type="text" id="addmission_no" name="addmission_no" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="grade_id">Grade ID</label>
			<select name="grade_id" id="grade_id" required>
				<option value="" disabled selected>Select your Grade</option>
				
			<?php while($row=mysqli_fetch_assoc($result)) { ?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['grade_name']; ?></option>
			<?php } ?>
			</select>
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="nic">NIC</label>
            <input type="text" id="nic" name="nic" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" required />
          </div>
        </div>

        <label for="gender">Gender</label>
		<div class="gender-row" required>
		  <input type="radio" id="male" value="male" name="gender" required />
		  <label for="male">Male</label>
		  <input type="radio" id="female" value="female" name="gender" required />
		  <label for="female">Female</label>
		</div>

        <div class="row">
		  <div class="col">
            <label for="address">Address</label>
			<textarea id="address" name="address" rows="3" required></textarea>
          </div>
		 </div>
		 
		<div class="row">
          <div class="col">
            <label for="phone">Telephone</label>
            <input type="tel" id="phone" name="telephone" required />
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
