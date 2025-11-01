<html>
	<head>
		<link rel='stylesheet' href='../global.css' />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
					<th>Subjects</th>
					<th colspan='4'>Actions</th>
				</tr>
			<?php while($row=mysqli_fetch_array($result)) { ?>
				<tr>
					<td><?php echo $row[1]; ?></td>
					<td><?php echo $row[2]; ?></td>
					<td><?php echo $row[3]; ?></td>
		<?php
			$quer="SELECT id, grade_name FROM grade";
		
			$res=mysqli_query($con, $quer);
			
			if(!$res) {
				die("Query Failed!".mysqli_error($con));
			}
			while($rows=mysqli_fetch_assoc($res)) { 
				if($row[4]==$rows['id']){
			?>
					<td><?php echo $rows['grade_name']; break;  ?></td>
			<?php } ?>
			<?php } ?>
					<td><?php echo $row[5]; ?></td>
					<td><?php echo $row[6]; ?></td>
					<td><?php echo $row[7]; ?></td>
					<td><?php echo $row[8]; ?></td>
					<td><?php echo $row[9]; ?></td>
					<td><?php echo $row[9]; ?></td>
					<td><a href="delete.php?id=<?php echo $row[0]; ?>"><button class="btn btn-danger">Delete</button></a></td>
					<td><a href="edit.php?id=<?php echo $row[0]; ?>"><button class="btn btn-warning">Edit</button></a></td>
					<td><a href="show.php?id=<?php echo $row[0]; ?>"><button class="btn btn-success">View</button></a></td>
					<td><a href="addsub_form.php?id=<?php echo $row[0]; ?>"><button class="btn btn-primary">Sub</button></a></td>
				</tr>
			<?php } ?>
			</table>
			<a href="Create_Form.php"><button class="btn btn-success">Add Student</button></a>
	</body>
</html>