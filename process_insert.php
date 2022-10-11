<?php


$starts = date('Y-m-d H:i:s', strtotime($starts));
$ends = date('Y-m-d H:i:s', strtotime($ends));
$eventname = isset($_POST['eventname'])?$_POST['eventname']:'';
$street = isset($_POST['street'])?$_POST['street']:'';
$city = isset($_POST['city'])?$_POST['city']:'';
$starts = isset($_POST['starts'])?$_POST['starts']:'';
$ends = isset($_POST['ends'])?$_POST['ends']:'';
$nature = isset($_POST['nature'])?$_POST['nature']:'';
$position = isset($_POST['position'])?$_POST['position']:'';
$otherproviders = isset($_POST['otherproviders'])?$_POST['otherproviders']:'';
$amount_customers = empty($_POST['amount_customers']) ? '0' : $_POST['amount_customers'];
$profile = isset($_POST['profile'])?$_POST['profile']:'';
$age_customers = isset($_POST['age_customers'])?$_POST['age_customers']:'';
$anythingelse = trim(isset($_POST['anythingelse'])?$_POST['anythingelse']:'');


ini_set("display_errors", 1);
error_reporting(E_ALL);
include_once 'database.php';
if (!empty($eventname) and ($starts <= $ends)) { 
    $query = "WITH ins1 AS (INSERT INTO eventinformation(id, eventname, street, city, nature, position, otherproviders, starts, ends, anythingelse) VALUES 
    (nextval('eventinformation_id_seq'), '$eventname', '$street', '$city','$nature', '$position', '$otherproviders', '$starts', '$ends', '$anythingelse') RETURNING
        id_participants) INSERT INTO customers(id, amount_customers, profile, age_customers) SELECT id_participants, '$amount_customers', '$profile', '$age_customers' FROM ins1";
    
    $result = pg_query($query);
    
    if ($result){
        $message = "Information has been saved";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo '<script>window.location.replace("https://www.raisak.fi/hupsis.html");</script>'; 
        
    }
        else {
          $message1 = "Something went wrong";  
          echo "<script type='text/javascript'>alert('$message1');</script>";}
}

else {
          $message1 = "Something went wrong";  
          echo "<script type='text/javascript'>alert('$message1');</script>";}
          echo '<script>window.location.replace("https://www.raisak.fi/event_insert.php");</script>';

?>