<?php
include("config.php");
include 'header.php';

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



<!DOCTYPE html>
<html>
<head>
  <title>Settings</title>
</head>
<div class="wrapper" style="margin: 5vh 25vh;min-height: 90vh">

  <div class="feature-display">

    <div class="register-text">
      <div><h4>About</h4><hr></div>
      <div>
        <form style="width: 45vh">

          <div class="register-form"><label>Username</label><input type="text" name="username" value="Get From Database"></div>
          <div class="register-form"><label>Email</label><input type="email" name="email" value="Get From Database"></div>
          <div class="register-form"><label>Phone Number</label><input type="phone" name="phone" value="Get From Database"></div>
          <div class="register-form"><label>Credit Card</label><input type="text" name="card_no" value="Get From Database"></div>
          <div style="display: flex; align-items: center; justify-content: flex-end; padding: 30px;">
            <button style="padding: 5px; cursor: pointer;" type="submit">Save</button>
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
      <span style="font-size: 0.6em">( Choose Picture from images/avatar/ )</span>
    </div>  

  </div>

  <div>
    <a href="">Delete Account</a>
  </div>

</div>

</body>
<div><?php include 'footer.php'; ?></div>
</html>