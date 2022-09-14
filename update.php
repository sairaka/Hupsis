			
<?php
include_once 'database.php';
$result = pg_query($db,"SELECT * FROM employee");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update employee data</title>
</head>
<body>
<table>
<tr>
	<td>Employee Id</td>
	<td>First Name</td>
	<td>Last Name</td>
	<td>City</td>
	<td>Email id</td>
	<td>Action</td>
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
	<td><a href="update-process.php?userid=<?php echo $row["userid"]; ?>">Update</a></td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>	