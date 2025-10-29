<?php 
	$con = mysqli_connect("localhost", "root", "Jeno@1210", "school_data");
	if(!$con){
		die(mysqli_connect_error($con));
	}
?>