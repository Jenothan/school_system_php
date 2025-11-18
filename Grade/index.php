
	<body>
		<?php 
			$query="SELECT * FROM grades";
			$result=mysqli_query($con, $query);
			
			if(!$result){
				die(mysqli_error($con));
			}

			$error=$_GET['e']?? 0;
			$error_msg='';
			if($error==1) $error_msg='Cannot delete this class! Students are assigned to this class.';
		?>
			<?php if($error==1) { ?>
				<div class="bg-red-500 text-white p-3 rounded mb-4 text-center">
					<?php echo $error_msg; ?>
				</div>
			<?php } ?>
			<table class="min-w-full border border-gray-300 divide-y divide-gray-300 text-sm">
				<thead class="bg-gray-100">
					<tr>
						<th class="px-3 py-2 text-center font-semibold">Grade Name</th>
						<th class="px-3 py-2 text-center font-semibold">Grade Group</th>
						<th class="px-3 py-2 text-center font-semibold">Grade Color</th>
						<th class="px-3 py-2 text-center font-semibold">Grade Order</th>
						<th class="px-3 py-2 text-center font-semibold" colspan="3">Actions</th>
					</tr>
				</thead>

				<tbody class="divide-y divide-gray-200">
					<?php while($row=mysqli_fetch_array($result)) { ?>
					<tr class="hover:bg-gray-200 transition cursor-pointer" title="<?php echo "Grade" . $row['grade_name'] . "'s Details"; ?>" onclick="window.location='?page=show&section=grade&id=<?php echo $row['id']; ?>'">
						<td class="px-3 py-4 text-center"><?php echo $row['grade_name']; ?></td>
						<td class="px-3 py-2 text-center"><?php echo $row['grade_group']; ?></td>
						<td class="px-3 py-2 text-center"><?php echo $row['grade_color']; ?></td>
						<td class="px-3 py-2 text-center"><?php echo $row['grade_order']; ?></td>

						<td class="px-2 w-[60px]">
						<a href="grade/delete.php?id=<?php echo $row['id']; ?>" title="Delete grade details"
							onclick="return confirm('Do you want to delete?')"
							class="flex justify-center items-center py-2 text-white bg-red-500 rounded hover:bg-red-400 text-xs">
							<img src="./public/bin.png" alt="delete image" class="w-4 h-4 invert">
						</a>
					</td>

					<td class="px-2 w-[60px]">
						<a href="?section=grade&page=edit&id=<?php echo $row['id']; ?>" title="Edit grade details"
							class="flex justify-center items-center py-2 text-white bg-yellow-500 rounded hover:bg-yellow-600 text-xs">
							<img src="./public/edit.png" alt="edit image" class="w-4 h-4 invert">
						</a>
					</td>

					<td class="px-2 w-[60px]">
						<a href="?section=grade&page=add-sub-form&id=<?php echo $row['id']; ?>" title="Add subjects to the grade"
							class="flex justify-center items-center py-2 text-white bg-blue-600 rounded hover:bg-blue-700 text-xs"
							onclick="return confirm('Do you want to delete?')">
						<img src="./public/add.png" alt="add image" class="w-4 h-4 invert">
						</a>
					</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
	</body>
