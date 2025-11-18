<body>
	<?php

	$query = "SELECT * FROM subjects WHERE deleted_at IS NULL";
	$result = mysqli_query($con, $query);

	if (!$result) {
		die(mysqli_error($con));
	}

	$error = $_GET['e'] ?? 0;
	$error_msg = '';
	if ($error == 1) $error_msg = 'Cannot delete this Subject! This Subject assigned to some students.';

	?>

	<?php if ($error == 1) { ?>
		<div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
			<?php echo $error_msg; ?>
		</div>
	<?php } ?>

	<table class="min-w-full border border-gray-300 divide-y divide-gray-300 text-sm">
		<thead class="bg-gray-100">
			<tr>
				<th class="px-3 py-2 text-center font-semibold">Subject Name</th>
				<th class="px-3 py-2 text-center font-semibold">Subject Index</th>
				<th class="px-3 py-2 text-center font-semibold">Subject Order</th>
				<th class="px-3 py-2 text-center font-semibold">Subject Color</th>
				<th class="px-3 py-2 text-center font-semibold">Subject Number</th>
				<th class="px-3 py-2 text-center font-semibold" colspan="2">Actions</th>
			</tr>
		</thead>

		<tbody class="divide-y divide-gray-200">
			<?php while ($row = mysqli_fetch_array($result)) { ?>

				<tr class="hover:bg-gray-200 cursor-pointer" title="<?php echo $row['subject_name'] . "'s Details"; ?>" onclick="window.location='?page=show&section=subject&id=<?php echo $row[0]; ?>'">
					<td class="px-3 py-4 text-center"><?php echo $row['subject_name']; ?></td>
					<td class="px-3 py-2 text-center"><?php echo $row['subject_index']; ?></td>
					<td class="px-3 py-2 text-center"><?php echo $row['subject_order']; ?></td>
					<td class="px-3 py-2 text-center"><?php echo $row['subject_color']; ?></td>
					<td class="px-3 py-2 text-center"><?php echo $row['subject_number']; ?></td>

					<td class="px-2 w-[60px]">
						<a href="subject/delete.php?id=<?php echo $row['id']; ?>" title="Delete subject"
							onclick="return confirm('Do you want to delete?')"
							class="flex justify-center items-center py-2 text-white bg-red-500 rounded hover:bg-red-400 text-xs">
							<img src="./public/bin.png" alt="delete image" class="w-4 h-4 invert">
						</a>
					</td>

					<td class="px-2 w-[60px]">
						<a href="?section=subject&page=edit&id=<?php echo $row['id']; ?>" title="Edit subject details"
							class="flex justify-center items-center py-2 text-white bg-yellow-500 rounded hover:bg-yellow-600 text-xs">
							<img src="./public/edit.png" alt="delete image" class="w-4 h-4 invert">
						</a>
					</td>
				</tr>

			<?php } ?>
		</tbody>
	</table>
</body>