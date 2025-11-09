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
					<th style="width: 40%;">Profile</th>
					<th style="width: 40%;">Father Name</th>
					<th style="width: 40%;">Student Name</th>
					<th style="width: 40%;">Addmission No</th>
					<th style="width: 40%;">Grade ID</th>
					<th style="width: 40%;">NIC</th>
					<th style="width: 40%;">DOB</th>
					<th style="width: 40%;">Gender</th>
					<th style="width: 40%;">Telephone</th>
					<th style="width: 40%;">Address</th>
					<th style="width: 40%;" colspan='4'>Actions</th>
				</tr>
			<?php while($row=mysqli_fetch_array($result)) { ?>
				<tr>
					<?php
					$path="../profiles/def.jpg";
					$alt="default profile image";
					$img_query="SELECT file_name, original_name FROM images WHERE student_id='$row[0]'";
					$img_res=mysqli_query($con, $img_query);
					if(mysqli_num_rows($img_res)){
						$img_row=mysqli_fetch_array($img_res);
						$path=$img_row['file_name'];
						$alt=$img_row['original_name'];
					}
					?>
					
					<td>
						<img src='<?php echo $path; ?>' alt='profile image' width=75 height=75 style='border-radius:100%;' /> 
					</td>
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
					<td><a href="delete.php?id=<?php echo $row[0]; ?>" class="btn btn-danger">Delete</a></td>
					<td><a href="edit.php?id=<?php echo $row[0]; ?>" class="btn btn-warning">Edit</a></td>
					<td><a href="show.php?id=<?php echo $row[0]; ?>" class="btn btn-success">View</a></td>
					<td><a href="addsub_form.php?id=<?php echo $row[0]; ?>" class="btn btn-primary">Sub</a></td>
				</tr>
			<?php } ?>
			</table>
			<a href="Create_Form.php" class="btn btn-success">Add Student</a>
	</body>
</html>