<?php
	include_once 'database.php';
	$query = "DELETE FROM employee_table WHERE userid='" . $_GET["userid"] . "'";
	if($result = pg_query($query)){
		echo "Data Deleted Successfully.";
	}
	else{
		echo "Error.";
	}
?>