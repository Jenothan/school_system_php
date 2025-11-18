<body>
    <?php 
        $error = $_GET['e'] ?? 0;
        $error_msg = "Subject Name or Index already exist!";
    ?>

    <form action="subject/store.php" method="POST"
        class="p-6 rounded-lg w-full border-2 border-[#387281]">

        <h1 class="text-3xl font-bold mb-6 text-center">Create Subject</h1>

        <!-- error msg -->
        <?php if($error==1) { ?>
            <div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
                <?php echo $error_msg; ?>
            </div>
        <?php } ?>

        <div class="grid grid-cols-3 gap-5">

            <div class="flex flex-col">
                <label for="subject_name" class="font-semibold mb-1">Subject Name</label>
                <input type="text" name="subject_name" id="subject_name"
                    placeholder="English" required
                    class="border-2 border-gray-300 p-2 rounded" />
            </div>

            <div class="flex flex-col">
                <label for="subject_index" class="font-semibold mb-1">Subject Index</label>
                <input type="text" name="subject_index" id="subject_index"
                    placeholder="14363" required
                    class="border-2 border-gray-300 p-2 rounded" />
            </div>

            <div class="flex flex-col">
                <label for="subject_order" class="font-semibold mb-1">Subject Order</label>
                <input type="text" name="subject_order" id="subject_order"
                    placeholder="3.00" required
                    class="border-2 border-gray-300 p-2 rounded" />
            </div>

            <div class="flex flex-col">
                <label for="subject_color" class="font-semibold mb-1">Subject Color</label>
                <input type="text" name="subject_color" id="subject_color"
                    placeholder="Green" required
                    class="border-2 border-gray-300 p-2 rounded" />
            </div>

            <div class="flex flex-col">
                <label for="subject_number" class="font-semibold mb-1">Subject Number</label>
                <input type="text" name="subject_number" id="subject_number"
                    placeholder="54" required
                    class="border-2 border-gray-300 p-2 rounded" />
            </div>

        </div>

        <div class="flex justify-end gap-4 mt-6">
          <button type="reset" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Reset</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
        </div>

    </form>
</body>
