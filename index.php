<?php
	include 'config.php';

	session_start();
	$error = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$myusername = mysqli_real_escape_string($conn,$_POST['username']);
		$mypassword = mysqli_real_escape_string($conn,$_POST['pass']);

		$sql = "SELECT id FROM login WHERE username = '$myusername' and pass = '$mypassword'";
		$result = mysqli_query($conn,$sql);
		$log = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$count = mysqli_num_rows($result);

		if($count == 1) {
			$_SESSION['login_user'] = $myusername;
			header("location: welcome.php");
		}else {
			$error = "Invalid username or password";
		}
	}

	$package_query = "SELECT * FROM package GROUP BY destination LIMIT 4";
	$package_result = mysqli_query($conn, $package_query);

	$hotel_query = "SELECT DISTINCT * FROM hotel LIMIT 6";
	$hotel_result = mysqli_query($conn, $hotel_query);



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Travel Management</title>
 	<link rel="stylesheet" type="text/css" href="styles.css">
 </head>

 <body>
 	<div class="header">
 		<?php include 'header_before.php'; ?>
 	</div>

 	<div class="landing">
 		<div class="landing-image">
 			<img src="images/landing.svg">
 		</div>
 		<div class="landing-start">
 			<div class="login-title"><h1>Sign In</h1></hr></div>

 			<form class="login-form" action="" method="post">
 				<div>
					<!-- <label>Username</label> -->
 					<input required autofocus="on" class="login-box" type="text" name="username" placeholder="Enter Username">
 				</div>
 				<div>
					<!-- <label>Password</label> -->
 					<input required class="login-box" type="password" name="pass" placeholder="Enter Password">
 				</div>
 				<div>
 					<button class="login-button" type="submit">Sign In</button>
 				</div>
 			</form>
 			<?php echo '<p style="color:white">'.$error.'</p>'; ?>
 			<div style="color: white">
 				<h5>Don't have an account? <a style="color: white; text-decoration: none" href="signup.php"><i>Sign Up</i></a></h5>
 			</div>

 		</div>
 	</div>

 	<div class="wrapper">

		<div>
			<h4 class="subtitle">Featured Packages</h4><hr class="divider">
		</div>

		<div class="feature-package">
			<?php
			if (mysqli_num_rows($package_result) > 0 ) {
				while ($row1 = mysqli_fetch_assoc($package_result)) {
					echo '<div class="card">
							<div class="card-image"><img src="images/package/'.$row1['imagename'].'.svg"></div>
							<div class="container">
								<h5><b>'.$row1['name'].'</b></h5>
								<h6>'.$row1['duration'];

								if ($row1['duration'] > 1) {
									echo " Days";
								}else {
									echo " Day";
								}

								echo ' - BDT '.$row1['cost'].'</h6>
							</div>
						  </div>';
				}
			}

		 ?>
		</div>
	</div>

	<div class="wrapper">

		<div>
			<h4 class="subtitle">Popular Hotels</h4><hr class="divider">
		</div>

		<div>
			<div class="feature-hotel">
				<?php
				if (mysqli_num_rows($hotel_result) > 0) {
					while ($row2 = mysqli_fetch_assoc($hotel_result)) {
						echo '<div class="cardlet">

								<div class="card-img">
									<img src="images/hotel.svg">
								</div>

								<div class="card-text">
									<h5>'.$row2['name'].'</h5>
								</div>
								<div class="card-star">';
									for ($i=0; $i < $row2['stars']; $i++) {
										echo ' <img src="images/star.svg"> ';
									}
						echo '</div></div>';
					}
				}

				 ?>
			</div>
		</div>
	</div>


	<div>
		<?php include 'footer.php'; ?>
	</div>
 </body>
 </html>
