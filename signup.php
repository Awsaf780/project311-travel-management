<?php
  include 'config.php';

  $exist = "";

  if (isset($_POST['submit'])) {

    
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $card_no = mysqli_real_escape_string($conn, $_POST['card_no']);
    $cvv = mysqli_real_escape_string($conn, $_POST['cvv']);
    $exp = mysqli_real_escape_string($conn, $_POST['exp']);

    $add_login = "INSERT INTO login (username, pass) VALUES ('$username', '$pass')";

    $sql = "INSERT INTO client (fullname, email, username, card_no) VALUES ('$fullname','$email','$username', '$card_no')";

    $result2 = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $add_login);

    $credit_add = "INSERT INTO cardinfo (card_no, cvv, exp) VALUES ('$card_no', '$cvv', '$exp')";
    $result3 = mysqli_query($conn, $credit_add);

    if ($result2 && $result1 && $result3) {
      echo "<script>
      alert('Inserted Successfully');
      window.location.href = 'index.php';
      </script>";
      exit;
    }
    else {
      $exist = "This Username Already Exists";
    }

  }

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
</head>

<body>

  <div>
    <?php include 'header_before.php'; ?>
  </div>

  <div class="register">
    <div class="feature-register">

      <div class="register-img"><img src="images/register.svg"></div>

      <div class="register-text">
        <div><h1>Sign Up</h1></div>
        <div>
          <form style="width: 45vh" action="signup.php" method="POST">

            <div class="register-form">
              <label for="usr">Full Name</label>
              <input type="text" id="usr" pattern="\w+\s\w+" title="First and Last Name" name="fullname" required placeholder="John Doe">
            </div>
            <div class="register-form">
              <label for="subj">Username</label>
              <input type="text" name="username" required placeholder="John360">
            </div>
            <div class="register-form">
              <label for="clas">Password</label>
              <input type="password" name="pass" pattern="\w{6,}" title="Atleast 6 characters" required placeholder="********">
            </div>
            <div class="register-form">
              <label for="tst">Email</label>
              <input type="Email" name="email" required placeholder="example@email.com">
            </div>
            <div class="register-form">
              <label for="scr">Credit Card No</label>
              <input type="text" id="scr" pattern="[0-9]{16}" title="Must be 16 Digits" name="card_no" required placeholder="1111222233334444">
            </div>
            <div class="register-form">
              <label for="cvv">Credit Card CVV</label>
              <input type="text" id="cvv" pattern="[0-9]{3}" title="Must be 3 Digits" name="cvv" required placeholder="360">
            </div>
            <div class="register-form">
              <label for="exp">Credit Card EXP</label>
              <input type="text" id="exp" pattern="[01][0-9]\/20[2-9][0-9]" title="Must be in mm/yyyy format" name="exp" required placeholder="07/2020">
            </div>

            <div class="register-form">
              <label for=""></label>
              <input type="submit" id="submit" name="submit" value="REGISTER" href="#">
            </div>
            <div>
              <h6 style="color: white"><?php echo $exist; ?></h6>
            </div>
          </form>
        </div>

        <div style="color: white">
          <h5>Already have an account? <a style="color: white; text-decoration: none" href="index.php"><i>Sign In</i></a></h5>
        </div>

      </div>






    </div>
  </div>
  <div>
    <?php include 'footer.php'; ?>
  </div>
</body>
</html>
