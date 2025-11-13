<html>	
  <head>
    <!-- <link rel="stylesheet" href="../global.css"> -->
	
  </head>
  <body>
<?php 
		// include('../auth/auth_session.php');
		$id=$_GET['id'];
		// require_once('../config.php');

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
		
		<div>
			<table class="table-col">
				<thead>
					<tr>
						<th>Subject Name</th>
						<td><p><?php echo $subject_name; ?></p></td>
					</tr>
					<tr>
						<th>Subject Index</th>
						<td><p><?php echo $subject_index; ?></p></td>
					</tr>
					<tr>
						<th>Subject Order</th>
						<td><p><?php echo $subject_order; ?></p></td>
					</tr>
					<tr>
						<th>Subject Color</th>
						<td><p><?php echo $subject_color; ?></p></td>
					</tr>
					<tr>
						<th>Subject Number</th>
						<td><p><?php echo $subject_number; ?></p></td>
					</tr>
				</thead>
				
			</table>
		</div>
	
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
		<a href="?page=edit&section=subject&id=<?php echo $id; ?>" class="btn btn-warning">Edit</a>
      </form>
    </div>
  </body>
</html>

