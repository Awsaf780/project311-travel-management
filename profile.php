<?php
  include("config.php");

  $your_value = "Add from database";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
</head>
<body>
  <div>
    <?php include 'header.php'; ?>
  </div>

<div class="wrapper" style="margin: 5vh 25vh;">

  <div class="feature-display">

    <div class="display-pic">
      <img style="max-height: 20vh" src='<?php echo $profile_pic; ?>' >
      <h1 style="color: grey">FULL NAME</h1>

    </div>  

    <div class="register-text">
      <div><h4>About</h4><hr></div>
      <div>
      <form style="width: 45vh">

        <div class="register-form"><label>Username</label><?php echo '<input type="text" name="username" readonly value="'.$your_value.'">'; ?></div>
        <div class="register-form"><label>Email</label><?php echo '<input type="text" name="username" readonly value="'.$your_value.'">'; ?></div>
        <div class="register-form"><label>Phone Number</label><?php echo '<input type="text" name="username" readonly value="'.$your_value.'">'; ?></div>
        <div class="register-form"><label>Credit Card</label><?php echo '<input type="text" name="username" readonly value="'.$your_value.'">'; ?></div>

        <div style="display: flex; align-items: center; justify-content: flex-end; padding: 30px;">
          <button style="padding: 5px; cursor: pointer;"><a href=<?php echo "settings.php?username=" . $login_session; ?>>Edit Info</a></button>
          <button style="padding: 5px; cursor: pointer;">Delete Profile</button>
        </div>

      </form>
    </div>
    </div>

  </div>
</div>
  <div>
    <?php include 'footer.php'; ?>
  </div>
  
</body>

</html>