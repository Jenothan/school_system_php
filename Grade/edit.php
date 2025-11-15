
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

    <form action="grade/update.php" method="POST"
        class="p-6 rounded-lg w-full">

        <h1 class="text-3xl font-bold mb-6 text-center">Edit Grade</h1>

        <!-- Error Box -->
        <?php if($error==1) { ?>
            <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
                <?php echo $error_msg; ?>
            </div>
        <?php } ?>

        <!-- Hidden ID -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <!-- Grid Layout -->
        <div class="grid grid-cols-3 gap-5">

            <!-- Grade Name -->
            <div class="flex flex-col">
                <label for="grade_name" class="font-semibold mb-1">Grade Name</label>
                <input type="text" name="grade_name" id="grade_name"
                       value="<?php echo $grade_name; ?>"
                       required
                       class="border border-[#387281] p-2 rounded" />
            </div>

            <!-- Grade Group -->
            <div class="flex flex-col">
                <label for="grade_group" class="font-semibold mb-1">Grade Group</label>
                <input type="text" name="grade_group" id="grade_group"
                       value="<?php echo $grade_group; ?>"
                       required
                       class="border border-[#387281] p-2 rounded" />
            </div>

            <!-- Grade Color -->
            <div class="flex flex-col">
                <label for="grade_color" class="font-semibold mb-1">Grade Color</label>
                <input type="text" name="grade_color" id="grade_color"
                       value="<?php echo $grade_color; ?>"
                       required
                       class="border border-[#387281] p-2 rounded" />
            </div>

            <!-- Grade Order -->
            <div class="flex flex-col">
                <label for="grade_order" class="font-semibold mb-1">Grade Order</label>
                <input type="text" name="grade_order" id="grade_order"
                       value="<?php echo $grade_order; ?>"
                       required
                       class="border border-[#387281] p-2 rounded" />
            </div>

        </div>

        <!-- Buttons -->
        <div class="flex justify-end gap-4 mt-6">
          <button type="reset" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Reset</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>

    </form>

  </body>
