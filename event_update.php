<?php
include_once 'database.php';
if(count($_POST)>0) {
	
	$query = "WITH ins1 AS (UPDATE eventinformation AS e SET starts='" . $_POST['starts'] . "', ends='" . $_POST['ends'] . "', eventname='" . $_POST['eventname'] . "', street='" . $_POST['street'] . "' ,city='" . $_POST['city'] . "',anythingelse='" . $_POST['anythingelse'] . "', nature='" . $_POST['nature'] . "', position='" . $_POST['position'] . "', otherproviders='" . $_POST['otherproviders'] . "' WHERE e.id='" . $_GET['id'] . "' RETURNING
        id_participants) UPDATE customers AS c SET amount_customers='" . $_POST['amount_customers'] . "', profile='" . $_POST['profile'] . "', age_customers='" . $_POST['age_customers'] . "'  FROM ins1";
	if($result = pg_query($query)){
		$message = "Information has been saved";
        echo "<script type='text/javascript'>alert('$message');</script>";
	    echo '<script>window.location.replace("https://www.raisak.fi/eventslist.php");</script>'; 
	}
        else {
          $message1 = "Something went wrong";  
          echo "<script type='text/javascript'>alert('$message1');</script>";}
    
	
	
}



$result = pg_query($db,"SELECT * FROM eventinformation e JOIN customers c ON e.id_participants=c.id WHERE e.id='" . $_GET['id'] . "'"); 
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
        
        <title>RaisaK Event update</title> 
        <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous">
        </script>
        <script>
            function SubForm (){
                $.ajax({
                    url:'https://api.apispreadsheets.com/data/jMGwn06FaKODhaKy/',
                    type:'post',
                    data:$("#myForm").serializeArray(),
                    success: function(){
                        alert("Form Data Submitted :)")
                    },
                    error: function(e){
                        alert("There was an error :(")
                    }
                });
            }
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
                    <h1>Adding an event to the data base</h1>
                </div>
                <br/>
                <div class="main-text">
                    <p3>
                        <b>Update and add information of the event</b>
                    </p3>
                </div>    
            </div>
        </header>
        
        <section class="tapahtumatiedot js--studies" id="myForm">
            <hr class="new1">
            <br/> 
            <br/>
          
            <form name="frmUser" method="post" action="">
                <div><?php if(isset($message)) { echo $message; } ?>
                </div>
                <div style="padding-bottom:5px;">
                <a href="eventslist.php">Event information, update</a>
                </div>
                    Starts: <br>
                    <input type="hidden" name='id' class="txtField" value="<?php echo $row["id"]; ?>">
                    <input type="datetime-local" name="starts"  value="<?php echo $row["starts"]; ?>">
                    <br>
                     Ends:<br>
                    <input type="datetime-local" name="ends" value="<?php echo $row['ends']; ?>">
                    <br>
                    Events name: <br>
                    <input type="text" name="eventname"  value="<?php echo $row['eventname']; ?>">
                    <br>
                    Street address :<br>
                    <input type="text" name="street"  value="<?php echo $row['street']; ?>">
                    <br>
                    City:<br>
                    <input type="text" name="city" value="<?php echo $row['city']; ?>">
                    <br>
                    <br>
                    <label>Nature of the event</label>
                    <br/>
                    Training
	                <input type="radio" name="nature" value="Presentation" <?php if($row['nature']=="Presentation"){ echo "checked";}?>/>
	                <BR/>
	                Presentation
            	    <input type="radio" name="nature" value="Demonstration" <?php if($row['nature']=="Demonstration"){ echo "checked";}?>/>
            	    <BR/>
            	    Practice
            	    <input type="radio" name="nature" value="Practice" <?php if($row['nature']=="Practice"){ echo "checked";}?>/>
                    <br/>
                    <br/>
                    <label>Event location</label>
                    <br/>
                    Outside
	                <input type="radio" name="position" value="Outside" <?php if($row['position']=="Outside"){ echo "checked";}?>/>
            	    <BR/>
            	    Interior, spacious
            	    <input type="radio" name="position" value="Interior, spacious" <?php if($row['position']=="Interior, spacious"){ echo "checked";}?>/>
            	    <BR/>
            	    Interior, cramped
            	    <input type="radio" name="position" value="Interior, cramped" <?php if($row['position']=="Interior, cramped"){ echo "checked";}?>/>
                    <br/>
                    <br/>
                    <label>Are there other food/coffee providers at the event?</label>
                    <br/>
                    Coffee and food
	                <input type="radio" name="otherproviders" value="Coffee and food" <?php if($row['otherproviders']=="Coffee and food"){ echo "checked";}?>/>
	                <BR/>
	                Coffee
            	    <input type="radio" name="otherproviders" value="Coffee" <?php if($row['otherproviders']=="Coffee"){ echo "checked";}?>/>
            	    <BR/>
            	    No others
            	    <input type="radio" name="otherproviders" value="No other providers" <?php if($row['otherproviders']=="No other providers"){ echo "checked";}?>/>
                    <br/>
                    <br/>
                    <hr class="new1">
                    
                    <br/>
                    <p3>
                    <b>
                    Participants<br/>&nbsp;
                    </b>
                    </p3>
                    <br/>
                    Number of participants:<br>
                    <input type="text" name="amount_customers" value="<?php echo $row['amount_customers']; ?>">
                    <br/>
                    <br/>
                    <label>Profile of participants</label>
                    <br/>
                    Members of the organization
	                <input type="radio" name="profile" value="Members of the organization" <?php if($row['profile']=="Members of the organization"){ echo "checked";}?>/>
	                <BR/>
	                Outsiders of the organization
            	    <input type="radio" name="profile" value="Outsiders of the organization" <?php if($row['profile']=="Outsiders of the organization"){ echo "checked";}?>/>
            	    <BR/>
            	    Both members of the organization and outsiders
            	    <input type="radio" name="profile" value="Both members of the organization and outsiders" <?php if($row['profile']=="Both members of the organization and outsiders"){ echo "checked";}?>/>
                    <br/>
                    <br/>
                     Age of the participants
                    <br/>
                    30-65 with families
	                <input type="radio" name="age_customers" value="30-65 with families" <?php if($row['age_customers']=="30-65 with families"){ echo "checked";}?>/>
	                <BR/>
	                &ge;66/0-11
            	    <input type="radio" name="age_customers" value="66/0-11" <?php if($row['age_customers']=="66/0-11"){ echo "checked";}?>/>
            	    <BR/>
            	    12-16
            	    <input type="radio" name="age_customers" value="12-16" <?php if($row['age_customers']=="12-16"){ echo "checked";}?>/>
            	    <BR/>
                    17-30
	                <input type="radio" name="age_customers" value="17-30" <?php if($row['age_customers']=="17-30"){ echo "checked";}?>/>
                    <br/>
                    <br/>
                    Anything else:<br>
                    <input type="text" name="anythingelse" value="<?php echo $row['anythingelse']; ?>">
                    <br>
                    <br>
                    <input type="submit" name="submit" value="Submit" class="button"> 
                    
                    
                    

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
  

