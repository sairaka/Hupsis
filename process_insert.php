<?php
$eventname = $street = $city = $starts = $ends = $nature = $position = $otherproviders = $amount_customers = $profile = $age_customers = $anythingelse = $postalcode ="";
$nameErr = "";

$starts = date('Y-m-d H:i', strtotime($starts));
$ends = date('Y-m-d H:i', strtotime($ends));
$eventname = isset($_POST['eventname'])?$_POST['eventname']:'';
$street = isset($_POST['street'])?$_POST['street']:'';
$postalcode = empty($_POST['postalcode']) ? '00000' : $_POST['postalcode'];
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
if(!$eventname) {
        $errorMsg = "Please enter Event name";
        echo "<script type='text/javascript'>alert('$errorMsg');</script>";
        echo '<script>window.location.replace("javascript:history.back()");</script>'; 
    } elseif($starts > $ends) {
        $errorMsg = "Please check events dates";
        echo "<script type='text/javascript'>alert('$errorMsg');</script>";
        echo '<script>window.location.replace("javascript:history.back()");</script>';
    } else {
        $query = "WITH ins1 AS (INSERT INTO eventinformation(id, eventname, street, postalcode, city, nature, position, otherproviders, starts, ends, anythingelse) VALUES 
    (nextval('eventinformation_id_seq'), '$eventname', '$street','$postalcode','$city','$nature', '$position', '$otherproviders', '$starts', '$ends', '$anythingelse') RETURNING
    id_participants, id_servings, id_plan) 
,   ins2 AS (INSERT INTO event_servings (id_serving) SELECT ins1.id_servings FROM   ins1)
,   ins3 AS (INSERT INTO saved_plans (id_plans) SELECT ins1.id_plan FROM   ins1)
    INSERT INTO customers(id, amount_customers, profile, age_customers) SELECT id_participants, '$amount_customers', '$profile', '$age_customers' FROM ins1";
    
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



?>