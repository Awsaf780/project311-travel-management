
<?php
  include'config.php';
  include ("header.php");




	$tempid = $_SESSION['login_user'];
	$one = "(SELECT id FROM client WHERE client.username LIKE '$tempid')";
	$temp = mysqli_query($conn,$one);
	$booking_id = mysqli_fetch_assoc($temp);


	$booking_hotel   =  $_GET['hotel_id'];
	$booking_pakage =  $_GET['package_id'];
	$booking_transport =  $_GET['transport_id'];
	$booking_transaction =  $_GET['transaction_id'];
	$booking_num_parson =  $_GET['num_person'];
	$booking_date =  $_GET['travel_date'];
  $booking_clientid=$booking_id['id'];

  $check_type = substr($booking_transport, 0, 3);

  if ($check_type == "AIR") {
    $booking_transport_type =  "Air";
  }
  elseif ($check_type == "WTR") {
    $booking_transport_type =  "Water";
  }
  elseif ($check_type == "BUS") {
    $booking_transport_type =  "Bus";
  }

  $finding_count=mysqli_query($conn,"select id from booking ORDER BY id DESC LIMIT 1");
  $finding_count_2=mysqli_fetch_assoc($finding_count);
  $finding_count_3=$finding_count_2['id'];
  if(is_null($finding_count_3))
  {
    $finding_count_final=1;
  }
  else
  {
    $finding_count_final=$finding_count_3+1;
  }



  ?>

	<?php


$hcostl=mysqli_query($conn,"select hotel.cost from hotel where id='$booking_hotel'");
$hcost=mysqli_fetch_assoc($hcostl);
$hcostll=$hcost['cost'];
$tcostl=mysqli_query($conn,"select transport.price FROM transport where id='$booking_transport'");
$tcost=mysqli_fetch_assoc($tcostl);
$tcostll=$tcost['price'];
$pcostl=mysqli_query($conn,"select package.cost FROM package where id='$booking_pakage'");
$pcost=mysqli_fetch_assoc($pcostl);
$pcostll=$pcost['cost'];

$searchingolderbooking=mysqli_query($conn,"select booking.client_id from booking where client_id='$booking_clientid'");
$searchingolderbooking1=mysqli_fetch_assoc($searchingolderbooking);
if(is_null($searchingolderbooking1)){
  $searchingolderbooking2=null;
}
else{
  $searchingolderbooking2=$searchingolderbooking1['client_id'];
}
if(is_null($searchingolderbooking2))
{
  $total_amount=(((($hcostll+$tcostll+$pcostll)-(($hcostll+$tcostll+$pcostll)*15/100))*30/100)*$booking_num_parson);
  echo "Dear client, you got 15% flat discount as this is your first booking. Please complete your payment. Thank you!<br>";
}
else
{
  $total_amount= ((($hcostll+$tcostll+$pcostll)*30/100)*$booking_num_parson);
}
?>
<?php
include 'config.php';
$card=$cvv=$exp='';
if(isset($_POST['submit']))
{
	$card=$_POST['card'];
  $query_0=mysqli_query($conn,"select client.card_no from client where client.username='$login_session'");
  $queryftch_0=mysqli_fetch_assoc($query_0);

  $cvv=$_POST['cvv'];
  $exp=$_POST['exp'];

  $query_1=mysqli_query($conn,"select cardinfo.cvv, cardinfo.exp from cardinfo where cardinfo.card_no=(select client.card_no from client where client.username='$login_session')");
  $queryftch=mysqli_fetch_assoc($query_1);

	if( $card==$queryftch_0['card_no'] AND $cvv==$queryftch['cvv'] AND $exp==$queryftch['exp'])
	{


    $xyz=date("Y-m-d h:i:s");
    $final_query=mysqli_query($conn,"insert into transactions(id,transaction_date,amount) values('$booking_transaction', '$xyz' ,'$total_amount')");


    $final = "insert into booking ( id, client_id, hotel_id, package_id, transport_id, transaction_id, transport_type, num_person, travel_date)
    values ('$finding_count_final','$booking_clientid', '$booking_hotel', '$booking_pakage', '$booking_transport', '$booking_transaction', '$booking_transport_type', '$booking_num_parson', '$booking_date')";

    $is_inserted = mysqli_query($conn,$final);

    if($is_inserted)
    {
      echo "Payment Successful! Just show your transaction id while travelling. Have a nice journey!";
    }

		exit;
	}
  else echo "failed!";
}
 ?>

<!DOCTYPE html>
<html>
  <head>

    <title>Payment</title>
  </head>
  <div class="wrapper" style="margin: 5vh 25vh;min-height: 90vh">

    <div class="feature-display">

      <div class="register-text">
        <div><h4>Payment</h4><hr></div>
        <div>
          <form style="width: 45vh" action="" method="POST">

            <div class="register-form"><label>Amount(30% of the total amount)</label><input type="text" name="amount" readonly value="<?php echo $total_amount ?>"></div>
            <div class="register-form"><label>Card No</label><input type="text" name="card" Placeholder="Enter credit card number"></div>
            <div class="register-form"><label>CVV</label><input type="text" id="scr" name="cvv" Placeholder="Enter CVV"></div>
            <div class="register-form"><label>Expiration Date</label><input type="text" id="usr" name="exp" Placeholder="Enter expiration date"></div>
            <div class="register-form"><label>Transaction ID</label><input readonly type="text" id="usr" name="tranid" value="<?php echo $booking_transaction ?>"></div>

            <div style="display: flex; align-items: center; justify-content: flex-end; padding: 30px;">
              <div class="register-form">
                <label for=""></label>
                <input type="submit" id="submit" name="submit" value="Pay" href="#">
              </div>

            </div>
          </form>
        </div>
  </div>
  </div>
  </div>

  </body>
  <div><?php include 'footer.php'; ?></div>
</html>
