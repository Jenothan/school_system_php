
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
				<div>
					<?php echo $error_msg; ?>
				</div>
			<?php } ?>
			<table border="1" >
				<thead>
					<tr>
						<th>Grade Name</th>
						<th>Grade Group</th>
						<th>Grade Color</th>
						<th>Grade Order</th>
						<th colspan="3">Actions</th>
					</tr>
				</thead>

				<tbody>
					<?php while($row=mysqli_fetch_array($result)) { ?>
					<tr title="<?php echo "Grade" . $row['grade_name'] . "'s Details"; ?>" onclick="window.location='?page=show&section=grade&id=<?php echo $row['id']; ?>'">
						<td><?php echo $row['grade_name']; ?></td>
						<td><?php echo $row['grade_group']; ?></td>
						<td><?php echo $row['grade_color']; ?></td>
						<td><?php echo $row['grade_order']; ?></td>

						<td>
						<a href="grade/delete.php?id=<?php echo $row['id']; ?>" title="Delete grade details"
							onclick="return confirm('Do you want to delete?')"
							>
							<img src="./public/bin.png" alt="delete image" >
						</a>
					</td>

					<td>
						<a href="?section=grade&page=edit&id=<?php echo $row['id']; ?>" title="Edit grade details"
							>
							<img src="./public/edit.png" alt="edit image" >
						</a>
					</td>

					<td>
						<a href="?section=grade&page=add-sub-form&id=<?php echo $row['id']; ?>" title="Add subjects to the grade"
							onclick="return confirm('Do you want to delete?')">
						<img src="./public/add.png" alt="add image" >
						</a>
					</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
	</body>
