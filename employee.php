<!DOCTYPE html>
<html>
  <body>
	<form method="post" action="employee.php">
		Number:<br>
		<input type="numeric" name="userid" id="userid">
		<br>
		First name:<br>
		<input type="text" name="first_name" id="first_name">
		<br>
		Last name:<br>
		<input type="text" name="last_name" id="last_name">
		<br>
		City name:<br>
		<input type="text" name="city_name" id="city_name">
		<br>
		Email Id:<br>
		<input type="email" name="email" id="email">
		<br><br>
		<li><input type="submit" /></li>
	</form>
  </body>
</html>

<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
include_once 'database.php';
$query = "INSERT INTO employee_table(first_name, last_name, city_name, email, userid) VALUES ('$_POST[first_name]', '$_POST[last_name]','$_POST[city_name]','$_POST[email]','$_POST[userid]')"; 
$result = pg_query($query);
pg_close($dbconn)
?>

