
<html>

   <head>
      <title>Home</title>
   </head>

   <body>

     <div class="header">
       <?php include 'header.php'; ?>
     </div>

     <div class="wrapper">
        <h1>Welcome <?php echo $login_session; ?></h1>
        <h2><a href = "logout.php">Sign Out</a></h2>
     </div>

      <div>
        <?php include 'footer.php'; ?>
      </div>

   </body>

</html>
