<body>

  <?php 
      $id = $_GET['id'];

      $error = $_GET['e'] ?? 0;
      $error_msg = "Grade Name already exists!";

      $query = "SELECT * FROM grades WHERE id='$id'";
      $result = mysqli_query($con, $query);

      if(!$result){
          die("Query Failed: " . mysqli_error($con));
      }

      $row = mysqli_fetch_array($result);

      $grade_name  = $row['grade_name'];
      $grade_group = $row['grade_group'];
      $grade_color = $row['grade_color'];
      $grade_order = $row['grade_order'];
  ?>

  <form action="grade/update.php" method="POST">

      <h1><?php echo $grade_name; ?></h1>

      <!-- error msg -->
      <?php if($error==1) { ?>
          <div>
              <?php echo $error_msg; ?>
          </div>
      <?php } ?>

      <input type="hidden" name="id" value="<?php echo $id; ?>">

      <div>

          <div>
              <label for="grade_name">Grade Name</label>
              <input type="text" name="grade_name" id="grade_name"
                     value="<?php echo $grade_name; ?>"
                     required />
          </div>

          <div>
              <label for="grade_group">Grade Group</label>
              <input type="text" name="grade_group" id="grade_group"
                     value="<?php echo $grade_group; ?>"
                     required />
          </div>

          <div>
              <label for="grade_color">Grade Color</label>
              <input type="text" name="grade_color" id="grade_color"
                     value="<?php echo $grade_color; ?>"
                     required />
          </div>

          <div>
              <label for="grade_order">Grade Order</label>
              <input type="text" name="grade_order" id="grade_order"
                     value="<?php echo $grade_order; ?>"
                     required />
          </div>

      </div>

      <div>
        <button type="submit">Update</button>
      </div>

  </form>

</body>
