<body>
	<?php
	$query = "SELECT * FROM students WHERE deleted_at IS NULL";
	$result = mysqli_query($con, $query);

	if (!$result) {
		die(mysqli_error($con));
	}
	?>
	<table class="min-w-full border border-gray-300 divide-y divide-gray-300 text-sm">
		<thead class="bg-gray-100">
			<tr>
				<th class="px-3 py-2 text-left font-semibold">Profile</th>
				<th class="px-3 py-2 text-left font-semibold">Father Name</th>
				<th class="px-3 py-2 text-left font-semibold">Student Name</th>
				<th class="px-3 py-2 text-left font-semibold">Admission No</th>
				<th class="px-3 py-2 text-left font-semibold">Grade</th>
				<th class="px-3 py-2 text-left font-semibold">NIC</th>
				<th class="px-3 py-2 text-left font-semibold">DOB</th>
				<th class="px-3 py-2 text-left font-semibold">Gender</th>
				<th class="px-3 py-2 text-left font-semibold">Telephone</th>
				<th class="px-3 py-2 text-left font-semibold">Address</th>
				<th class="px-3 py-2 text-center font-semibold" colspan="4">Actions</th>
			</tr>
		</thead>

		<tbody class="divide-y divide-gray-200">
			<?php while ($row = mysqli_fetch_array($result)) { 
				$stu_id=$row['id'];
			?>
				<tr class="hover:bg-gray-200 transition cursor-pointer" onclick="window.location='?page=show&section=student&id=<?php echo $row[0]; ?>'">
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
					<td class="px-3 py-2 flex justify-center w-[100px]">
						<img src="<?php echo $path; ?>" alt="<?php echo $alt; ?>"
							class="w-16 h-16 rounded-full">
					</td>

					<td class="px-3 py-2"><?php echo $row['father_name']; ?></td>
					<td class="px-3 py-2"><?php echo $row['student_name']; ?></td>
					<td class="px-3 py-2"><?php echo $row['addmission_no']; ?></td>

					<?php
					$grade_n = $row['grade_id'];
					$quer = "SELECT grade_name FROM grades where id='$grade_n'";

					$res = mysqli_query($con, $quer);

					if (!$res) {
						die("Query Failed!" . mysqli_error($con));
					}

					$rows = mysqli_fetch_assoc($res);
					?>

					<td class="px-3 py-2"><?php echo $rows['grade_name']; ?></td>

					<td class="px-3 py-2"><?php echo $row['nic']; ?></td>
					<td class="px-3 py-2"><?php echo $row['dob']; ?></td>
					<td class="px-3 py-2"><?php echo $row['gender']; ?></td>
					<td class="px-3 py-2"><?php echo $row['telephone']; ?></td>
					<td class="px-3 py-2"><?php echo $row['address']; ?></td>


					<td class="px-2">
						<a href="student/delete.php?id=<?php echo $stu_id; ?>"
							onclick="return confirm('Do you want to delete?')"
							class="px-3 py-2 text-white bg-red-600 rounded hover:bg-red-700 text-xs">
							Delete
						</a>
					</td>

					<td class="px-2">
						<a href="?section=student&page=edit&id=<?php echo $stu_id; ?>"
							class="px-3 py-2 text-white bg-yellow-500 rounded hover:bg-yellow-600 text-xs">
							Edit
						</a>
					</td>

					<td class="px-2">
						<a href="?section=student&page=add-sub-form&id=<?php echo $stu_id; ?>"
							class="px-3 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 text-xs">
						Subject
						</a>
					</td>
				</tr>

			<?php } ?>
		</tbody>
	</table>
</body>