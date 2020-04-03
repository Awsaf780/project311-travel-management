<?php 
	include 'config.php';
	$image = 'nature';
	$image2 = 'lake';

	$sql = "SELECT * FROM package ORDER BY cost LIMIT 6";
	$result = mysqli_query($conn, $sql);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Travel Management</title>
 	<link rel="stylesheet" type="text/css" href="styles.css">
 </head>
 <body>
 	<h1>Travel Management System</h1>
 	<a href="login.php">Sign In</a><br>

 	<div class="wrapper">

		<div><h4 class="subtitle">Featured Packages</h4><hr></div>
		<div class="feature-package">
			<?php 
			if (mysqli_num_rows($result) > 0 ) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<div class="card">
							<div class="card-image"><img src="images/package/'.$row['imagename'].'.svg"></div>
							<div class="container">
								<h5><b>'.$row['name'].'</b></h5>
								<h6>'.$row['duration'].' Days - BDT '.$row['cost'].'</h6>
							</div>
							</div>';
				}
			}

		 ?>	
		</div>
		<div><h4 class="subtitle">Popular Bus Routes</h4><hr></div>
 	</div> 	
 </body>
 </html>