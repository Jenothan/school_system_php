<html>
	<head>
		<link rel='stylesheet' href='../global.css' />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<?php 
			include('../auth/auth_session.php');
			require_once('../config.php');
		
			$query="SELECT * FROM grade WHERE deleted_at IS NULL";
			$result=mysqli_query($con, $query);
			
			if(!$result){
				die(mysqli_error($con));
			}
		?>
			<h1>Grade Details</h1>
			<table>
				<tr>
					<th style="padding: 8px;">Grade Name</th>
					<th>Grade Group</th>
					<th>Grade Color</th>
					<th>Grade Order</th>
					<th colspan='4'>Actions</th>
				</tr>
			<?php while($row=mysqli_fetch_array($result)) { ?>
				<tr>
					<td><?php echo $row[1]; ?></td>
					<td><?php echo $row[2]; ?></td>
					<td><?php echo $row[3]; ?></td>
					<td><?php echo $row[4]; ?></td>
					<td><a href="delete.php?id=<?php echo $row[0]; ?>" onclick="return confirm('Do you want to delete?')"><button class="btn btn-danger">Delete</button></a></td>
					<td><a href="edit.php?id=<?php echo $row[0]; ?>"><button class="btn btn-warning">Edit</button></a></td>
					<td><a href="show.php?id=<?php echo $row[0]; ?>"><button class="btn btn-info">View</button></a></td>
					<td><a href="add_grade_sub_form.php?id=<?php echo $row[0]; ?>"><button class="btn btn-primary">Add Sub</button></a></td>
				</tr>
			<?php } ?>
			</table>
						<a href="create_grade_form.php"><button class="btn btn-success" style="width: 200px; padding: 10px; background-color: green; border-radius: 10px; cursor: pointer; color: white;">Add Grade</button></a>

	</body>
</html>