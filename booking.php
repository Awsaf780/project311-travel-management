<?php

 include 'header.php';
 include_once ('config.php');
 $packid=$_GET['id'];
 $qur="SELECT id,name FROM hotel WHERE hotel.address = (SELECT destination FROM package WHERE package.id like '$packid');";
 $relt = mysqli_query($conn,$qur);
 $qur1= "(SELECT id,route FROM transport WHERE locate((SELECT package.destination FROM package WHERE package.id ='$packid'),route));";
$transaction_id=substr(md5(rand()),0,7);
 $sql1=mysqli_query($conn,$qur1);


?>
<!DOCTYPE html>
<html>
<style>

input[type=text], select {
width: 100%;
padding: 12px 20px;
margin: 8px 0;
display: block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
}

input[type=submit] {
width: 100%;
background-color: #4CAF50;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;
cursor: pointer;
}

input[type=submit]:hover {
background-color: #45a049;
}

div.container {
border-radius: 5px;
background-color: #f2f2f2;
padding: 20px;
}
</style>

 </head>
 <body>
	  <form  action="insert.php?package_id='',hotel_id='',transport_id='',transaction_id='',travel_date=''" method="GET">

			 <label for="package_id"><b>Your Package ID</b></label>
			 <select input type="text"  name="package_id" required>
				 <option value="<?php echo $packid; ?>" ><?php echo $packid; ?></option>

			 </select>


	 <label for="hotel_id"><b>Choose Hotel</b></label>
	 <select input type="text"  name="hotel_id" required>

		 <?php
			 while($row=mysqli_fetch_assoc($relt))
			 {
		 ?>
			 <option value="<?php echo $row['id']; ?>" ><?php echo $row['name']; ?></option>
		 <?php
			 }
		 ?>
	 </select>
	 <br>


	 <br>

	 <label for="transport_id"><b>Choose Transport</b></label>
	 <select input type="text"  name="transport_id" required>
		 <?php
			 while($row1=mysqli_fetch_assoc($sql1))
			 {
		 ?>
			 <option value="<?php echo $row1['id']; ?>" ><?php echo $row1['id'];echo "  ";echo $row1['route']; ?></option>
		 <?php
			 }
		 ?>


	 </select>
	 <br>
 <label for="Transaction Id"><b>transaction_id</b></label>
	 <input type="$transaction_id" name="transaction_id" value="<?php echo $transaction_id ?>" readonly ><br><br>


 <label for="transport_type"><b>Transport Type</b></label>
		 <select input type="text"  name="transport_type" required>
		 <option value="Air" >Air</option>
		 <option value="Water" >Water</option>
		 <option value="Bus" >Bus</option>
		 </select>


 <label for="num_person"><b>Number Of People</b></label>
 <input type="text" name="num_person" placeholder="total_person" required><br>
 <label for="travel_date"><b>travel_date</b></label><br>
 <input type="date" name="travel_date" placeholder="travel_date" required><br>
 <input type="submit" name="insert" value="submit">

	 </form>
	 <div>
		 <?php include 'footer.php'; ?>
	 </div>
 </body>
</html>
