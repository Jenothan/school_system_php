<body>
<?php 
    $id = $_GET['id'];

    // Fetch student info
    $query = "SELECT * FROM students WHERE id='$id'";
    $results = mysqli_query($con, $query);
    if(!$results) die(mysqli_error($con));
    $row = mysqli_fetch_array($results);

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
    $grade_row = mysqli_fetch_array($grade_res);
    $grade_name = $grade_row['grade_name'];

    // Get profile image
    $img_query = "SELECT * FROM images WHERE student_id='$id'";
    $img_res = mysqli_query($con, $img_query);
    $path = "profiles/def.jpg";
    if(mysqli_num_rows($img_res) > 0){
        $img_row = mysqli_fetch_array($img_res);
        $path = substr($img_row['file_name'], 3);
    }

    // Get subjects
    $subject_ids = [];
    $subject_query = "SELECT subject_id FROM student_subject WHERE student_id='$id'";
    $subject_res = mysqli_query($con, $subject_query);
    while($sub_row = mysqli_fetch_assoc($subject_res)){
        $sub_id = $sub_row['subject_id'];
        $sub_name_query = "SELECT subject_name FROM subjects WHERE id='$sub_id'";
        $sub_name_res = mysqli_query($con, $sub_name_query);
        $sub_name = mysqli_fetch_assoc($sub_name_res)['subject_name'];
        $subject_ids[] = $sub_name;
    }
    $subject_string = !empty($subject_ids) ? implode(", ", $subject_ids) : "Subjects not assigned";
?>

<div class="p-6 rounded-lg w-full">
    <h1 class="text-3xl font-bold mb-6 text-center">Student Details</h1>

    <div class="flex justify-center mb-6">
        <img src="<?php echo $path; ?>" alt="profile image" class="w-36 h-36 rounded-full object-cover border border-[#ADD2C2]">
    </div>

    <table class="w-full border border-[#387281] rounded">
        <tr class="bg-[#3C7A89] text-white">
            <th class="p-3 border-r border-white text-left">Field</th>
            <th class="p-3 text-left">Value</th>
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
            <td class="p-3 font-semibold border-r border-[#387281]">Admission No</td>
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
        <tr class="border-t">
            <td class="p-3 font-semibold border-r border-[#387281]">Subjects</td>
            <td class="p-3"><?php echo $subject_string; ?></td>
        </tr>
    </table>

    <div class="flex justify-end mt-4">
        <a href="?section=student&page=edit&id=<?php echo $id; ?>" 
		class="px-5 py-2 bg-gradient-to-br from-yellow-300 to-yellow-500 
                  hover:from-yellow-500 hover:to-yellow-300
                  text-black font-semibold rounded-[10px]">Edit</a>
    </div>
</div>
</body>
