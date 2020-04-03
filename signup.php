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
      $errors['username'] =  'Test Number is required';
    }
    else{
      
      $username = $_POST['username'];
    }

    if (empty($_POST['pass'])) {
      $errors['pass'] = 'Subject is required';
    }
    else{
      $pass = $_POST['pass'];
    }

    if (empty($_POST['card_no'])) {
      $errors['card_no'] = 'Class is required';
    }
    else{
      $card_no = $_POST['card_no'];
    }

    if (empty($_POST['email'])) {
      $errors['email'] = 'Score is required';
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
          window.location.href = 'login.php';
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
  <title></title>
</head>
<body>
<form class="white" action="signup.php" method="POST">
<table>
  <tr>
    <td><label for="usr">Full Name</label></td>
    <td><input type="text" id="usr" name="fullname"></td>
  </tr>
  <tr>
    <td><label for="subj">Username</label></td>
    <td><input type="text" name="username"></td>
  </tr>
  <tr>
    <td><label for="clas">Password</label></td>
    <td><input type="password" name="pass"></td>
  </tr>
  <tr>
    <td><label for="tst">Email</label></td>
    <td><input type="Email" name="email"></td>
  </tr>
  <tr>
    <td><label for="scr">Credit Card Number</label></td>
    <td><input type="number" id="scr" name="card_no"></td>
  </tr>
  <tr>
    <td></td>
    <td style="text-align: right;"><input type="submit" id="submit" name="submit" value="submit" href="#"></td>
  </tr>
</table>
    



    </form>
</body>
</html>