
	<body>
		<?php 
			$query="SELECT * FROM grades WHERE deleted_at IS NULL";
			$result=mysqli_query($con, $query);
			
			if(!$result){
				die(mysqli_error($con));
			}
		?>
			<table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
				<thead class="bg-gray-100">
					<tr>
						<th class="px-4 py-2 text-left border-b">Grade Name</th>
						<th class="px-4 py-2 text-left border-b">Grade Group</th>
						<th class="px-4 py-2 text-left border-b">Grade Color</th>
						<th class="px-4 py-2 text-left border-b">Grade Order</th>
						<th class="px-4 py-2 text-center border-b" colspan="4">Actions</th>
					</tr>
				</thead>

				<tbody>
					<?php while($row=mysqli_fetch_array($result)) { ?>
					<tr class="hover:bg-gray-200 transition cursor-pointer" onclick="window.location='?page=show&section=grade&id=<?php echo $row['id']; ?>'">
						<td class="px-4 py-2 border-b"><?php echo $row['grade_name']; ?></td>
						<td class="px-4 py-2 border-b"><?php echo $row['grade_group']; ?></td>
						<td class="px-4 py-2 border-b"><?php echo $row['grade_color']; ?></td>
						<td class="px-4 py-2 border-b"><?php echo $row['grade_order']; ?></td>

						<td class="px-2 py-2 border-b text-center">
							<a href="grade/delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Do you want to delete?')">
								<button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
							</a>
						</td>

						<td class="px-2 py-2 border-b text-center">
							<a href="?page=edit&section=grade&id=<?php echo $row['id']; ?>">
								<button class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</button>
							</a>
						</td>

						<td class="px-2 py-2 border-b text-center">
							<a href="?page=add-sub-form&section=grade&id=<?php echo $row['id']; ?>">
								<button class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Subject</button>
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
	</body>
