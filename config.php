<?php 

	$conn = mysqli_connect("localhost", "root", "", 'project311');

	if(!$conn) {
		die("Connection Error " . mysqli_connect_error());
	}
	
 ?>