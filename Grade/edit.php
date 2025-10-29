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
		
		$query="SELECT * FROM grade WHERE id='$id'";
		
		$result=mysqli_query($con, $query);
		
		if(!$result) {
			die("Query Failed".mysqli_error($con));
		}
		
		$row=mysqli_fetch_array($result);
		
			$grade_name=$row['grade_name'];
			$grade_group=$row['grade_group'];
			$grade_color=$row['grade_color'];
			$grade_order=$row['grade_order'];
		
	?>
    <div class="form">
      <form action="update.php" method="POST">
        <h1>Edit Grade</h1>

        <div class="row">
          <div class="col">
            <label for="grade_name">Grade Name</label>
            <input type="text" name="grade_name" id="grade_name" value="<?php echo $grade_name; ?>" required />
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" required />
          </div>
		  
		  <div class="col">
            <label for="grade_group">Grade Group</label>
            <input type="text" name="grade_group" id="grade_group" value="<?php echo $grade_group; ?>" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="grade_color">Grade Color</label>
            <input type="text" id="grade_color" name="grade_color" value="<?php echo $grade_color; ?>" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="grade_order">Grade Order</label>
            <input type="text" id="grade_order" name="grade_order" value="<?php echo $grade_order; ?>" required />
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
