  <body>
    <?php
    $error = $_GET['e'] ?? 0;
    $error_msg = "Student Addmission number or nic already exist!";

    $query = "SELECT id, grade_name FROM grades";

    $result = mysqli_query($con, $query);

    if (!$result) {
      die("Query Failed!" . mysqli_error($con));
    }

    ?>
    <div>
      <form action="student/store.php" method="POST" class="p-6 rounded-lg w-full border-2 border-[#387281]">

        <h1 class="text-3xl font-bold mb-6 text-center">Create Student</h1>

        
        <?php if ($error == 1) { ?>
          <div class="bg-red-500 text-white p-3 rounded mb-4">
            <?php echo $error_msg; ?>
          </div>
        <?php } ?>

        <div class="grid grid-cols-3 gap-5">

        
          <div class="flex flex-col">
            <label for="father_name" class="font-semibold">Father Name</label>
            <input type="text" name="father_name" id="father_name" placeholder="Amela Newton" class="border-2 border-gray-300 p-2 rounded" required>
          </div>

        
          <div class="flex flex-col">
            <label for="student_name" class="font-semibold">Student Name</label>
            <input type="text" name="student_name" id="student_name" placeholder="Dolan Schultz" class="border-2 border-gray-300 p-2 rounded" required>
          </div>

          
          <div class="flex flex-col">
            <label for="addmission_no" class="font-semibold">Admission No</label>
            <input type="text" id="addmission_no" name="addmission_no" placeholder="12345" class="border-2 border-gray-300 p-2 rounded" required>
          </div>

          
          <div class="flex flex-col">
            <label for="grade_id" class="font-semibold">Grade</label>
            <select name="grade_id" id="grade_id" class="border-2 border-gray-300 p-2 rounded" required>
              <option value="" disabled selected>Select your Grade</option>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['grade_name']; ?></option>
              <?php } ?>
            </select>
          </div>

          
          <div class="flex flex-col">
            <label for="nic" class="font-semibold">NIC</label>
            <input type="text" id="nic" name="nic" placeholder="2001XXXXXXXX" class="border-2 border-gray-300 p-2 rounded" required>
          </div>

          
          <div class="flex flex-col">
            <label for="dob" class="font-semibold">Date of Birth</label>
            <input type="date" id="dob" name="dob" class="border-2 border-gray-300 p-2 rounded" required>
          </div>

          
          <div class="flex flex-col">
            <label class="font-semibold">Gender</label>
            <div class="flex items-center gap-4 mt-1">
              <label class="flex items-center gap-1">
                <input type="radio" id="male" name="gender" value="male"  required>
                Male
              </label>

              <label class="flex items-center gap-1">
                <input type="radio" id="female" name="gender" value="female" required>
                Female
              </label>
            </div>
          </div>

          
          <div class="flex flex-col col-span-3">
            <label for="address" class="font-semibold">Address</label>
            <textarea id="address" name="address" rows="3" placeholder="Karaveddy, Jaffna" class="border-2 border-gray-300 p-2 rounded" required></textarea>
          </div>

  
          <div class="flex flex-col">
            <label for="phone" class="font-semibold">Telephone</label>
            <input type="tel" id="phone" name="telephone" placeholder="076XXXXXXX" class="border-2 border-gray-300 p-2 rounded" required>
          </div>

        </div>

      
        <div class="flex justify-end gap-4 mt-6">
          <button type="reset" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Reset</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
        </div>

      </form>
    </div>

  </body>