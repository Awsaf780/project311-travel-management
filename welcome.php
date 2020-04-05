<?php
  include 'config.php';
  $package_query = "SELECT * FROM package";
  $package_result = mysqli_query($conn, $package_query);

 ?>
<html>

   <head>
      <title>Home</title>
   </head>

   <body>

     <div class="header">
       <?php include 'header.php'; ?>
     </div>

     <div class="wrapper">

       <div>
         <h4 class="subtitle">All Tour Packages</h4><hr class="divider">
       </div>

       <div class="feature-package">
         <?php
         if (mysqli_num_rows($package_result) > 0 ) {
           while ($row1 = mysqli_fetch_assoc($package_result)) {
             echo '<div class="card">
             <a style="text-decoration:none" href="">
                 <div class="card-image"><img src="images/package/'.$row1['imagename'].'.svg"></div>
                 <div class="container">
                   <h5><b>'.$row1['name'].'</b></h5>
                   <h6>'.$row1['duration'];

                   if ($row1['duration'] > 1) {
                     echo " Days";
                   }else {
                     echo " Day";
                   }

                   echo ' - BDT '.$row1['cost'].'</h6>
                 </div></a>
                 </div>';
           }
         }

        ?>
       </div>
     </div>


      <div>
        <?php include 'footer.php'; ?>
      </div>

   </body>

</html>
