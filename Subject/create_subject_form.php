<html>
  <head>
    <!-- <link rel="stylesheet" href="../global.css">
	<style>
		.form {
			width: 500px;
		}
	</style> -->
  </head>
  <body>
  <?php 
		// include('../auth/auth_session.php');
		$error=$_GET['e'] ?? 0;
		$error_msg="Subject Name or Index already exist!";
  ?>
    <div class="form">
      <form action="subject/store.php" method="POST">
        <h1>Create Subjects</h1>
		
		<?php if($error==1) { ?>
			<div class="alert alert-danger" role="alert">
			  <?php echo $error_msg; ?>
			</div>
		<?php } ?>

        <div class="row">
          <div class="col">
            <label for="subject_name">Subject Name</label>
            <input type="text" name="subject_name" id="subject_name" placeholder="Enter the Subject Name" required />
          </div>
		  
		  <div class="col">
            <label for="subject_index">Subject Index</label>
            <input type="text" name="subject_index" id="subject_index" placeholder="eg: 14363" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="subject_order">Subject Order</label>
            <input type="text" id="subject_order" name="subject_order" placeholder="eg: 1, 2, 3" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="subject_color">Subject Color</label>
            <input type="text" id="subject_color" name="subject_color" placeholder="eg: Green" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="subject_number">Subject Number</label>
            <input type="text" id="subject_number" name="subject_number" placeholder="eg: 54" required />
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
