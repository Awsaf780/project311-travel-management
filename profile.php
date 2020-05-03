<?php

  include("header.php");


$rj=mysqli_query($conn, "select * from client where client.username= '$login_session' ");
$abc = mysqli_fetch_assoc($rj);
$bbc =  $abc['email'];
$cbc= $abc['phone'];
$dbc = $abc['card_no'];
$ebc=$abc['fullname'];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
</head>
<body>
  <div>

  </div>

<div class="wrapper" style="margin: 5vh 25vh; min-height: 90vh">

  <div class="feature-display">

    <div class="display-pic">
      <img style="max-height: 20vh" src='<?php echo $profile_pic; ?>' >
      <h1 style="color: black"><?php echo $ebc ?></h1>

    </div>

    <div class="register-text">
      <div><h4>User Information</h4><hr></div>
      <div>
      <form style="width: 45vh;">

        <div class="register-form"><label>Username</label><?php echo '<input type="text" name="username" readonly value="'.$login_session.'">'; ?></div>
        <div class="register-form"><label>Email</label><?php echo '<input type="text" name="username" readonly value="'.$bbc.'">'; ?></div>
        <div class="register-form"><label>Phone Number</label><?php echo '<input type="text" name="username" readonly value="'.$cbc.'">'; ?></div>
        <div class="register-form"><label>Credit Card</label><?php echo '<input type="text" name="username" readonly value="'.$dbc.'">'; ?></div>
      </form>
        <div style="display: flex; align-items: center; justify-content: flex-end; padding: 30px;">
          <button style=" cursor: pointer;"><a href=<?php echo "settings.php?username=" . $login_session; ?>>Edit Info</a></button>
        </div>


    </div>
    </div>

  </div>

  <div class="feature-booking">

    <?php
    $serial=1;
$booking_result=mysqli_query($conn, "SELECT package.name AS Package,hotel.name AS Hotel,transport.name AS Transport,package.cost AS Amount,booking.travel_date

FROM booking LEFT OUTER JOIN (hotel,package,transport)

ON booking.hotel_id= hotel.id  AND booking.package_id=package.id AND booking.transport_id=transport.id

WHERE booking.client_id=(SELECT client.id

FROM client

WHERE username= '$login_session')" );


      ?>
  </div>
  <!DOCTYPE html>
  <html>
  <head>

  </head>
  <body>

  <div>

  </div>



  	<div class="view-box">

  		<div class="package-text">
  			<h1 style="color: black"><?php echo 'Booking History';?></h1>
        <table>
  				<tr>
            <th>Serial</th>
  					<th>Package</th>
            <th>Hotel</th>
            <th>Transport</th>
            <th>Package Cost</th>
            <th>Travel Date</th>

  				</tr>
<?php
if(mysqli_num_rows($booking_result) > 0)

{while ($gogo=mysqli_fetch_assoc($booking_result))
  { echo " <tr>
    <td>".$serial++."</td>
    <td>".$gogo['Package']."</td>
    <td>".$gogo['Hotel']."</td>
    <td>".$gogo['Transport']."</td>
    <td>".$gogo['Amount']."</td>
    <td>".$gogo['travel_date']."</td>
    </tr> <br> ";}}
?>

  			</table>
  		</div>
    </body>
  </html>
  <div class="feature-booking">
    <h3>Transaction History</h3>
  </div>



</div>
  <div>
    <?php include 'footer.php'; ?>
  </div>

</body>

</html>
