
<?php


	include'config.php';
	session_start();
	$tempid = $_SESSION['login_user'];
	$one = "(SELECT id FROM client WHERE client.username LIKE '$tempid')";
	$temp = mysqli_query($conn,$one);
	$booking_id = mysqli_fetch_assoc($temp);


	$booking_hotel   =  $_POST['hotel_id'];
	$booking_pakage =  $_POST['package_id'];
	$booking_transport =  $_POST['transport_id'];
	$booking_transaction =  $_POST['transaction_id'];
	$booking_transport_type =  $_POST['transport_type'];
	$booking_num_parson =  $_POST['num_person'];
	$booking_date =  $_POST['travel_date'];



	$final = "INSERT INTO `booking` (`id`, `client_id`, `hotel_id`, `package_id`, `transport_id`, `transaction_id`, `transport_type`, `num_person`, `travel_date`) VALUES (NULL, '$booking_id['id']', '$booking_hotel', '$booking_pakage', '$booking_transport', '$booking_transaction', '$booking_transport_type', '$booking_num_parson', '$booking_date');";

	$is_inserted = mysqli_query($conn,$final);

	if($is_inserted){
	  echo "Inserted successfully";
	}
	else{
	  echo "Opps error!";

	}


?>
