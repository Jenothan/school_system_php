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
  ?>

  <div class="p-6 rounded-lg w-full">

    <h1 class="text-3xl font-bold mb-6 text-center">Grade Details</h1>

    <table class="w-full border border-[#387281] rounded">
      <tr class="bg-[#3C7A89] text-white ">
        <th class="w-[50%] p-3 text-left border-r">Field</th>
        <th class="w-[50%] p-3 text-left">Details</th>
      </tr>

      <tr class="border-t">
        <td class="p-3 font-semibold border-r">Grade Name</td>
        <td class="p-3 text-lg"><?php echo $grade_name; ?></td>
      </tr>

      <tr class="border-t">
        <td class="p-3 font-semibold border-r">Grade Group</td>
        <td class="p-3 text-lg"><?php echo $grade_group; ?></td>
      </tr>

      <tr class="border-t">
        <td class="p-3 font-semibold border-r">Grade Color</td>
        <td class="p-3 text-lg"><?php echo $grade_color; ?></td>
      </tr>

      <tr class="border-t">
        <td class="p-3 font-semibold border-r">Grade Order</td>
        <td class="p-3 text-lg"><?php echo $grade_order; ?></td>
      </tr>
    </table>

    <div class="flex justify-end mt-6">
      <a href="?page=edit&section=grade&id=<?php echo $id; ?>"
        class="px-5 py-2 bg-gradient-to-br from-yellow-300 to-yellow-500 
                  hover:from-yellow-500 hover:to-yellow-300
                  text-black font-semibold rounded-[10px]">
        Edit
      </a>
    </div>

  </div>

</body>