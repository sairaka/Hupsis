<?php
include_once 'database.php';
if(count($_POST)>0) {
	
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
    $anythingelse = trim(isset($_POST['anythingelse'])?$_POST['anythingelse']:'');$starts = date('Y-m-d H:i', strtotime($starts));
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
    $coffee_tea = empty($_POST['coffee_tea']) ? '0' : $_POST['coffee_tea'];
    $warmfood = empty($_POST['warmfood']) ? '0' : $_POST['warmfood'];
    $sweetbite = empty($_POST['sweetbite']) ? '0' : $_POST['sweetbite'];
    $saltybite = empty($_POST['saltybite']) ? '0' : $_POST['saltybite'];

	
	$query = "WITH ins1 AS (UPDATE eventinformation AS e SET starts='$starts', ends='$ends', eventname='$eventname', street='$street' ,postalcode='$postalcode',city='$city',anythingelse='$anythingelse', nature='$nature', position='$position', otherproviders='$otherproviders' WHERE e.id='" . $_GET['id'] . "' RETURNING
    id_participants, id_servings),   
    ins2 AS (UPDATE event_servings AS es SET coffee_tea='$coffee_tea', warmfood ='$warmfood', sweetbite ='$sweetbite', saltybite ='$saltybite' FROM ins1 WHERE id_servings=es.id_serving)
    UPDATE customers AS c SET amount_customers='$amount_customers', profile='$profile', age_customers='$age_customers'  FROM ins1 WHERE id_participants=c.id";
       
    
	if($result = pg_query($query)){
		$message = "Information has been saved";
        echo "<script type='text/javascript'>alert('$message');</script>";
	    echo '<script>window.location.replace("https://www.raisak.fi/eventslist.php");</script>'; 
	}
        else {
          $message1 = "Something went wrong";  
          echo "<script type='text/javascript'>alert('$message1');</script>";}
    
	
	
}



$result = pg_query($db,"SELECT * FROM eventinformation e JOIN customers c ON e.id_participants=c.id JOIN event_servings es ON e.id_servings=es.id_serving WHERE e.id='" . $_GET['id'] . "'"); 
$row= pg_fetch_assoc($result);



?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/vendorstapahtuma/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="/vendorstapahtuma/css/grid.css">
        <link rel="stylesheet" type="text/css" href="/vendorstapahtuma/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="/resourcestapahtuma/css/style.css">  
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
        
        <title>Event update</title> 
        <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous">
        </script>
    </head>

    <body>
        <header>
            <div class="container">
                <nav>
                    <div class="row main-menu">
                        <a href="https://www.raisak.fi/"><img src="/resourcesvolunteer/img/RaisaK.png" alt="Logo" class="logo"></a>
                        <a href="https://www.raisak.fi/"><img src="/resourcesvolunteer/img/RaisaK.png" alt="Logo Small" class="logo-small"></a>
                        <ul class="main-nav js--main-nav">
                            <li><a href="https://www.raisak.fi/index.php#studies">Studies</a></li>
                            <li><a href="https://www.raisak.fi/index.php#work-history">Work history</a></li>
                            <li><a href="https://www.raisak.fi/index.php#philosophy">Philosophy</a></li>
                            <li><a href="https://www.raisak.fi/index.php#portfolio">Portfolio</a></li>
                            <li><a href="https://www.raisak.fi/index.php#testimonials">Testimonials</a></li>
                            <li><a href="https://www.raisak.fi/index.php#contact-me">Contact</a></li>
                        </ul>
                         <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>
                    </div>
                </nav>
            </div>
            
            
            <div class="row">
                <div class="main-head">
                    <h1>Update event</h1>
                </div>  
            </div>
        </header>
        
        <section class="eventinfomation js--studies" id="myForm">
            <p3>
                <b>Update or add information of the event<br/> &nbsp;</b>
            </p3>
            <form name="frmUser" method="post" action="">
                <div><?php if(isset($message)) { echo $message; } ?>
                </div>
                <div class="row">
                    <div class="col span-1-of-2">
                        <label class="required">Name</label>
                        <br/> 
                        <input type="text" name="eventname" value="<?php echo $row['eventname']; ?>"/>
                        <br/>
                        <br/>
                        <label>Street address</label>
                        <br/>
                        <input type="text" name="street" value="<?php echo $row['street']; ?>"/>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col span-1-of-2 postalbox"> 
                                <label>Postal code</label>
                                <br/>
                                <input type="numeric" name="postalcode" value="<?php echo $row['postalcode']; ?>"/>
                            </div>
                            <div class="col span-1-of-2 citybox"> 
                                <label>City</label>
                                <br/>
                                <input type="text" name="city" value="<?php echo $row['city']; ?>"/>
                            </div>
                        </div>
                        <br/>
                        <br/>
                    </div>    
                    <div class="col span-1-of-2"> 
                        <label class="required">Event starts</label>
                        <br/>
                        <input type="datetime-local" name="starts" style="min-width:200px;" value="<?php echo $row["starts"]; ?>"/>
                        <br/>
                        <br/>
                        <label class="required">Event ends</label>
                        <br/>
                        <input type="datetime-local" name="ends" style="min-width:200px;" value="<?php echo $row['ends']; ?>"/>
                        <br/>
                        <br/>
                    </div>
                </div>
                <div style="padding-bottom:5px;">
                </div>
                 
                
                <br/>
                   <br/>
                <div class="row">  
                    <div class="col span-1-of-2">    
                        <label>Nature of the event</label>
                        <br/>
                        <select id="nature" name="nature">
                            <option value="" <?php if($row['nature']=="") echo 'selected="selected"'; ?> > -- select an option -- </option>
                            <option value="Presentation" <?php if($row['nature']=="Presentation") echo 'selected="selected"'; ?> >Presentation</option>
                            <option value="Demonstration" <?php if($row['nature']=="Demonstration") echo 'selected="selected"'; ?>>Demonstration</option>
                            <option value="Practice" <?php if($row['nature']=="Practice") echo 'selected="selected"'; ?>>Practice</option>                    
                        </select>
                        <br/>
                        <br/>
                        <label>Event location</label>
                        <br/>
                        <select id="position" name="position">
                            <option value="" <?php if($row['position']=="") echo 'selected="selected"'; ?> > -- select an option -- </option>
                            <option value="Outside" <?php if($row['position']=="Outside") echo 'selected="selected"'; ?> >Outside</option>
                            <option value="Interior, spacious" <?php if($row['position']=="Interior, spacious") echo 'selected="selected"'; ?> >Interior, spacious</option>
                            <option value="Interior, cramped" <?php if($row['position']=="Interior, cramped") echo 'selected="selected"'; ?> >Interior, cramped</option>                    
                        </select>
                        <br/>
                        <br/>
                    </div>
                    <div class="col span-1-of-2">
                        <label>Are there other food/coffee providers at the event?</label>
                        <br/>
                        <select id="otherproviders" name="otherproviders">
                            <option value="" <?php if($row['otherproviders']=="") echo 'selected="selected"'; ?> > -- select an option -- </option>
                            <option value="No other providers" <?php if($row['otherproviders']=="No other providers") echo 'selected="selected"'; ?> >No other providers</option>
                            <option value="Coffee" <?php if($row['otherproviders']=="Coffee") echo 'selected="selected"'; ?> >Yes, coffee</option>
                            <option value="Coffee and food" <?php if($row['otherproviders']=="Coffee and food") echo 'selected="selected"'; ?> >Yes, coffee and food</option>                         
                        </select>
                        <br/>
                        <br/>
                    </div>
                </div> 
                   
                   <hr class="new1">
                <br/>
                <br/>
                <p3>
                <b>
                    Tell us about the participants of the event <br/>&nbsp;
                </b>
                </p3>
                <div class="row">
                    <div class="col span-1-of-2">
                        <br/> 
                        <div class="row">
                            <div class="col span-1-of-2">
                                <label>Number of participants</label>
                                <br/>
                                <input type="text" name="amount_customers" value="<?php echo $row['amount_customers']; ?>">
                                <br/>
                                <br/>
                            </div>
                            <div class="col span-1-of-2">
                                <label>Age of the participants</label>
                                <br/>
                                <select id="age_customers" name="age_customers">
                                    <option value="" <?php if($row['age_customers']=="") echo 'selected="selected"'; ?> > - select an option - </option>
                                    <option value="0-16" <?php if($row['age_customers']=="0-16") echo 'selected="selected"'; ?> >0-16</option>
                                    <option value="17-29" <?php if($row['age_customers']=="17-29") echo 'selected="selected"'; ?> >17-29</option>
                                    <option value="30-65" <?php if($row['age_customers']=="30-65") echo 'selected="selected"'; ?> >30-65</option>
                                    <option value="66>" <?php if($row['age_customers']=="66>") echo 'selected="selected"'; ?> >66&ge;</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col span-1-of-2">
                        
                    </div>
                    <br/>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-2">
                            <label>Profile of participants</label>
                            <br/>
                            <select id="profile" name="profile">
                                <option value="" <?php if($row['profile']=="") echo 'selected="selected"'; ?> > - select an option - </option>
                                <option value="Members of the organization" <?php if($row['profile']=="Members of the organization") echo 'selected="selected"'; ?> >Members of the organization</option>
                                <option value="Outsiders of the organization" <?php if($row['profile']=="Outsiders of the organization") echo 'selected="selected"'; ?> >Outsiders of the organization</option>
                                <option value="Both members of the organization and outsiders" <?php if($row['profile']=="Both members of the organization and outsiders") echo 'selected="selected"'; ?> >Both members of the organization and outsiders</option>
                            </select>
                            <br/>
                        </div>
                        
                        <div class="col span-1-of-2">
                            
                        </div>
                    </div> 
                    
                    <br/>
                    <hr class="new1">
                    <br/>
                    <p3>
                        <b>Do you want to tell us something else about the event? <br/>&nbsp;</b>
                    </p3>
                    <br/>
                    <textarea name="anythingelse" ><?php echo $row['anythingelse'];?></textarea>
                    <br/>
                    <br/>
                    <br/>
                    <hr class="new1">
                    <br><br>
                    <p3>
                        <b>Report the servings in the event <br/>&nbsp;</b>
                    </p3>
                    <div class="row">
                        
                        <div class="col span-1-of-2">
                            <label>Coffee/Tea</label>
                                <br/>
                                <input type="text" name="coffee_tea" value="<?php echo $row['coffee_tea']; ?>">
                                <br/>
                            <label>Warm food</label>
                                <br/>
                                <input type="text" name="warmfood" value="<?php echo $row['warmfood']; ?>">
                                <br/>    
                        </div>
                        
                        <div class="col span-1-of-2">
                            <label>Sweet bite</label>
                                <br/>
                                <input type="text" name="sweetbite" value="<?php echo $row['sweetbite']; ?>">
                                <br/>
                            <label>Salty bite</label>
                                <br/>
                                <input type="text" name="saltybite" value="<?php echo $row['saltybite']; ?>">
                        </div>
                    </div>
                    <br><br>
                    <input type="submit" name="submit" value="Submit" class="button"> 
                    <a class="btn btn-full database-button" href="eventslist.php">Cancel</a>
                    
                    

            </form>
          
           
            
        </section>
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
        <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
        <script src="/vendorsvolunteer/js/jquery.waypoints.min.js"></script>
        <script src="/resourcesvolunteer/js/script.js"></script>
    </body>


</html>
  

