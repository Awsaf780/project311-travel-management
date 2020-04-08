<?php
	include_once 'insert.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>insert </title>
  </head>
  <body>
    <form  action="insert.php" method="post">

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
		<input type="text" name="User_ID" placeholder="User_ID" required><br>
		<input type="text" name="transaction_id" placeholder="transaction_id" required><br>
		<input type="text" name="transport_type" placeholder="transport_type" ><br>
		<input type="text" name="num_person" placeholder="total person" required><br>
		<input type="date" name="travel_date" placeholder="travel_date" required><br>
		<input type="submit" name="insert" value="Insert">
    </form>
    <div>
      <?php include 'footer.php'; ?>
    </div>
  </body>
</html>
