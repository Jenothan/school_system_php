<?php
include('../auth/auth_session.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $father_name = $_POST['father_name'];
    $student_name = $_POST['student_name'];
    $addmission_no = $_POST['addmission_no'];
    $grade_id = $_POST['grade_id'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];

    require_once('../config.php');

    $check_query = "SELECT addmission_no, nic FROM students WHERE (addmission_no='$addmission_no' OR nic='$nic') AND id!='$id'";

    $check_res = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_res) > 0) {
        header("location:../index.php?page=edit&section=student&id=$id&e=1");
        exit();
    }

    $query = "UPDATE students SET 
                father_name='$father_name',
                student_name='$student_name',
                addmission_no='$addmission_no',
                grade_id='$grade_id',
                nic='$nic',
                dob='$dob',
                gender='$gender',
                telephone='$telephone',
                address='$address',
                updated_by='$username'
              WHERE id='$id'";

    mysqli_query($con, $query);


    if (!empty($_FILES['imagefile']['name'])) {   

        $check_query = "SELECT * FROM images WHERE student_id='$id'";
        $check_res = mysqli_query($con, $check_query);

        if ($check_row = mysqli_fetch_assoc($check_res)) {

            if (file_exists($check_row['file_name'])) {
                unlink($check_row['file_name']);
            }

            mysqli_query($con, "DELETE FROM images WHERE student_id='$id'");
        }

        $target_dir = "../profiles/";
        $original_name = basename($_FILES['imagefile']['name']);

        $unique = time() . "_" . uniqid();
        $targetFile = $target_dir . $unique . "_" . $original_name;

        $ext = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $size = $_FILES['imagefile']['size'];
        $maxSize = 2 * 1024 * 1024;

        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($ext, $allowed)) {
            header("location:../index.php?page=edit&section=student&id=$id&e=2");
            exit();
        }

        if ($size > $maxSize) {
            header("location:../index.php?page=edit&section=student&id=$id&e=3");
            exit();
        }

        if (!move_uploaded_file($_FILES['imagefile']['tmp_name'], $targetFile)) {
            header("location:../index.php?page=edit&section=student&id=$id&e=4");
            exit();
        }

        $insert = "INSERT INTO images (student_id, file_name, original_name, mime, size) 
                   VALUES ('$id', '$targetFile', '$original_name', '$ext', '$size')";
        mysqli_query($con, $insert);
    }

	header("location:../index.php?page=edit&section=student&id=$id");
    exit();
}
?>
