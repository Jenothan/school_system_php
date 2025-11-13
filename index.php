<html>

<head>
	 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
	  <!-- <link rel="stylesheet" href="../global.css"> -->
</head>

<body class="bg-light">
	<?php
	include('auth/auth_session.php');
	require_once('./config.php');

	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = "index";
	}

	//--------------- get folder name ---------------------------------

	if (isset($_GET['section'])) {
		$sec = $_GET['section'];
	} else {
		$sec = "grade";
	}

	//--------------- path identifying ----------------------------------

	
		$path = $sec."/".$page.".php";
	

	
	?>

	<table style="width: 100%; height: 100%;" border="1">
		<tr style="height: 10%;" class="navbar navbar-dark bg-dark fixed-top">
			<th colspan="2" style="width: 100%;"><?php echo ucfirst($sec). "     ";  echo ucfirst($page); ?></th>
		</tr>
		<tr style="height: 80%;">
			<td style="width: 20%;" class="sidebar">
				<h2>Menu</h2>
				<hr>
				<ul class="nav flex-column gap-2">
					<li class="nav-item"><a href="?section=grade&page=index" target="iframe_a" class="nav-link">Grade</a></li>
					<li class="nav-item"><a href="?section=student&page=index" target="iframe_a" class="nav-link">Students</a></li>
					<li class="nav-item"><a href="?section=subject&page=index" target="iframe_a" class="nav-link">Subjects</a></li>
				</ul>
				<a href="auth/logout.php"><button class="btn btn-warning">Logout</button></a>
			</td>
			<td style="width: 80%;">
				<?php 
					//---------------- include file path -----------------------------------

						if (file_exists($path)) {
							include_once($path);
						} else {
							echo "<h1>404 page not found</h1>";
						}
				?>
			</td>
		</tr>
		<tr style="height: 10%;">
			<td colspan="2" style="width: 100%;">Footer</td>
		</tr>
	</table>
</body>

</html>