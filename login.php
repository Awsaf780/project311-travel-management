<?php
   include("config.php");
   session_start();
   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT id FROM login WHERE username = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      
      $count = mysqli_num_rows($result);
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>  
   </head>

      <form action = "" method = "post" autocomplete="autocomplete_off_hack_xfr4!k">
         <table>
            <tr>
               <td><label>UserName  :</label></td>
               <td><input required type = "text" name = "username"/></td>
            </tr>
            <tr>
               <td><label>Password  :</label></td>
               <td><input type = "password" name = "password" /></td>
            </tr>
            <tr>
               <td></td>
               <td><input type = "submit" value = " Submit "/> or <a href="signup.php">Sign Up</a></td>
            </tr>
         </table>
         
      </form>
      <?php echo $error; ?>

   </body>
</html>