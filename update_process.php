<?php
include_once 'database.php';
if(count($_POST)>0) {
	
	$query = "UPDATE employee_table SET userid='" . $_POST['userid'] . "', first_name='" . $_POST['first_name'] . "', last_name='" . $_POST['last_name'] . "', city_name='" . $_POST['city_name'] . "' ,email='" . $_POST['email'] . "' WHERE userid='" . $_POST['userid'] . "'";
	if($result = pg_query($query)){
		echo "Record Updated Successfully.";
	}
	else{
		echo "Error.";
	}
	
}

$result = pg_query($db,"SELECT * FROM employee_table WHERE userid='" . $_GET['userid'] . "'"); 
$row= pg_fetch_assoc($result);
?>
<html>
<head>
	<title>Update Employee Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="viewupdate.php">Employee List</a>
</div>
	UserID: <br>
	<input type="hidden" name='userid' class="txtField" value="<?php echo $row["userid"]; ?>">
	<input type="text" name="userid"  value="<?php echo $row["userid"]; ?>">
	<br>
	First Name: <br>
	<input type="text" name="first_name"  value="<?php echo $row['first_name']; ?>">
	<br>
	Last Name :<br>
	<input type="text" name="last_name"  value="<?php echo $row['last_name']; ?>">
	<br>
	City:<br>
	<input type="text" name="city_name" value="<?php echo $row['city_name']; ?>">
	<br>
	Email:<br>
	<input type="text" name="email" value="<?php echo $row['email']; ?>">
	<br>
	<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>