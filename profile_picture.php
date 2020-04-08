<?php

  $dp = 'select image from client where username="'.$login_session.'"';
  $dp_result = mysqli_query($conn,$dp);
  $dp_row = mysqli_fetch_array($dp_result);

  $profile_pic = $dp_row['image'];

?>