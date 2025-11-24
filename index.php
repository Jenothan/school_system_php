<html>

<head>
<script src="https://cdn.tailwindcss.com"></script>

	   <style>
		.hide-scrollbar::-webkit-scrollbar {
				display: none;
			}
		</style>
		
</head>

<body class="bg-light select-none">
	<?php
	include('auth/auth-session.php');
	require_once('./config.php');

	if(isset($_SESSION['username'])) { 
		$user=$_SESSION['username'];
		$user_query="SELECT * FROM users WHERE username='$user'";
		$user_res=mysqli_query($con, $user_query);
		$user_row=mysqli_fetch_array($user_res);
		$user_image_path=substr($user_row['image'], 3);
	} 
	else {
		$signin=ucfirst("Sign In");
	}


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

	<table style="width: 100%; height: 100%;">
		<tr style="height: 10%;" class="bg-[#2E4756]">
			<th colspan="2" class="p-3">
				<div class="flex flex-row justify-between items-center px-4 py-2">
					<div class="flex justify-center items-center gap-3">
						<img src="./public/school.png" alt="school logo" class="w-8 h-8 invert">
						<h2 class="text-3xl text-white">Menu</h2>
					</div>
					<h1 class="text-4xl text-white">
						<?php echo ucfirst($sec) . " Details" ?>
					</h1>

					<a href="?page=create-form&section=<?php echo $sec; ?>" title="<?php echo "Add New " . ucfirst($sec) . " Details"; ?>"
					class="bg-[#FFBF00] px-6 py-3 text-black w-40 hover:bg-[#CB9800] rounded-[10px]">
					+ Add <?php echo ucfirst($sec); ?>
					</a>
				</div>
			</th>
		</tr>
		
		<tr style="height: 90%;">
			<td style="width: 15%;" class="p-3 bg-[#16262E] text-white">
				<div class="flex flex-col w-full h-full justify-between py-3">
					<div>
						<ul class="flex flex-col gap-2">

							<a href="?section=grade&page=index">
								<li class="px-3 py-2 flex flex-row gap-3 <?php echo $sec=='grade' ? 'bg-[#3C7A89]' : '';  ?> hover:bg-[#448A9C] rounded">
									<img src="./public/grade.png" alt="grade img" width="20" height="20" class="invert">
									Grade
								</li>
							</a>
							<a href="?section=student&page=index">
								<li class="px-3 py-2 flex flex-row gap-3 <?php echo $sec=='student' ? 'bg-[#3C7A89]' : '';  ?> hover:bg-[#448A9C] rounded">
									<img src="./public/student.png" alt="grade img" width="20" height="20" class="invert">
									Student
								</li>
							</a>

							<a href="?section=subject&page=index">
								<li class="px-3 py-2 flex flex-row gap-3 <?php echo $sec=='subject' ? 'bg-[#3C7A89]' : '';  ?> hover:bg-[#448A9C] rounded">
									<img src="./public/subject.png" alt="grade img" width="20" height="20" class="invert">
									Subject
								</li>
							</a>
							
						</ul>
					</div>
					<div class="flex flex-col w-full gap-4">
						<h1 class="text-2xl">Profile</h1>
						<div class="w-full flex flex-row justify-center items-center"  title="Admin Profile Details">
							<img src="./public/bg.jpg" alt="background image" class="w-full h-full  border rounded-lg">
							<div class="absolute flex flex-col items-center">
								<img src="<?php echo $user_image_path; ?>" alt="profile image" class="w-20 h-20 object-cover rounded-full border-2">
								<label class="text-md"><?php echo ucfirst($user); ?></label>
							</div>
						</div>
						
						<a href="auth/logout.php"
						 class="flex flex-row justify-center items-center gap-3 px-5 py-2 w-full bg-red-500 hover:bg-red-400 text-white rounded">
							Logout
							<img src="./public/out.png" alt="logout img" width="20" height="20" class="invert">
						</a>
					</div>
				</div>
			</td>
			<td style="width: 85%;">
				<div class="overflow-auto hide-scrollbar h-full p-2">
					<?php 

					//---------------- include file path -----------------------------------

							if (file_exists($path)) {
								include_once($path);
							} else {
								echo "<div class='flex justify-center items-center w-full h-full'>
											<h1 class='text-3xl text-red-600 rounded-xl px-8 py-12 border border-dashed border-red-600'>
												404 page not found
											</h1>
										<div>"
									;
							}

					?>
				</div>
			</td>
		</tr>
	</table>
</body>

</html>