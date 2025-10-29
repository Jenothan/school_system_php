<html>	
  <head>
    <link rel="stylesheet" href="../global.css">
  </head>
  <body>
<?php 
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

      <form>
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
		  
        </div>
      </form>
    </div>
  </body>
</html>

