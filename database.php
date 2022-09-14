<?php
$host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = raisakfi_employee";
   $credentials = "user = raisakfi_rkemployee password=JotainUutta22";
   $db = pg_connect( "$host $port $dbname $credentials")
       or die("Could not connect");
    echo "Connected successfully";
?>