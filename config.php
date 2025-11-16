<?php 
	$con = mysqli_connect("localhost", "root", "Jeno@1210", "school_data");
	if(!$con){
		error_log("Connection failed: " . mysqli_connect_error());
		die("Connection failed. Please try again later.");
	}
?>