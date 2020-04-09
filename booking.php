<?php

	include 'header.php';

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
    <form  action="insert.php" method="post">


 <label for="hotel_id"><b>hotel number?</b></label>
		<select input type="text"  name="hotel_id" required>

			<option value="HTL001" >HTL001</option>
			<option value="HTL002" >HTL002</option>
			<option value="HTL003" >HTL003</option>
			<option value="HTL004" >HTL004</option>
			<option value="HTL005" >HTL005</option>
			<option value="HTL006" >HTL006</option>
			<option value="HTL007" >HTL007</option>
		</select>
		<br>
    <label for="package_id"><b>package</b></label>
		<select input type="text"  name="package_id" required>
			<option value="PKG001" >PKG001</option>
			<option value="PKG002" >PKG002</option>
			<option value="PKG003" >PKG003</option>
			<option value="PKG004" >PKG004</option>
			<option value="PKG005" >PKG005</option>
			<option value="PKG006" >PKG006</option>
			<option value="PKG007" >PKG007</option>
			<option value="PKG008" >PKG008</option>
			<option value="PKG009" >PKG009</option>

		</select>
		<br>
    <label for="transport_id"><b>which transport do you prefer?</b></label>
		<select input type="text"  name="transport_id" required>
			<option value="AIR001" >AIR001</option>
			<option value="AIR002" >AIR002</option>
			<option value="AIR003" >AIR003</option>
			<option value="AIR004" >AIR004</option>
			<option value="AIR005" >AIR005</option>
			<option value="BUS001" >BUS001</option>
			<option value="BUS002" >BUS002</option>
			<option value="BUS003" >BUS003</option>
			<option value="BUS004" >BUS004</option>
			<option value="BUS005" >BUS005</option>
			<option value="BUS006" >BUS006</option>
			<option value="BUS007" >BUS007</option>
			<option value="WTR001" >WTR001</option>
			<option value="WTR002" >WTR002</option>
			<option value="WTR003" >WTR003</option>


		</select>
    <br>
    <label for="transaction_id"><b>transaction</b></label>
    <select input type="text"  name="transaction_id" required>
      <option value="f9b42d6" >f9b42d6</option>
      <option value="jh4y28d" >jh4y28d</option>
      <option value="wr43hgt" >wr43hgt</option>
      	</select>


      <label for="transport_type"><b>choose transport type</b></label>
      <select input type="text"  name="transport_type" required>
        <option value="Air" >Air</option>
        <option value="Water" >Water</option>
        <option value="Bus" >Bus</option>
        	</select>


		<input type="text" name="num_person" placeholder="total person" required><br>
		<input type="date" name="travel_date" placeholder="travel_date" required><br>
		<input type="submit" name="insert" value="submit">
	
    </form>
    <div>
      <?php include 'footer.php'; ?>
    </div>
  </body>
</html>
