<html>	
  <head>
    <link rel="stylesheet" href="../global.css">
  </head>
  <body>
<?php 
		$id=$_GET['id'];
		require_once('../config.php');

		$query="SELECT * FROM subjects WHERE id='$id'";
		
		$results=mysqli_query($con, $query );
		
		if(!$results){
			echo mysqli_error($con);
		}
		
		$row = mysqli_fetch_array($results);
		
			$subject_name=$row['subject_name'];
			$subject_index=$row['subject_index'];
			$subject_order=$row['subject_order'];
			$subject_color=$row['subject_color'];
			$subject_number=$row['subject_number'];
	
?>

<div>

      <form>
        <h1>Student Details</h1>
	
        <div class="name-row">
          <div class="name-col">
            <label for="subject_name">Subject Name:</label>
            <p><?php echo $subject_name; ?></p>
          </div>

          <div class="name-col">
            <label for="subject_index">Subject Index:</label>
            <p><?php echo $subject_index; ?></p>
          </div>
		  
		  <div class="name-col">
            <label for="subject_order">Subject Order:</label>
            <p><?php echo $subject_order; ?></p>
          </div>

          <div class="name-col">
            <label for="subject_color">Subject Color:</label>
            <p><?php echo $subject_color; ?></p>
          </div>
		  
		  <div class="name-col">
            <label for="subject_number">Subject Number:</label>
            <p><?php echo $subject_number; ?></p>
          </div>
		  
        </div>
      </form>
    </div>
  </body>
</html>

