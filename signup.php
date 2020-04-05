<?php
  include 'config.php';

  $fullname = $username = $pass = $card_no = $email = '';
  $errors = array('fullname'=>'', 'username'=>'','pass'=>'', 'card_no'=>'', 'email'=>'');

  if (isset($_POST['submit'])) {

    if (empty($_POST['fullname'])) {
      $errors['fullname'] =  'Name is required';
    }
    else{

      $fullname = $_POST['fullname'];
    }

    if (empty($_POST['username'])) {
      $errors['username'] =  'Username is required';
    }
    else{

      $username = $_POST['username'];
    }

    if (empty($_POST['pass'])) {
      $errors['pass'] = 'Password is required';
    }
    else{
      $pass = $_POST['pass'];
    }

    if (empty($_POST['card_no'])) {
      $errors['card_no'] = '16 Digit Card Number is required';
    }
    else{
      $card_no = $_POST['card_no'];
    }

    if (empty($_POST['email'])) {
      $errors['email'] = 'Email is required';
    }
    else{
      $email = $_POST['email'];
    }

    if (array_filter($errors)) {

      }
      else{
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $card_no = mysqli_real_escape_string($conn, $_POST['card_no']);

        $add_login = "INSERT INTO login (username, pass) VALUES ('$username', '$pass')";

        $sql = "INSERT INTO client (fullname, email, username, card_no) VALUES ('$fullname','$email','$username', '$card_no')";

        $result2 = mysqli_query($conn, $sql);
        $result1 = mysqli_query($conn, $add_login);

        if ($result2 && $result1) {
          echo "<script>
          alert('Inserted Successfully');
          window.location.href = 'index.php';
          </script>";
          exit;
        }
        else {
          echo "Username Exists";
        }

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
              <input type="text" id="usr" name="fullname" required placeholder="John Doe">
            </div>
            <div class="register-form">
              <label for="subj">Username</label>
              <input type="text" name="username" required placeholder="John360">
            </div>
            <div class="register-form">
              <label for="clas">Password</label>
              <input type="password" name="pass" required placeholder="********">
            </div>
            <div class="register-form">
              <label for="tst">Email</label>
              <input type="Email" name="email" required placeholder="example@email.com">
            </div>
            <div class="register-form">
              <label for="scr">Credit Card No</label>
              <input type="number" id="scr" name="card_no" required placeholder="1111222233334444">
            </div>
            <div class="register-form">
              <label for=""></label>
              <input type="submit" id="submit" name="submit" value="REGISTER" href="#">
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
