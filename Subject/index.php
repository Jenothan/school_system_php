<html>
	<head>
		<link rel='stylesheet' href='../global.css' />
	</head>
	<body>
		<?php 
			include('../auth/auth_session.php');
			require_once('../config.php');
		
			$query="SELECT * FROM subjects WHERE deleted_at IS NULL";
			$result=mysqli_query($con, $query);
			
			if(!$result){
				die(mysqli_error($con));
			}
		?>
			<h1>Subjects Details</h1>
			<table>
				<tr>
					<th style="padding: 8px;">Subject Name</th>
					<th>Subject Index</th>
					<th>Subject Order</th>
					<th>Subject Color</th>
					<th>Subject Number</th>
					<th colspan='3'>Actions</th>
				</tr>
			<?php while($row=mysqli_fetch_array($result)) { ?>
				<tr>
					<td><?php echo $row[1]; ?></td>
					<td><?php echo $row[2]; ?></td>
					<td><?php echo $row[3]; ?></td>
					<td><?php echo $row[4]; ?></td>
					<td><?php echo $row[5]; ?></td>
					<td><button class="delete"><a href="delete.php?id=<?php echo $row[0]; ?>" onclick="return confirm('Do you want to delete?')">Delete</a></button></td>
					<td><button class="edit"><a href="edit.php?id=<?php echo $row[0]; ?>">Edit</a></button></td>
					<td><button class="show"><a href="show.php?id=<?php echo $row[0]; ?>">View</a></button></td>
				</tr>
			<?php } ?>
			</table>
						<a href="create_subject_form.php"><button style="width: 200px; padding: 10px; background-color: green; border-radius: 10px; cursor: pointer; color: white;">Add Subjects</button></a>

	</body>
</html>