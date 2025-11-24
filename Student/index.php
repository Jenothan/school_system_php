<body>
	<?php
	$query = "SELECT * FROM students WHERE deleted_at IS NULL";
	$result = mysqli_query($con, $query);

	if (!$result) {
		die(mysqli_error($con));
	}
	?>
	<table border="1" >
		<thead>
			<tr>
				<th>Profile</th>
				<th>Father Name</th>
				<th>Student Name</th>
				<th>Admission No</th>
				<th>Grade</th>
				<th>NIC</th>
				<!-- <th>DOB</th>
				<th>Gender</th>
				<th>Telephone</th>
				<th>Address</th> -->
				<th colspan="3">Actions</th>
			</tr>
		</thead>

		<tbody>
			<?php while ($row = mysqli_fetch_array($result)) { 
				$stu_id=$row['id'];
			?>
				<tr title="<?php echo $row['student_name'] . "'s Details"; ?>" onclick="window.location='?page=show&section=student&id=<?php echo $row[0]; ?>'">
					<?php
					$path = "profiles/def.jpg";
					$alt = "default profile image";
					$img_query = "SELECT file_name, original_name FROM images WHERE student_id='$stu_id'";
					$img_res = mysqli_query($con, $img_query);
					if (mysqli_num_rows($img_res)) {
						$img_row = mysqli_fetch_array($img_res);
						$path = substr($img_row['file_name'], 3);
						$alt = $img_row['original_name'];
					}
					?>
					<td>
						<img src="<?php echo $path; ?>" alt="<?php echo $alt; ?>"
						>
					</td>

					<td><?php echo $row['father_name']; ?></td>
					<td><?php echo $row['student_name']; ?></td>
					<td><?php echo $row['addmission_no']; ?></td>

					<?php
					$grade_n = $row['grade_id'];
					$quer = "SELECT grade_name FROM grades where id='$grade_n'";

					$res = mysqli_query($con, $quer);

					if (!$res) {
						die("Query Failed!" . mysqli_error($con));
					}

					$rows = mysqli_fetch_assoc($res);
					?>

					<td><?php echo $rows['grade_name']; ?></td>

					<td><?php echo $row['nic']; ?></td>
					<!-- <td><?php echo $row['dob']; ?></td>
					<td><?php echo $row['gender']; ?></td>
					<td><?php echo $row['telephone']; ?></td>
					<td><?php echo $row['address']; ?></td> -->


					<td>
						<a href="student/delete.php?id=<?php echo $stu_id; ?>" title="delete student details"
							onclick="return confirm('Do you want to delete?')"
							>
							<img src="./public/bin.png" alt="delete image" >
						</a>
					</td>

					<td>
						<a href="?section=student&page=edit&id=<?php echo $stu_id; ?>" title="Edit student details"
							>
							<img src="./public/edit.png" alt="edit image" >
						</a>
					</td>

					<td>
						<a href="?section=student&page=add-sub-form&id=<?php echo $stu_id; ?>" title="Add subjects to the student"
							>
						<img src="./public/add.png" alt="add image" >
						</a>
					</td>
				</tr>

			<?php } ?>
		</tbody>
	</table>
</body>
