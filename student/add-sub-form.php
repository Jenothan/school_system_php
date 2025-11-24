<body>
<?php 
    $id = $_GET['id'];

    //----------------------------------- Fetch student info ----------------------------------------
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

    //---------------------------------- get grade name ---------------------------------------------
    $grade_query = "SELECT grade_name FROM grades WHERE id='$grade_id'";
    $grade_res = mysqli_query($con, $grade_query);
    $grade_name = mysqli_fetch_array($grade_res)['grade_name'];

    //----------------------------------- fetch student subjects -------------------------------------
    $stu_sub_query = "SELECT subject_id FROM student_subject WHERE student_id='$id'";
    $stu_sub_res = mysqli_query($con, $stu_sub_query);
    $subject_ids = [];
    while($stu_sub_row = mysqli_fetch_assoc($stu_sub_res)){
        $subject_ids[] = $stu_sub_row['subject_id'];
    }

    //------------------------------- fetch grade-specific subjects ----------------------------------
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

<div>

    <h1><?php echo $father_name. ' ' . $student_name; ?> & Subjects</h1>

    <table border="1">
        <tr>
            <th>Field</th>
            <th>Details</th>
        </tr>
        <tr>
            <td>Father Name</td>
            <td><?php echo $father_name; ?></td>
        </tr>
        <tr>
            <td>Student Name</td>
            <td><?php echo $student_name; ?></td>
        </tr>
        <tr>
            <td>Admission Number</td>
            <td><?php echo $addmission_no; ?></td>
        </tr>
        <tr>
            <td>Grade</td>
            <td><?php echo $grade_name; ?></td>
        </tr>
        <tr>
            <td>NIC</td>
            <td><?php echo $nic; ?></td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td><?php echo $dob; ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo ucfirst($gender); ?></td>
        </tr>
        <tr>
            <td>Telephone</td>
            <td><?php echo $telephone; ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $address; ?></td>
        </tr>
    </table>

    <h2>Subjects</h2>

    <table border="1">
        <tr>
            <th>Subject ID</th>
            <th>Subject Name</th>
            <th>Action</th>
        </tr>

        <?php 
        foreach($subject_ids as $sub_id){
            $sub_res = mysqli_query($con, "SELECT id, subject_name FROM subjects WHERE id='$sub_id'");
            $sub_row = mysqli_fetch_assoc($sub_res);
        ?>
        <tr>
            <td><?php echo $sub_row['id']; ?></td>
            <td><?php echo $sub_row['subject_name']; ?></td>
            <td>
                <a href="student/subject-delete.php?sub_id=<?php echo $sub_row['id']; ?>&stu_id=<?php echo $id; ?>" 
                   onclick="return confirm('Do you want to delete?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <h2>Add Subjects</h2>

    <form action="student/add-sub.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <?php foreach($grade_subjects as $gs){ ?>
            <label>
                <input type="checkbox" 
                       name="subjects[]" 
                       value="<?php echo $gs['id']; ?>"
                       <?php if(in_array($gs['id'], $subject_ids)) echo 'checked'; ?>>
                <?php echo $gs['subject_name']; ?>
            </label>
            <br>
        <?php } ?>

        <br>
        <button type="submit">Update Subjects</button>
    </form>

</div>
</body>
