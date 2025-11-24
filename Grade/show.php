<body>

  <?php
  $id = $_GET['id'];

  $query = "SELECT * FROM grades WHERE id='$id'";
  $results = mysqli_query($con, $query);

  if (!$results) {
    echo mysqli_error($con);
  }

  $row = mysqli_fetch_array($results);

  $grade_name  = $row['grade_name'] ?? "";
  $grade_group = $row['grade_group'] ?? "";
  $grade_color = $row['grade_color'] ?? "";
  $grade_order = $row['grade_order'] ?? "";

  //-------------------------------------------- get subjects ----------------------------------------------------------

  $subject_ids = [];
  $subject_query = "SELECT subject_id FROM grade_subject WHERE grade_id='$id'";
  $subject_res = mysqli_query($con, $subject_query);
  while($sub_row = mysqli_fetch_assoc($subject_res)){
      $sub_id = $sub_row['subject_id'];
      $sub_name_query = "SELECT subject_name FROM subjects WHERE id='$sub_id'";
      $sub_name_res = mysqli_query($con, $sub_name_query);
      $sub_name = mysqli_fetch_assoc($sub_name_res)['subject_name'];
      $subject_ids[] = $sub_name;
  }
  $subject_string = !empty($subject_ids) ? implode(", ", $subject_ids) : "<div> Subjects not assigned <a href='?section=grade&page=add-sub-form&id=$id' title='Add new subjects to the grade'>Add</a></div>";
  ?>

  <div>

    <h1><?php echo $grade_name; ?></h1>

    <div>
        <a href="?section=grade&page=edit&id=<?php echo $id; ?>">Edit</a>
    </div>

    <table border="1">
      <tr>
        <th>Field</th>
        <th>Details</th>
      </tr>

      <tr>
        <td>Grade Name</td>
        <td><?php echo $grade_name; ?></td>
      </tr>

      <tr>
        <td>Grade Group</td>
        <td><?php echo $grade_group; ?></td>
      </tr>

      <tr>
        <td>Grade Color</td>
        <td><?php echo $grade_color; ?></td>
      </tr>

      <tr>
        <td>Grade Order</td>
        <td><?php echo $grade_order; ?></td>
      </tr>

      <tr>
        <td>Subjects</td>
        <td><?php echo $subject_string; ?></td>
      </tr>
    </table>
  </div>

</body>
