<?php
include("config.php");
include ("header.php");


if(isset($_POST['but_upload'])){

  $name = $_FILES['file']['name'];
  $target_dir = "images/avatar/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","svg");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){

    // Convert to base64
    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    // Insert record
    $query = "UPDATE client SET image = '".$image."' WHERE username = '".$login_session."'";
    mysqli_query($conn,$query);

    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
    header("Location: settings.php");
  }

}
?>

<?php

// Editing and updating user info
$rj=mysqli_query($conn, "select * from client where client.username= '$login_session' ");
$abc = mysqli_fetch_assoc($rj);
$phn=$abc['phone'];
$mail=$abc['email'];
$dbc  = $abc['card_no'];
$ebc=$abc['fullname'];
$fbc=$abc['address'];
$tj=mysqli_query($conn, "select * from cardinfo where cardinfo.card_no= '$dbc' ");
$kbc = mysqli_fetch_assoc($tj);
$cv=$kbc['cvv'];
$doe=$kbc['exp'];
//deleting account
if (isset ($_POST['delete']))
{
 $delete="delete from cardinfo where card_no='$dbc'";
 $del_query=mysqli_query($conn,$delete);
 $delete_tran="delete from transactions where transactions.id=ANY(
 select transaction_id FROM booking WHERE booking.client_id=
 (select client.id from client where client.username='$login_session'))";
 $delete_tran_query=mysqli_query($conn,$delete_tran);
 $delete_client="delete from client where client.username='$login_session'";
 $delete_client_query=mysqli_query($conn,$delete_client);
 $delete_login="delete from login where login.username='$login_session'";
 $delete_login_query=mysqli_query($conn,$delete_login);



 if($del_query AND $delete_tran_query AND $delete_client_query AND $delete_login_query){
   header("Location: index.php");
 } else { header("Location: settings.php");}

}

?>
<?php
// Editing and updating user info
include 'config.php';
$email=$phone=$fullname=$address='';
if (isset($_POST['submit'])){
$email=$_POST['email'];
$phone=$_POST['phone'];
$fullname=$_POST['fullname'];
$address=$_POST['address'];
$email=mysqli_real_escape_string($conn,$_POST['email']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$update="UPDATE client SET email= '$email', phone='$phone',fullname='$fullname',address='$address' WHERE username='$login_session'";
$ans=mysqli_query($conn,$update);
if($ans)
{echo "<script> alert ('Updated Successfully');
  window.location.href = 'settings.php';
  </script>";

exit;}
}
//changing password
if (isset($_POST['save']))
{
  $getoldpass=mysqli_query($conn,"select pass from login where login.username='$login_session'");
  $getoldpass1=mysqli_fetch_assoc($getoldpass);

  if(($_POST['newpass']==$_POST['re_newpass']) AND ($_POST['currpass']==$getoldpass1['pass']) )
  {
    $newpassword=$_POST['newpass'];
    if(!empty($newpassword))
    {
      $updatepass=mysqli_query($conn,"update login set pass='$newpassword' where username='$login_session'");
      echo "Pasword Updated Successfully!";
      
    }
    else echo "failed! Try again!";
  }
  else
  {
    echo "failed! Try again!";

  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Settings</title>
</head>
<div class="wrapper" style="margin: 5vh 25vh;min-height: 90vh">

  <div class="feature-display">

    <div class="register-text">
      <div><h4>Edit user information</h4><hr></div>
      <div>
        <form style="width: 45vh" action="settings.php" method="POST">

          <div class="register-form"><label>Username</label><?php echo '<input type="text" name="username" readonly value="'.$login_session.'">'; ?></div>
          <div class="register-form"><label>Email</label><input type="Email" name="email" value="<?php echo $mail ?>"></div>
          <div class="register-form"><label>Phone Number</label><input type="text" id="scr" name="phone" value="<?php echo $phn ?>"></div>
          <div class="register-form"><label>Full Name</label><input type="text" id="usr" name="fullname" value="<?php echo $ebc ?>"></div>
          <div class="register-form"><label>Address</label><input type="text" id="usr" name="address" value="<?php echo $fbc ?>"></div>
          <div class="register-form"><label>Credit Card</label><?php echo '<input type="text" name="card" readonly value="'.$dbc.'">'; ?></div>
          <div class="register-form"><label>CVV</label><?php echo '<input type="text" name="date" readonly value="'.$cv.'">'; ?></div>
          <div class="register-form"><label>Expiration Date</label><?php echo '<input type="text" name="cardvalidation" readonly value="'.$doe.'">'; ?></div>
          <div style="display: flex; align-items: center; justify-content: flex-end; padding: 30px;">
            <div class="register-form">
              <label for=""></label>
              <input type="submit" id="submit" name="submit" value="Save" href="#">
            </div>

          </div>
        </form>
      </div>
      <div><h4>To change password:</h4><hr></div>
      <div>
      <form style="width: 45vh" action="settings.php" method="POST">
        <div class="register-form"><label>Enter current password</label><input type="password" id="scr" name="currpass" value=""></div>
        <div class="register-form"><label>Enter new password</label><input type="password" id="scr" name="newpass" value=""></div>
        <div class="register-form"><label>Re-enter new password</label><input type="password" id="scr" name="re_newpass" value=""></div>
        <div style="display: flex; align-items: center; justify-content: flex-end; padding: 30px;">
          <div class="register-form">
            <label for=""></label>
            <input type="submit" id="submit" name="save" value="Save" href="#">
          </div>

        </div>
      </form>
      </div>
    </div>

    <div class="display-pic">
      <img style="max-height: 20vh" src='<?php echo $profile_pic; ?>' >
      <form method="post" action="" enctype='multipart/form-data'>
        <div class="upload">
          <input style="padding: 5px; cursor: pointer;" type='file' name='file' />
          <input style="padding: 5px; cursor: pointer;" type='submit' value='Upload' name='but_upload'>
        </div>
      </form>

    </div>

  </div>

  <div>

<form style="width: 45vh" action="settings.php" method="POST">
     <div style="display: flex; align-items: center; justify-content: flex-end; padding: 30px;">
       <input type='submit' id = 'submit' name='delete' value='Delete Account' href='#'>
       </div>
     </form>

  </div>

</div>

</body>
<div><?php include 'footer.php'; ?></div>
</html>
