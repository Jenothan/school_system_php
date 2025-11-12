<!-- add_grade_sub_form.php -->
<html>	
  <head>
    <link rel="stylesheet" href="../global.css">
	<style>
	.check-loop{
		display: flex;
		flex-direction: row;
        justify-content: center;
        align-items: center;
	}
	</style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
<?php 
		include('../auth/auth_session.php');
		$id=$_GET['id'];
		require_once('../config.php');

		$query="SELECT * FROM grades WHERE id='$id'";
		
		$results=mysqli_query($con, $query );
		
		if(!$results){
			echo mysqli_error($con);
		}
		
		$row = mysqli_fetch_array($results);
		
			$grade_name=$row['grade_name'];
			$grade_group=$row['grade_group'];
			$grade_color=$row['grade_color'];
			$grade_order=$row['grade_order'];
	
?>

<div>

      <form action="add_grade_sub.php" method="POST">
        <h1>Student Details</h1>
	
        <div class="name-row">
          <div class="name-col">
            <label for="grade_name">Grade Name:</label>
            <p><?php echo $grade_name; ?></p>
          </div>

          <div class="name-col">
            <label for="grade_group">Grade group:</label>
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
		  
		  <input type="hidden" value="<?php echo $id; ?>" name='id'/>
		  <div class="name-row"> 
		  <?php 
				$grd_sub_query="SELECT subject_id FROM grade_subject WHERE grade_id='$id'";
				$grd_sub_res=mysqli_query($con, $grd_sub_query);
				if(!$grd_sub_res) {
					echo "Query Failed";
				}
				
				$subject_ids=[];
				while($grd_sub_row=mysqli_fetch_array($grd_sub_res)){
					$subject_ids[]=$grd_sub_row['subject_id'];
				}
				
				if(empty($subject_ids)){
					echo "No subjects found";
				}
				
				
		  ?>
		  <?php
			$quer="SELECT id, subject_name FROM subjects";
		
			$res=mysqli_query($con, $quer);
			
			if(!$res) {
				die("Query Failed!".mysqli_error($con));
			}
			while($rows=mysqli_fetch_assoc($res)) { ?>
			<div class="form-check">
		  <input type="checkbox" class="form-check-input" id="="<?php echo $rows['subject_name']; ?>" value="<?php echo $rows['id']; ?>" name="subjects[]" <?php if(in_array($rows['id'], $subject_ids)) { echo "checked"; } ?> />
		  <label class="form-check-label" for="<?php echo $rows['subject_name']; ?>" ><?php echo $rows['subject_name']; ?></label>
		  </div>
			<?php } ?>
			</div>
			
		<div class="actions">
          <input type="reset" />
          <input type="submit" />
        </div>
		  
        </div>
      </form>
    </div>
  </body>
</html>

