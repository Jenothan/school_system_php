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
    $subject_string = !empty($subject_ids) ? implode(", ", $subject_ids) : "<div class='flex items-center'> <p class='text-red-700'> Subjects not assigned </p> <a href='?section=grade&page=add-sub-form&id=$id' title='Add new subjects to the grade' class='ml-8 px-4 py-2 bg-blue-500 text-white rounded-lg'><img src='./public/add.png' alt='add image' class='w-4 h-4 invert'></a></div>";
  ?>

  <div class="p-6 rounded-lg w-full">

    <h1 class="text-3xl font-bold mb-6 text-center"><?php echo $grade_name; ?></h1>

    <div class="w-full flex justify-end items-end mb-4">
        <a href="?section=grade&page=edit&id=<?php echo $id; ?>" 
		    class="px-5 py-2 bg-gradient-to-br from-yellow-300 to-yellow-500 
                  hover:from-yellow-500 hover:to-yellow-300
                  text-black font-semibold rounded-[10px]">
            Edit
        </a>
    </div>

    <table class="w-full border border-[#387281] rounded">
      <tr class="bg-[#3C7A89] text-white ">
        <th class="w-[50%] p-3 text-left border-r">Field</th>
        <th class="w-[50%] p-3 text-left">Details</th>
      </tr>

      <tr class="border-t">
        <td class="p-3 font-semibold border-r">Grade Name</td>
        <td class="p-3 "><?php echo $grade_name; ?></td>
      </tr>

      <tr class="border-t">
        <td class="p-3 font-semibold border-r">Grade Group</td>
        <td class="p-3 "><?php echo $grade_group; ?></td>
      </tr>

      <tr class="border-t">
        <td class="p-3 font-semibold border-r">Grade Color</td>
        <td class="p-3 "><?php echo $grade_color; ?></td>
      </tr>

      <tr class="border-t">
        <td class="p-3 font-semibold border-r">Grade Order</td>
        <td class="p-3 "><?php echo $grade_order; ?></td>
      </tr>
      <tr class="border-t">
        <td class="p-3 font-semibold border-r">Subjects</td>
        <td class="p-3 "><?php echo $subject_string; ?></td>
      </tr>
    </table>
  </div>

</body>