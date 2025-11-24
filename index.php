<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<style>
		.hide-scrollbar::-webkit-scrollbar {
			display: none;
		}
	</style>

</head>

<body class="select-none">
	<?php
	include('auth/auth-session.php');
	require_once('./config.php');

	if (isset($_SESSION['username'])) {
		$user = $_SESSION['username'];
		$user_query = "SELECT * FROM users WHERE username='$user'";
		$user_res = mysqli_query($con, $user_query);
		$user_row = mysqli_fetch_array($user_res);
		$user_image_path = substr($user_row['image'], 3);
	} else {
		$signin = ucfirst("Sign In");
	}

	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = "index";
	}

	if (isset($_GET['section'])) {
		$sec = $_GET['section'];
	} else {
		$sec = "grade";
	}

	$path = $sec . "/" . $page . ".php";
	?>

	<table style="width: 100%; height: 100%;">
		<tr style="height: 10%;">
			<th colspan="2" class="d-flex flex-row text-white justify-content-between py-3 bg-dark">
				
					<div>
						<img src="./public/school.png" alt="school logo" width="30" height="30">
						<h2>Menu</h2>
					</div>

					<h1>
						<?php echo ucfirst($sec) . " Details" ?>
					</h1>

					<a href="?page=create-form&section=<?php echo ucfirst($sec); ?>"
						title="<?php echo "Add New " . ucfirst($sec) . " Details"; ?>">
						+ Add <?php echo ucfirst($sec); ?>
					</a>
				
			</th>
		</tr>

		<tr style="height: 90%;">
			<td style="width: 15%;">
				
				<div class="text-white bg-dark">

                    <div class="d-flex flex-column">
                        <ul>

                            <a href="?section=grade&page=index">
                                <li>
                                    <img src="./public/grade.png" alt="grade img" width="20" height="20">
                                    Grade
                                </li>
                            </a>

                            <a href="?section=student&page=index">
                                <li>
                                    <img src="./public/student.png" alt="student img" width="20" height="20">
                                    Student
                                </li>
                            </a>

                            <a href="?section=subject&page=index">
                                <li>
                                    <img src="./public/subject.png" alt="subject img" width="20" height="20">
                                    Subject
                                </li>
                            </a>

                        </ul>
                    </div>

                    <div class="d-flex flex-column">
                        <h1>Profile</h1>
                        
                        <div title="Admin Profile Details" >
                            <img src="./public/bg.jpg" alt="background image" class="position-relative w-25 h-25">
                            <div class="position-absolute p-2">
                                <img src="<?php echo $user_image_path; ?>" 
                                     alt="profile image" width="80" height="80" />
                                <label><?php echo ucfirst($user); ?></label>
                            </div>
                        </div>
                        
                        <a href="auth/logout.php">
                            Logout
                            <img src="./public/out.png" alt="logout img" width="20" height="20">
                        </a>
                    </div>

                </div>
			</td>

			<td style="width: 85%;">
				<div class="hide-scrollbar" style="overflow: auto; height: 100%; padding: 10px;">
					<?php
					if (file_exists($path)) {
						include_once($path);
					} else {
						echo "<h1>404 page not found</h1>";
					}
					?>
				</div>
			</td>
		</tr>

	</table>

</body>

</html>