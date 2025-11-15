<body>

    <?php
    $id = $_GET['id'];

    //---------------------------------- get grade details ----------------------------------------

    $query = "SELECT * FROM grades WHERE id='$id'";
    $results = mysqli_query($con, $query);

    if (!$results) {
        echo mysqli_error($con);
    }

    $row = mysqli_fetch_array($results);
    $grade_name  = $row['grade_name'];
    $grade_group = $row['grade_group'];
    $grade_color = $row['grade_color'];
    $grade_order = $row['grade_order'];

    //--------------------------------- get assigned subjects ----------------------------------------

    $grd_sub_query = "SELECT subject_id FROM grade_subject WHERE grade_id='$id'";
    $grd_sub_res = mysqli_query($con, $grd_sub_query);
    $subject_ids = [];
    while ($grd_sub_row = mysqli_fetch_array($grd_sub_res)) {
        $subject_ids[] = $grd_sub_row['subject_id'];
    }

    //-------------------------------------- get all subjects ----------------------------------------

    $quer = "SELECT id, subject_name FROM subjects";
    $res = mysqli_query($con, $quer);
    if (!$res) die("Query Failed! " . mysqli_error($con));
    ?>

    <div class="p-6 rounded-lg w-full shadow-xl/30">

        <h1 class="text-3xl font-bold mb-6 text-center">Grade Details & Subjects</h1>

        <table class="w-full border border-[#387281] rounded mb-6">
            <tr class="bg-[#3C7A89] text-white">
                <th class="w-[50%] p-3 border-r border-white text-left">Field</th>
                <th class="w-[50%] p-3 text-left">Details</th>
            </tr>
            <tr class="border-t">
                <td class="p-3 font-semibold border-r border-[#387281]">Grade Name</td>
                <td class="p-3"><?php echo $grade_name; ?></td>
            </tr>
            <tr class="border-t">
                <td class="p-3 font-semibold border-r border-[#387281]">Grade Group</td>
                <td class="p-3"><?php echo $grade_group; ?></td>
            </tr>
            <tr class="border-t">
                <td class="p-3 font-semibold border-r border-[#387281]">Grade Color</td>
                <td class="p-3"><?php echo $grade_color; ?></td>
            </tr>
            <tr class="border-t">
                <td class="p-3 font-semibold border-r border-[#387281]">Grade Order</td>
                <td class="p-3"><?php echo $grade_order; ?></td>
            </tr>
        </table>

        <form action="grade/add-sub.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <h2 class="text-2xl font-semibold mb-4">Assign Subjects</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <?php while ($rows = mysqli_fetch_assoc($res)) { ?>
                    <label class="flex items-center gap-2 p-2 border rounded hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="subjects[]" value="<?php echo $rows['id']; ?>"
                            <?php if (in_array($rows['id'], $subject_ids)) echo "checked"; ?>
                            class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="text-lg"><?php echo $rows['subject_name']; ?></span>
                    </label>
                <?php } ?>
            </div>

            <div class="flex justify-end gap-4 mt-6">
                <button type="reset" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Reset</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
            </div>
        </form>

    </div>

</body>