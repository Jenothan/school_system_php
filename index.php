<html>
	<head>
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body class="bg-light">


	  <header class="bg-secondary text-white text-center py-3">
		<h1>School Data</h1>
	  </header>

	  <div class="container-fluid">
		<div class="row">

		 
		  <aside class="col-md-3 col-lg-2 bg-dark text-white p-3 min-vh-100">
			<ul class="nav flex-column">
			  <li class="nav-item"><a href="?page=grade/index.php" target="iframe_a" class="nav-link text-white">Grade</a></li>
			  <li class="nav-item"><a href="?page=student/index.php" target="iframe_a" class="nav-link text-white">Students</a></li>
			  <li class="nav-item"><a href="?page=subject/index.php" target="iframe_a" class="nav-link text-white">Subjects</a></li>
			</ul>
		  </aside>

		  <main class="col-md-9 col-lg-10">
			<?php $page=$_GET['page'] ?? 'grade/index.php' ?>
				<iframe src="<?php echo $page; ?>" name="iframe_a" title="contents" height="100%" width="100%"></iframe>
			
		  </main>

		</div>
	  </div>
	  
	  <footer class="bg-secondary text-white text-center py-3 mt-auto">
		<p>All Rights Reserved</p>
	  </footer>
  
	</body>
</html>
