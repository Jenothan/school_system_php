<html>
	<head>
		<link rel='stylesheet' href='../global.css' />
	</head>
	<body>
		<?php 
			include('../auth/auth_session.php');
			require_once('../config.php');
		
			$query="SELECT * FROM students WHERE deleted_at IS NULL";
			$result=mysqli_query($con, $query);
			
			if(!$result){
				die(mysqli_error($con));
			}
		?>
			<h1>Student Details</h1>
			<table>
				<tr>
					<th>Father Name</th>
					<th>Student Name</th>
					<th>Addmission No</th>
					<th>Grade ID</th>
					<th>NIC</th>
					<th>DOB</th>
					<th>Gender</th>
					<th>Telephone</th>
					<th>Address</th>
					<th colspan='3'>Actions</th>
				</tr>
			<?php while($row=mysqli_fetch_array($result)) { ?>
				<tr>
					<td><?php echo $row[1]; ?></td>
					<td><?php echo $row[2]; ?></td>
					<td><?php echo $row[3]; ?></td>
					<td><?php echo $row[4]; ?></td>
					<td><?php echo $row[5]; ?></td>
					<td><?php echo $row[6]; ?></td>
					<td><?php echo $row[7]; ?></td>
					<td><?php echo $row[8]; ?></td>
					<td><?php echo $row[9]; ?></td>
					<td><button class="delete"><a href="delete.php?id=<?php echo $row[0]; ?>">Delete</a></button></td>
					<td><button class="edit"><a href="edit.php?id=<?php echo $row[0]; ?>">Edit</a></button></td>
					<td><button class="show"><a href="show.php?id=<?php echo $row[0]; ?>">View</a></button></td>
				</tr>
			<?php } ?>
			</table>
			<a href="Create_Form.php"><button style="width: 200px; padding: 10px; background-color: green; border-radius: 10px; cursor: pointer; color: white;">Add Employee</button></a>
	</body>
</html>