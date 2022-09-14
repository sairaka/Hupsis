<?php
include_once 'database.php';
$result = pg_query($db,"SELECT * FROM employee_table");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete employee data</title>
</head>
<body>
<table>
	<tr>
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
		<td><?php echo $row["first_name"]; ?></td>
		<td><?php echo $row["last_name"]; ?></td>
		<td><?php echo $row["city_name"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
		<td><a href="delete_process.php?userid=<?php echo $row["userid"]; ?>">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
</body>
</html>	