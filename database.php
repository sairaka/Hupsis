<?php
$host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = raisakfi_harjoitustyoOpiframe";
   $credentials = "user = raisakfi_admin password=zauEsMIXiQw68AMSi5";
   $db = pg_connect( "$host $port $dbname $credentials")
       or die("Could not connect");
    ;
?>


