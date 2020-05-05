<?php
   include('session.php');
   include 'profile_picture.php';
?>

<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<style>
		.dropbtn {
			background-color: var(--main-color-theme);
			color: white;
			padding: 16px;
			font-size: 16px;
			border: none;
			cursor: pointer;
		}

		.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background: white;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
			color: black;
			border-radius: 5px;
			/*right: 0;*/
		}

		.dropdown-content a {
			padding: 8px 16px;
			font-size: 15px;
			text-decoration: none;
			display: block;
			color: var(--main-color-theme);
			text-align: center;
			min-width: 100px;
		}

		.dropdown-content a:hover {background-color: var(--main-color-theme); color: white}

		.dropdown:hover .dropdown-content {
			display: block;
		}

	</style>
</head>
 <header class="profile-header">
	<div class="container-header">
		<h1 class="mh-logo-profile">
			<a href="welcome.php">Home</a>
		</h1>
		<div class="dropdown">
			<button class="dropbtn">Menu</button>
			<div class="dropdown-content">
				<a style="margin-top: 10px;" href="profile.php">Profile</a>
				<a href="welcome.php">Packages</a>
				<a href="settings.php">Settings</a>
				
				<hr style="margin: 0 20px; border-top: 1px solid var(--main-color-theme);">
				<a style="margin-bottom: 10px;" href="logout.php">Logout</a>
				
			</div>
		</div>
	</div>
</header>
