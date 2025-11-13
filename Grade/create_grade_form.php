<html>
  <head>
    <!-- <link rel="stylesheet" href="../global.css"> -->
	<style>
		.form {
			width: 500px;
		}
	</style>
  </head>
  <body>
  <?php 
		//include('../auth/auth_session.php');
		$error=$_GET['e'] ?? 0;
		$error_msg="Grade Name already exist!";

    $path="/jenothan/school-data/grade/create_grade_form.php";
    if($_SERVER['PHP_SELF']==$path) {
      include('../auth/auth_session.php');
    }
    
  ?>
    <div class="form">
      <form action="grade/store.php" method="POST">
        <h1>Create Grade</h1>
		
		<?php if($error==1) { ?>
			<div class="alert alert-danger" role="alert">
			  <?php echo $error_msg; ?>
			</div>
		<?php } ?>
		
        <div class="row">
          <div class="col">
            <label for="grade_name">Grade Name</label>
            <input type="text" name="grade_name" id="grade_name" placeholder="eg: 10A" required />
          </div>
		  
		  <div class="col">
            <label for="grade_group">Grade Group</label>
            <input type="text" name="grade_group" id="grade_group" placeholder="eg: 10" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="grade_color">Grade Color</label>
            <input type="text" id="grade_color" name="grade_color" placeholder="eg: Green" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="grade_order">Grade Order</label>
            <input type="text" id="grade_order" name="grade_order" placeholder="eg: 1, 2, 3" required />
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
