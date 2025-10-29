<html>
	<head>
		<link rel='stylesheet' href='../global.css' />
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
					<th colspan='3'>Actions</th>
				</tr>
			<?php while($row=mysqli_fetch_array($result)) { ?>
				<tr>
					<td><?php echo $row[1]; ?></td>
					<td><?php echo $row[2]; ?></td>
					<td><?php echo $row[3]; ?></td>
					<td><?php echo $row[4]; ?></td>
					<td><a href="delete.php?id=<?php echo $row[0]; ?>" onclick="return confirm('Do you want to delete?')"><button class="delete" style="color: white; padding: 5px; cursor: pointer;">Delete</button></a></td>
					<td><a href="edit.php?id=<?php echo $row[0]; ?>"><button class="edit" style="color: white; padding: 5px; cursor: pointer;">Edit</button></a></td>
					<td><a href="show.php?id=<?php echo $row[0]; ?>"><button class="show" style="color: white; padding: 5px; cursor: pointer;">View</button></a></td>
				</tr>
			<?php } ?>
			</table>
						<a href="create_grade_form.php"><button style="width: 200px; padding: 10px; background-color: green; border-radius: 10px; cursor: pointer; color: white;">Add Grade</button></a>

	</body>
</html>