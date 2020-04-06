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

	<div class="wrapper" style="min-height: 90vh">
		<h1><?php echo $my_package['name']; ?></h1>
		<p>Insert Necessary Details here</p>
		<button><a href="">Book Now!</a></button>	
	</div>

	<div>
		<?php include 'footer.php'; ?>
	</div>
	
</body>
</html>