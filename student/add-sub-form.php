<body>
<?php 
    $id = $_GET['id'];

    // Fetch student info
    $student_query = "SELECT * FROM students WHERE id='$id'";
    $student_results = mysqli_query($con, $student_query);
    if(!$student_results) die(mysqli_error($con));
    $row = mysqli_fetch_array($student_results);

    $father_name = $row['father_name'];
    $student_name = $row['student_name'];
    $addmission_no = $row['addmission_no'];
    $grade_id = $row['grade_id'];
    $nic = $row['nic'];
    $dob = $row['dob'];
    $gender = $row['gender'] ?? "";
    $telephone = $row['telephone'];
    $address = $row['address'];

    // Get grade name
    $grade_query = "SELECT grade_name FROM grades WHERE id='$grade_id'";
    $grade_res = mysqli_query($con, $grade_query);
    $grade_name = mysqli_fetch_array($grade_res)['grade_name'];

    // Fetch student subjects
    $stu_sub_query = "SELECT subject_id FROM student_subject WHERE student_id='$id'";
    $stu_sub_res = mysqli_query($con, $stu_sub_query);
    $subject_ids = [];
    while($stu_sub_row = mysqli_fetch_assoc($stu_sub_res)){
        $subject_ids[] = $stu_sub_row['subject_id'];
    }

    // Fetch grade-specific subjects
    $grade_sub_query = "SELECT subject_id FROM grade_subject WHERE grade_id='$grade_id'";
    $grade_sub_res = mysqli_query($con, $grade_sub_query);
    $grade_subjects = [];
    while($gs_row = mysqli_fetch_assoc($grade_sub_res)){
        $sub_id = $gs_row['subject_id'];
        $sub_res = mysqli_query($con, "SELECT id, subject_name FROM subjects WHERE id='$sub_id'");
        $sub_row = mysqli_fetch_assoc($sub_res);
        $grade_subjects[] = $sub_row;
    }
?>

<div class="p-6 rounded-lg w-full shadow-xl/30">

    <h1 class="text-3xl font-bold mb-6 text-center">Student Details & Subjects</h1>

    <!-- Student Info Table -->
    <table class="w-full border border-[#387281] rounded mb-6">
        <tr class="bg-[#3C7A89] text-white">
            <th class="w-[50%] p-3 border-r border-white text-left">Field</th>
            <th class="w-[50%] p-3 text-left">Details</th>
        </tr>
        <tr class="border-t">
            <td class="p-3 font-semibold border-r border-[#387281]">Father Name</td>
            <td class="p-3"><?php echo $father_name; ?></td>
        </tr>
        <tr class="border-t">
            <td class="p-3 font-semibold border-r border-[#387281]">Student Name</td>
            <td class="p-3"><?php echo $student_name; ?></td>
        </tr>
        <tr class="border-t">
            <td class="p-3 font-semibold border-r border-[#387281]">Admission Number</td>
            <td class="p-3"><?php echo $addmission_no; ?></td>
        </tr>
        <tr class="border-t">
            <td class="p-3 font-semibold border-r border-[#387281]">Grade</td>
            <td class="p-3"><?php echo $grade_name; ?></td>
        </tr>
        <tr class="border-t">
            <td class="p-3 font-semibold border-r border-[#387281]">NIC</td>
            <td class="p-3"><?php echo $nic; ?></td>
        </tr>
        <tr class="border-t">
            <td class="p-3 font-semibold border-r border-[#387281]">Date of Birth</td>
            <td class="p-3"><?php echo $dob; ?></td>
        </tr>
        <tr class="border-t">
            <td class="p-3 font-semibold border-r border-[#387281]">Gender</td>
            <td class="p-3"><?php echo ucfirst($gender); ?></td>
        </tr>
        <tr class="border-t">
            <td class="p-3 font-semibold border-r border-[#387281]">Telephone</td>
            <td class="p-3"><?php echo $telephone; ?></td>
        </tr>
        <tr class="border-t">
            <td class="p-3 font-semibold border-r border-[#387281]">Address</td>
            <td class="p-3"><?php echo $address; ?></td>
        </tr>
    </table>

    <!-- Student Subjects Table -->
    <h2 class="text-2xl font-semibold mb-4">Subjects</h2>
    <table class="w-full border border-[#387281] rounded mb-6">
        <tr class="bg-[#3C7A89] text-white">
            <th class="p-3 border-r border-white">Subject ID</th>
            <th class="p-3 border-r border-white">Subject Name</th>
            <th class="p-3">Action</th>
        </tr>
        <?php foreach($subject_ids as $sub_id){
            $sub_res = mysqli_query($con, "SELECT id, subject_name FROM subjects WHERE id='$sub_id'");
            $sub_row = mysqli_fetch_assoc($sub_res);
        ?>
        <tr class="border-t">
            <td class="p-3 border-r border-[#387281]"><?php echo $sub_row['id']; ?></td>
            <td class="p-3 border-r border-[#387281]"><?php echo $sub_row['subject_name']; ?></td>
            <td class="p-3 flex justify-center">
                <a href="student/subject-delete.php?sub_id=<?php echo $sub_row['id']; ?>&stu_id=<?php echo $id; ?>" 
                   class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                   onclick="return confirm('Do you want to delete?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <!-- Grade-Specific Subject Assignment Form -->
    <h2 class="text-2xl font-semibold mb-4">Add Subjects</h2>
    <form action="student/add-sub.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <?php foreach($grade_subjects as $gs){ ?>
                <label class="flex items-center gap-2 p-2 border rounded hover:bg-gray-50 cursor-pointer">
                    <input type="checkbox" id="sub_<?php echo $gs['id']; ?>" name="subjects[]" 
                           value="<?php echo $gs['id']; ?>" <?php if(in_array($gs['id'], $subject_ids)) echo 'checked'; ?> 
                           class="form-checkbox h-5 w-5 text-blue-600">
                    <span class="text-lg"><?php echo $gs['subject_name']; ?></span>
                </label>
            <?php } ?>
        </div>

        <div class="flex justify-end gap-4 mt-6">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update Subjects</button>
        </div>
    </form>
</div>
</body>
