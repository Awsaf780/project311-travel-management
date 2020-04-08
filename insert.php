<?php


include'config.php';
	$booking_hotel   =  $_POST['hotel_id'];
	$booking_pakage =  $_POST['package_id'];
	$booking_transport =  $_POST['transport_id'];
	$booking_transaction =  $_POST['transaction_id'];
	$booking_transport_type =  $_POST['transport_type'];
	$booking_num_parson =  $_POST['num_person'];
	$booking_date =  $_POST['travel_date'];
	$User_ID =  $_POST['User_ID'];
	if(isset($_POST['hotel_id']) && isset($_POST['package_id'])&&isset($_POST['transport_id']) && isset($_POST['transaction_id'])&&isset($_POST['transport_type']) && isset($_POST['num_person'])&&isset($_POST['travel_date'])){





	$is_inserted = mysqli_query($conn,"INSERT INTO booking(`hotel_id`, `package_id`, `transport_id`, `transaction_id`, `transport_type`, `num_person`, `travel_date`,`client_id`)
	VALUES ('$booking_hotel','$booking_pakage','$booking_transport, $booking_transaction','$booking_transport_type','$booking_num_parson','$booking_date','$User_ID')");

	if($is_inserted){
	  echo "Inserted successfully";
	}
	else{
	  echo "Opps error!";

	}
}


?>
