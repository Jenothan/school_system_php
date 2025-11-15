<body>
    <?php
        $error = $_GET['e'] ?? 0;
        $error_msg = "Grade Name already exist!";

        $path="/jenothan/school-data/grade/create_grade_form.php";
        if($_SERVER['PHP_SELF']==$path) {
            include('../auth/auth_session.php');
        }
    ?>

    <form action="grade/store.php" method="POST"
        class="p-6 rounded-lg w-full shadow-xl/30">

        <h1 class="text-3xl font-bold mb-6 text-center">Create Grade</h1>

        <!-- error msg -->
        <?php if($error==1) { ?>
            <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
                <?php echo $error_msg; ?>
            </div>
        <?php } ?>

        <div class="grid grid-cols-3 gap-5">

            <div class="flex flex-col">
                <label for="grade_name" class="font-semibold mb-1">Grade Name</label>
                <input type="text" name="grade_name" id="grade_name"
                    placeholder="eg: 10A" required
                    class="border border-[#387281] p-2 rounded" />
            </div>

            <div class="flex flex-col">
                <label for="grade_group" class="font-semibold mb-1">Grade Group</label>
                <input type="text" name="grade_group" id="grade_group"
                    placeholder="eg: 10" required
                    class="border border-[#387281] p-2 rounded" />
            </div>

            <div class="flex flex-col">
                <label for="grade_color" class="font-semibold mb-1">Grade Color</label>
                <input type="text" name="grade_color" id="grade_color"
                    placeholder="eg: Green" required
                    class="border border-[#387281] p-2 rounded" />
            </div>

            <div class="flex flex-col">
                <label for="grade_order" class="font-semibold mb-1">Grade Order</label>
                <input type="text" name="grade_order" id="grade_order"
                    placeholder="eg: 1, 2, 3" required
                    class="border border-[#387281] p-2 rounded" />
            </div>

        </div>

        <div class="flex justify-end gap-4 mt-6">
          <button type="reset" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Reset</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
        </div>

    </form>
</body>
