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
  <?php include('../auth/auth_session.php'); ?>
    <div class="form">
      <form action="store.php" method="POST">
        <h1>Create Student</h1>

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
            <input type="text" id="grade_id" name="grade_id" required />
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
