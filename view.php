<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
include_once 'database.php';
$result = pg_query($db,"SELECT * FROM employee_table");
?>

<!DOCTYPE html>
<html>
 <head>
 <title> Retrive data</title>
 </head>
<body>
<table>
	<tr>
	    <td>User ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>City</td>
		<td>Email id</td>
	</tr>
<?php
$i=0;
while($row=pg_fetch_assoc($result)) {
?>
	<tr>
	    <td><?php echo $row["userid"]; ?></td>
		<td><?php echo $row["first_name"]; ?></td>
		<td><?php echo $row["last_name"]; ?></td>
		<td><?php echo $row["city_name"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
	</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>