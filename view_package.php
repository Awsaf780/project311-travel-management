<?php

    include 'config.php';
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $selected_package = "SELECT * FROM package WHERE id='$id'";
        $selected_package_result = mysqli_query($conn, $selected_package);

        if (mysqli_num_rows($selected_package_result)==1) {
            $my_package = mysqli_fetch_assoc($selected_package_result);
        }
        else {
        	header("Location: 404.php");
			exit();
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $my_package['name']; ?></title>
</head>
<body>
	<div>
		<?php include 'header.php'; ?>
	</div>

	<div class="wrapper" style="min-height: 90vh; margin: 0 25vh;">
		<h1><?php echo $my_package['name']; ?></h1>
		<p>Insert Necessary Details here</p>
		<button><a href="">Book Now!</a></button>
		<?php 
			for ($i=0; $i < 6; $i++) { 
				if ($i%2 == 0) {
					echo "<h5>Generic Title</h5>";
				}
					echo "<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						  </p>";
			}
		 ?>
	</div>

	<div>
		<?php include 'footer.php'; ?>
	</div>
</body>
</html>