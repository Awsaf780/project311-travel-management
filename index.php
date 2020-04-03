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
			$error = "Your Login Name or Password is invalid";
		}
	}

	$package_query = "SELECT * FROM package ORDER BY cost LIMIT 6";
	$package_result = mysqli_query($conn, $package_query);

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
 					     Username<br><input required autofocus="on" class="login-box" type="text" name="username" placeholder="Enter Username">
 				</div>
 				<div>
 					     Password<br><input required class="login-box" type="password" name="pass" placeholder="Enter Password">
 				</div>
 				<div>
 					<input class="login-button" type="submit" name="" value="   SUBMIT   ">

 				</div>
 			</form>
 			<?php echo '<p style="color:white">'.$error.'</p>'; ?>
 			<div style="color: white">
 				<h4>or <a style="color: white; text-decoration: none" href="signup.php">Sign Up</a></h4>
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
				while ($row = mysqli_fetch_assoc($package_result)) {
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
	</div>

	<div class="wrapper">

		<div>
			<h4 class="subtitle">Popular Bus Routes</h4><hr class="divider">
		</div>

		<div>
			
		</div>
	</div>




 </body>
 </html>