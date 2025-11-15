<body class="bg-gray-50 p-6">

<?php 
    $id = $_GET['id'];
    $error = $_GET['e'] ?? 0;
    $error_msg = "Subject Name or Index already exist!";

    $query = "SELECT * FROM subjects WHERE id='$id'";
    $result = mysqli_query($con, $query);
    if(!$result) die("Query Failed: " . mysqli_error($con));

    $row = mysqli_fetch_array($result);
    $subject_name  = $row['subject_name'];
    $subject_index = $row['subject_index'];
    $subject_order = $row['subject_order'];
    $subject_color = $row['subject_color'];
    $subject_number = $row['subject_number'];
?>

<div class="w-full bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6 text-center">Edit Subject</h1>

    <!-- Error Box -->
    <?php if($error==1) { ?>
        <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
            <?php echo $error_msg; ?>
        </div>
    <?php } ?>

    <form action="subject/update.php" method="POST" class="space-y-4">
        <!-- Hidden ID -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <!-- Grid Layout -->
        <div class="grid grid-cols-3 gap-4">

            <!-- Subject Name -->
            <div class="flex flex-col">
                <label for="subject_name" class="font-semibold mb-1">Subject Name</label>
                <input type="text" name="subject_name" id="subject_name"
                       value="<?php echo $subject_name; ?>" required
                       class="border border-[#387281] p-2 rounded" />
            </div>

            <!-- Subject Index -->
            <div class="flex flex-col">
                <label for="subject_index" class="font-semibold mb-1">Subject Index</label>
                <input type="text" name="subject_index" id="subject_index"
                       value="<?php echo $subject_index; ?>" required
                       class="border border-[#387281] p-2 rounded" />
            </div>

            <!-- Subject Order -->
            <div class="flex flex-col">
                <label for="subject_order" class="font-semibold mb-1">Subject Order</label>
                <input type="text" name="subject_order" id="subject_order"
                       value="<?php echo $subject_order; ?>" required
                       class="border border-[#387281] p-2 rounded" />
            </div>

            <!-- Subject Color -->
            <div class="flex flex-col">
                <label for="subject_color" class="font-semibold mb-1">Subject Color</label>
                <input type="text" name="subject_color" id="subject_color"
                       value="<?php echo $subject_color; ?>" required
                       class="border border-[#387281] p-2 rounded" />
            </div>

            <!-- Subject Number -->
            <div class="flex flex-col">
                <label for="subject_number" class="font-semibold mb-1">Subject Number</label>
                <input type="text" name="subject_number" id="subject_number"
                       value="<?php echo $subject_number; ?>" required
                       class="border border-[#387281] p-2 rounded" />
            </div>

        </div>

        <!-- Buttons -->
        <div class="flex justify-end gap-4 mt-6">
            <button type="reset" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Reset</button>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>

</body>
