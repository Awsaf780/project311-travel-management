<?php

  include("header.php");

  $your_value = "1234567890";
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
      <h1 style="color: grey"><?php echo $ebc ?></h1>

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
    <h3>Add Booking History here .. Maybe using tables</h3>
  </div>

  <div class="feature-booking">
    <h3>Add Transaction History maybe?</h3>
  </div>



</div>
  <div>
    <?php include 'footer.php'; ?>
  </div>

</body>

</html>
