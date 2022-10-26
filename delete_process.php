<?php
	include_once 'database.php';
	$query = "DELETE FROM eventinformation WHERE id='" . $_GET["id"] . "'";
	if($result = pg_query($query)){
	    $message = "Information has been deleted";
		echo "<script type='text/javascript'>alert('$message');</script>";
	    echo '<script>window.location.replace("https://www.raisak.fi/eventslist.php");</script>'; 
	}
	else{
		$message1 = "Something went wrong";  
          echo "<script type='text/javascript'>alert('$message1');</script>";
	    
	}
?>


