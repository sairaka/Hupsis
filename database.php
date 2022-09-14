<?php
$host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = database";
   $credentials = "user = username password=userpassword";
   $db = pg_connect( "$host $port $dbname $credentials")
       or die("Could not connect");
    echo "Connected successfully";
?>
