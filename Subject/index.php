<body>
	<?php

	$query = "SELECT * FROM subjects WHERE deleted_at IS NULL";
	$result = mysqli_query($con, $query);

	if (!$result) {
		die(mysqli_error($con));
	}
	?>
	<table class="min-w-full border border-gray-300 divide-y divide-gray-300 text-sm">
		<thead class="bg-gray-100">
			<tr>
				<th class="px-4 py-2 text-left border-b">Subject Name</th>
				<th class="px-4 py-2 text-left border-b">Subject Index</th>
				<th class="px-4 py-2 text-left border-b">Subject Order</th>
				<th class="px-4 py-2 text-left border-b">Subject Color</th>
				<th class="px-4 py-2 text-left border-b">Subject Number</th>
				<th class="px-4 py-2 text-center border-b" colspan="3">Actions</th>
			</tr>
		</thead>

		<tbody>
			<?php while ($row = mysqli_fetch_array($result)) { ?>
				
					<tr class="hover:bg-gray-200 cursor-pointer" onclick="window.location='?page=show&section=subject&id=<?php echo $row[0]; ?>'">
						<td class="px-4 py-2 border-b"><?php echo $row[1]; ?></td>
						<td class="px-4 py-2 border-b"><?php echo $row[2]; ?></td>
						<td class="px-4 py-2 border-b"><?php echo $row[3]; ?></td>
						<td class="px-4 py-2 border-b"><?php echo $row[4]; ?></td>
						<td class="px-4 py-2 border-b"><?php echo $row[5]; ?></td>

						<td class="px-2 py-2 border-b text-center">
							<a href="subject/delete.php?id=<?php echo $row[0]; ?>" onclick="return confirm('Do you want to delete?')">
								<button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
							</a>
						</td>

						<td class="px-2 py-2 border-b text-center">
							<a href="?page=edit&section=subject&id=<?php echo $row[0]; ?>">
								<button class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</button>
							</a>
						</td>
					</tr>
				
			<?php } ?>
		</tbody>
	</table>
</body>