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

<div class="wrapper-view-package">

	<div class="view-box">

		<div class="package-text">
			<h1 style="color: grey"><?php echo $my_package['name']; ?></h1>
			
			<table>
				<tr>
					<th>Attractions</th>
					<th><?php echo $my_package['attractions']; ?></th>
				</tr>
				<tr>
					<td>Destination</td>
					<td><?php echo $my_package['destination']; ?></td>
				</tr>
				<tr>
					<td>Cost</td>
					<td>BDT <?php echo $my_package['cost']; ?></td>
				</tr>
				<tr>
					<td>Duration</td>
					<td><?php echo $my_package['duration']; if($my_package['duration']==1){echo " Day";}else{echo " Days";}?></td>
				</tr>

			</table>
		</div>
		<div class="package-img">
			<?php echo '<img src="images/package/'.$my_package['imagename'].'.svg">'; ?>
		</div>

	</div>

	<div class="view-button">
		<?php echo '<a class="a-button" href="index2.php?id='.$my_package['id'].'">' ?> Book Now! </a>
	</div>	

</div>

<div>
	<?php include 'footer.php'; ?>
</div>

</body>
</html>
