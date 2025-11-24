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

    if(!empty($subject_ids)){
        $subject_string = implode(", ", $subject_ids);
    } else {
        $subject_string = "
            <div>
                <p style='color:red;'>Subjects not assigned</p>
                <a href='?section=student&page=add-sub-form&id=$id' 
                   title='Add new subjects to the student' 
                   style='display:inline-block; padding:6px 12px; background:#007BFF; color:white; border-radius:5px; margin-left:12px;'>
                   <img src='./public/add.png' alt='add image' style='width:16px; height:16px; filter:invert(1);'>
                </a>
            </div>";
    }
?>

<div style="padding:20px; border:1px solid #ccc; border-radius:10px;">

    <h1 style="text-align:center; font-size:28px; font-weight:bold; margin-bottom:20px;">
        <?php echo $father_name . ' ' . $student_name; ?>
    </h1>

    <div style="text-align:center; margin-bottom:20px;">
        <button command="show-modal" commandfor="dialog" style="border:none; background:none; cursor:pointer;">
            <img src="<?php echo $path; ?>" 
                 alt="profile image" 
                 style="width:200px; height:200px; border-radius:50%; border:1px solid #ADD2C2; object-fit:cover;">
        </button>
    </div>

    <div style="text-align:right; margin-bottom:20px;">
        <a href="?section=student&page=edit&id=<?php echo $id; ?>" 
           style="padding:10px 18px; background:#f2c200; border-radius:8px; text-decoration:none; font-weight:bold; color:black;">
            Edit
        </a>
    </div>

    <table style="width:100%; border-collapse:collapse; border:1px solid #387281;">
        <tr style="background:#3C7A89; color:white;">
            <th style="padding:10px; border-right:1px solid white; text-align:left;">Field</th>
            <th style="padding:10px; text-align:left;">Value</th>
        </tr>

        <tr>
            <td style="padding:10px; border-right:1px solid #387281;">Father Name</td>
            <td style="padding:10px;"><?php echo $father_name; ?></td>
        </tr>

        <tr>
            <td style="padding:10px; border-right:1px solid #387281;">Student Name</td>
            <td style="padding:10px;"><?php echo $student_name; ?></td>
        </tr>

        <tr>
            <td style="padding:10px; border-right:1px solid #387281;">Admission No</td>
            <td style="padding:10px;"><?php echo $addmission_no; ?></td>
        </tr>

        <tr>
            <td style="padding:10px; border-right:1px solid #387281;">Grade</td>
            <td style="padding:10px;"><?php echo $grade_name; ?></td>
        </tr>

        <tr>
            <td style="padding:10px; border-right:1px solid #387281;">NIC</td>
            <td style="padding:10px;"><?php echo $nic; ?></td>
        </tr>

        <tr>
            <td style="padding:10px; border-right:1px solid #387281;">Date of Birth</td>
            <td style="padding:10px;"><?php echo $dob; ?></td>
        </tr>

        <tr>
            <td style="padding:10px; border-right:1px solid #387281;">Gender</td>
            <td style="padding:10px;"><?php echo ucfirst($gender); ?></td>
        </tr>

        <tr>
            <td style="padding:10px; border-right:1px solid #387281;">Telephone</td>
            <td style="padding:10px;"><?php echo $telephone; ?></td>
        </tr>

        <tr>
            <td style="padding:10px; border-right:1px solid #387281;">Address</td>
            <td style="padding:10px;"><?php echo $address; ?></td>
        </tr>

        <tr>
            <td style="padding:10px; border-right:1px solid #387281;">Subjects</td>
            <td style="padding:10px;"><?php echo $subject_string; ?></td>
        </tr>
    </table>
</div>

<!-- MODAL -->
<dialog id="dialog" style="border:none; padding:20px; border-radius:10px;">
    <img src="<?php echo $path; ?>" 
         alt="profile image" 
         style="width:100%; height:auto; border-radius:10px;">
    <div style="text-align:right; margin-top:10px;">
        <button command="close" commandfor="dialog" 
                style="padding:6px 12px; background:#444; color:white; border-radius:5px; border:none;">
            Close
        </button>
    </div>
</dialog>

</body>
