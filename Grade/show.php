<html>	
  <head>
    <link rel="stylesheet" href="../global.css">
  </head>
  <body>
<?php 
		include('../auth/auth_session.php');
		$id=$_GET['id'];
		require_once('../config.php');

		$query="SELECT * FROM grade WHERE id='$id'";
		
		$results=mysqli_query($conn, $query );
		
		if(!$results){
			echo mysqli_error($conn);
		}
		
		$row = mysqli_fetch_array($results);
		
			$grade_name=$row['grade_name']?? "";
			$grade_group=$row['grade_group']?? "";
			$grade_color=$row['grade_color']?? "";
			$grade_order=$row['grade_order']?? "";
	
?>

<div>

      <form>
        <h1>Grade Details</h1>
	
        <div class="name-row">
          <div class="name-col">
            <label for="grade_name">Grade Name:</label>
            <p><?php echo $grade_name; ?></p>
          </div>

          <div class="name-col">
            <label for="grade_group">Grade Group:</label>
            <p><?php echo $grade_group; ?></p>
          </div>
		  
		  <div class="name-col">
            <label for="grade_color">Grade Color:</label>
            <p><?php echo $grade_color; ?></p>
          </div>

          <div class="name-col">
            <label for="grade_order">Grade Order:</label>
            <p><?php echo $grade_order; ?></p>
          </div>
		  
        </div>
      </form>
    </div>
  </body>
</html>

