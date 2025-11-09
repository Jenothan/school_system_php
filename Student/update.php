<?php
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

	$query = "UPDATE students SET father_name = '$father_name', student_name = '$student_name', addmission_no = '$addmission_no', grade_id = '$grade_id', nic = '$nic', dob = '$dob', gender = '$gender', telephone = '$telephone', address = '$address' WHERE id = '$id'";

	$result = mysqli_query($con, $query);

	if (!$result) {
		die("Query failed" . mysqli_error($con));
	}

	//*******************************************************************************************************

	$target_dir = "../profiles/";
	$original_name = basename($_FILES['imagefile']['name']);
	$targetFile = $target_dir . basename($_FILES['imagefile']['name']);
	$imageFiletype = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
	$allowedtype = ['jpeg', 'jpg', 'png', 'gif'];


	if (in_array($imageFiletype, $allowedtype)) {
		//print_r($_FILES);

		if (move_uploaded_file($_FILES['imagefile']['tmp_name'], $targetFile)) {  //upload image in file path
			$size = (int)$_FILES['imagefile']['size'];

			$query = "INSERT INTO images (student_id, file_name, original_name, mime, size) VALUES ('$id', '$targetFile', '$original_name', '$imageFiletype', '$size')";

			//-------- Collect student profile image from images table and delete  ----------------->

			$image_check_query = "SELECT student_id FROM images WHERE student_id='$id'";
			$image_check_res = mysqli_query($con, $image_check_query);
			if (!$image_check_res) {
				die("query failed!" . mysqli_error($con));
			}

			$image_check_row = mysqli_fetch_array($image_check_res);

			if (mysqli_num_rows($image_check_res) > 0) {
				$query = "UPDATE images SET file_name='$targetFile', original_name='$original_name', mime='$imageFiletype', size='$size' WHERE student_id='$id'";
			}

			$image_upload_res = mysqli_query($con, $query);
			if (!$image_upload_res) {
				die("query failed" . mysqli_error($con));
			}
		} else {
			echo "image not uploaded!";
		}
	} else {
		echo "file type not accepted";
	}

	header('location:edit.php?id=' . $id);
}
