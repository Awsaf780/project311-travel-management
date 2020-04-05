<?php
  include 'config.php';

  $search_package = "*";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_package = mysqli_real_escape_string($conn,$_POST['search_text']);

    // $package_query = 'SELECT * FROM package WHERE name like "%'.$search_package.'%"';
    $package_query = 'SELECT * FROM package WHERE name LIKE "%'.$search_package.
    '%" OR (attractions LIKE "%'. $search_package .
    '%") OR (destination LIKE "%'. $search_package .'%")';
    $package_result = mysqli_query($conn, $package_query);
  }
  else {
    $package_query = 'SELECT * FROM package';
    $package_result = mysqli_query($conn, $package_query);
  }


 ?>
<html>

   <head>
      <title>Home</title>
   </head>

   <body>

     <div class="header">
       <?php include 'header.php'; ?>
     </div>

     <div class="wrapper" style="min-height: 90vh">

       <div>
         <h4 class="subtitle">Tour Packages [ <?php
                   if ($search_package == "*" || $search_package == "") {
                     echo "All ]";
                   }else {
                     echo $search_package . ' ]';
                   }
                 ?></h4><hr class="divider">
       </div>

       <form class="topnav" action="" method="post">

         <div class="search-box">
           <input type="text" placeholder="Search.." name="search_text">
           <!-- <button type="submit" name="submit"></button> -->
           <button type="submit" style="border: 0; background: transparent; cursor: pointer">
             <img src="images/search.svg" width="20px" height="20px" alt="submit" />
           </button>
         </div>

       </form>

       <div class="feature-package">
         <?php
         if (mysqli_num_rows($package_result) > 0 ) {
           while ($row1 = mysqli_fetch_assoc($package_result)) {
             echo '<div class="card">
                  <a href="" style="text-decoration: none">
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
         else {
           echo '<h4>No Results Found</h4>';
         }

        ?>
       </div>
     </div>


      <div>
        <?php include 'footer.php'; ?>
      </div>

   </body>

</html>
