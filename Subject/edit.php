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
	<?php 
		include('../auth/auth_session.php');
		$id=$_GET['id'];
		require_once('../config.php');
		
		$query="SELECT * FROM subjects WHERE id='$id'";
		
		$result=mysqli_query($con, $query);
		
		if(!$result) {
			die("Query Failed".mysqli_error($con));
		}
		
		$row=mysqli_fetch_array($result);
		
			$subject_name=$row['subject_name'];
			$subject_index=$row['subject_index'];
			$subject_order=$row['subject_order'];
			$subject_color=$row['subject_color'];
			$subject_number=$row['subject_number'];
		
	?>
    <div class="form">
      <form action="update.php" method="POST">
        <h1>Create Subjects</h1>

        <div class="row">
          <div class="col">
            <label for="subject_name">Subject Name</label>
            <input type="text" name="subject_name" id="subject_name" value="<?php echo $subject_name; ?>" required />
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" required />
          </div>
		  
		  <div class="col">
            <label for="subject_index">Subject Index</label>
            <input type="text" name="subject_index" id="subject_index" value="<?php echo $subject_index; ?>" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="subject_order">Subject Order</label>
            <input type="text" id="subject_order" name="subject_order" value="<?php echo $subject_order; ?>" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="subject_color">Subject Color</label>
            <input type="text" id="subject_color" name="subject_color" value="<?php echo $subject_color; ?>" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="subject_number">Subject Number</label>
            <input type="text" id="subject_number" name="subject_number" value="<?php echo $subject_number; ?>" required />
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
