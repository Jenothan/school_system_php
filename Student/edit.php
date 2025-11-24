<body>

<?php 
    $id = $_GET['id'];
    $error = $_GET['e'] ?? 0;
    if($error == 1) $error_msg = "Student Admission number or NIC already exist!";
    else if($error == 2) $error_msg = "Image type not acceptable!";
    else if($error == 3) $error_msg = "Image size greater than 2MB";
    else if($error == 4) $error_msg = "Image not found!";
    else if($error == 5) $error_msg = "There is no image to delete!";

    $query = "SELECT * FROM students WHERE id='$id'";
    $result = mysqli_query($con, $query);
    if (!$result) die("Query Failed: " . mysqli_error($con));

    $row = mysqli_fetch_array($result);
    $father_name = $row['father_name'];
    $student_name = $row['student_name'];
    $addmission_no = $row['addmission_no'];
    $grade_id = $row['grade_id'];
    $nic = $row['nic'];
    $dob = $row['dob'];
    $gender = $row['gender'] ?? "";
    $telephone = $row['telephone'];
    $address = $row['address'];

    $img_query = "SELECT * FROM images WHERE student_id='$id'";
    $img_res = mysqli_query($con, $img_query);
    $path = "profiles/def.jpg";
    if(mysqli_num_rows($img_res) > 0){
        $img_row = mysqli_fetch_array($img_res);
        $path = substr($img_row['file_name'], 3);
    }

    $grade_res = mysqli_query($con, "SELECT id, grade_name FROM grades");
?>

<div>

    <h1><?php echo $father_name . ' ' . $student_name; ?></h1>

    <?php if($error!=0) { ?>
        <div>
            <?php echo $error_msg; ?>
        </div>
    <?php } ?>

<form action="student/update.php" method="POST" enctype="multipart/form-data">

    <div>

        <img src="<?php echo $path; ?>" alt="profile image">

        <div>

            <a href="student/delete-img.php?id=<?php echo $id; ?>" onclick="return confirm('Do you want to delete?')">
                <img src="./public/delete.png" alt="delete button">
            </a>

            <input type="file" id="file" name="imagefile" accept="image/*">
            <script>
                const uploadField = document.getElementById("file");

                uploadField.onchange = function() {
                    if (this.files[0].size > 2097152) {
                        alert("File is too big!");
                        this.value = "";
                    }
                };
            </script>

        </div>
    </div>


    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>

        <tr>
            <td>Father Name</td>
            <td><input type="text" name="father_name" value="<?php echo $father_name; ?>" required></td>
        </tr>

        <tr>
            <td>Student Name</td>
            <td><input type="text" name="student_name" value="<?php echo $student_name; ?>" required></td>
        </tr>

        <tr>
            <td>Admission No</td>
            <td><input type="text" name="addmission_no" value="<?php echo $addmission_no; ?>" required></td>
        </tr>

        <tr>
            <td>Grade</td>
            <td>
                <select name="grade_id" required>
                    <option value="" disabled>Select your Grade</option>
                    <?php while($grade_row = mysqli_fetch_assoc($grade_res)) { ?>
                        <option value="<?php echo $grade_row['id']; ?>" 
                            <?php echo $grade_row['id'] == $grade_id ? 'selected' : ''; ?>>
                            <?php echo $grade_row['grade_name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>NIC</td>
            <td><input type="text" name="nic" value="<?php echo $nic; ?>" required></td>
        </tr>

        <tr>
            <td>Date of Birth</td>
            <td><input type="date" name="dob" value="<?php echo $dob; ?>" required></td>
        </tr>

        <tr>
            <td>Gender</td>
            <td>
                <label>
                    <input type="radio" name="gender" value="male" <?php echo $gender=='male'?'checked':''; ?> required> 
                    Male
                </label>

                <label>
                    <input type="radio" name="gender" value="female" <?php echo $gender=='female'?'checked':''; ?> required> 
                    Female
                </label>
            </td>
        </tr>

        <tr>
            <td>Address</td>
            <td><textarea name="address" rows="3" required><?php echo $address; ?></textarea></td>
        </tr>

        <tr>
            <td>Telephone</td>
            <td><input type="tel" name="telephone" value="<?php echo $telephone; ?>" required></td>
        </tr>
    </table>

    <div>
        <button type="submit">Update</button>
    </div>

</form>

</div>

</body>
