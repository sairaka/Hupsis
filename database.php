<?php
$host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = dbname";
   $credentials = "user = username password=1234";
   $db = pg_connect( "$host $port $dbname $credentials")
       or die("Could not connect");
    ;
?>


