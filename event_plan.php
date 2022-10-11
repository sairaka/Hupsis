<?php
include_once 'database.php';
if(count($_POST)>0) {
	
	$query = "UPDATE eventinformation AS e SET eventname='" . $_POST['eventname'] . "', street='" . $_POST['street'] . "' ,city='" . $_POST['city'] . "',anythingelse='" . $_POST['anythingelse'] . "', nature='" . $_POST['nature'] . "', position='" . $_POST['position'] . "', otherproviders='" . $_POST['otherproviders'] . "' WHERE e.id='" . $_GET['id'] . "'";
	if($result = pg_query($query)){
		echo "Record Updated Successfully.";
	}
	else{
		echo "Error.";
	}
	
}

$hourdiff = round((strtotime($row['ends']) - strtotime($row['starts']))/3600, 1);

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
        
        <title>RaisaK Event plan for servings</title> 
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
                    <h1>Events plan for serving</h1>
                    <p4>You can change the explanatory texts and recommendations by clicking on them. When you print the pdf, the changes will be reflected in it.
                    </p4>    
                </div>    
            </div>
        </header>
        
        
        <section class="research js--studies" id="pdf-content">
            <div>
                <h2>Automatic event plan for servings for <?php echo $row['eventname']; ?></h2>
            
                <div class="research-text">
                <p>
                    Place: <?php echo $row['street']; ?>, <?php echo $row['city']; ?> <br/>
                    Time: <?php echo $row['starts']; ?> - <?php echo $row['ends']; ?> <br/><br/>
                    <?php   $hourdiff = round((strtotime($row['ends']) - strtotime($row['starts']))/3600, 1); 
                            $location = $row['position'];
                            $providers = $row['otherproviders'];
                            $profile = $row['profile'];
                            $agegroup = $row['age_customers'];
                            $participationsamount = $row['amount_customers'];
                            $nature = $row['nature'];
                    ?>
                </p> 
                </div>    
            
                <div class="research-title">
                    <h8>Event duration and nature</h8> 
                    <div class="research-text">
                        <p>Event duration: <?php echo $hourdiff; ?> hours. <br/>
                        Nature of the event: <?php echo $nature; ?><br/><br/></p>
                        <p contentEditable="true">    
                            The length of the event determines what type of catering should be preferred.<br/><br/>  
                           <?php
                           if ($hourdiff < "4") {
                              echo "In short trainings of less than 4 hours, it is good to offer coffee and tea and something sweet to eat.";
                            }
                            elseif ($hourdiff > "4" and $hourdiff <= "6") {
                                echo "In events lasting 4-6 hours, it is good to have some small salty snacks in addition to coffee and tea.";
                            }
                            else {
                                echo "In events lasting more than 6 hours, you should also think about a warm meal for the participants.";
                            }
                            ?>
                           
                        </p>
                    </div>
                </div>    
                <div class="research-title">
                    <h8>Events location and other providers</h8>
                    <div class="research-text">
                        <p>Location: <?php echo $location; ?><br/>
                        Other providers: <?php echo $providers; ?><br/><br/> 
                        The environment of the event also affects how the participants need refreshments.<br/>&nbsp;</p> 

                        <p contentEditable="true">
                             <?php
                           if ($location == "Outside") {
                                echo "When the event is outdoors, you should think about the season when thinking about catering. Depending on the season, participants may need more liquid or warmth than usual.";
                            }
                            elseif($location == "Interior, cramped"){
                                echo "If the event is held in a smaller space, such as in the department's premises, there is no other catering, in which case the main responsibility for catering rests with the organizer of the event.";    
                            }
                            else {
                                echo "If the event is in a larger space, where there are other presentations, the person in charge of the event or other participants can serve. In this case, it is worth checking the situation in terms of serving.";
                            }
                            ?>
                        </p>  
                    </div>
                </div>
                <div class="research-title">
                    <h8>Participations</h8>
                    <div class="research-text">
                        <p>Profile: <?php echo $profile; ?><br/>
                        Age group of participations: <?php echo $agegroup; ?><br/>
                        Amount of participations: <?php echo $participationsamount; ?> persons<br/> <br/> </p>

                        <p contentEditable="true">
                             <?php
                           if ($profile == "Members of the organization") {
                                echo "When the event is outdoors, you should think about the season when thinking about catering. Depending on the season, participants may need more liquid or warmth than usual.";
                            }
                            elseif($profile == "Outsiders of the organization"){
                                echo "If the event is held in a smaller space, such as in the department's premises, there is no other catering, in which case the main responsibility for catering rests with the organizer of the event.";    
                            }
                            else {
                                echo "If the event is in a larger space, where there are other presentations, the person in charge of the event or other participants can serve. In this case, it is worth checking the situation in terms of serving.";
                            }
                            ?>
                        </p> 
                        </div>
                </div>
                
                <div class="research-title">
                    <h8>Recommended servings for the event:</h8>
                    <div class="research-text"> 
                        <div contentEditable="true" class="questions">
                            
                            <ul>
                                <?php if($nature == "Presentation" and $hourdiff < "4" and $location == "Outside"): ?>
                                <li><?php echo $participationsamount; ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>Even if the event is outside, it is not necessary to have servings for this is quite short event. </li>
                                <?php endif; ?>
                                <?php if($nature == "Presentation" and $hourdiff < "4" and $location == "Interior, spacious"): ?>
                                <li><?php echo $participationsamount; ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>Servings are not necessary, but nice way to welcome participations</li>
                                <?php endif; ?>
                                <?php if($nature == "Presentation" and $hourdiff < "4" and $location == "Interior, cramped"): ?>
                                <li><?php echo $participationsamount; ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>Servings are not necessary, but nice way to welcome participations</li>
                                <?php endif; ?>
                                
                                <?php if($nature == "Presentation" and ($hourdiff > "4" and $hourdiff <= "6") and $location == "Outside"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>Because event is outside it is good to have something salty to offer if other exhibitors doesn't provide it.</li>
                                <?php endif; ?>
                                <?php if($nature == "Presentation" and ($hourdiff > "4" and $hourdiff <= "6") and $location == "Interior, spacious"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>No need for warm food and it is good to see if the organizer or other exhibitors provide something salty.</li>
                                <?php endif; ?>
                                <?php if($nature == "Presentation" and ($hourdiff > "4" and $hourdiff <= "6") and $location == "Interior, cramped"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>No need for warm food, but it is good to have salty and sweet bites for participations especially if the event is after working hours.</li>
                                <?php endif; ?>
                                
                                <?php if($nature == "Presentation" and $hourdiff> "6" and $location == "Outside"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li><?php echo round($participationsamount*1); ?> serving of warm food </li>
                                <li>It is good to have warm food for participations even if it is warm weather. That way we can offer ether warmth or salts to participations. In the summer, a good option is soup, where the participants also get liquid at the same time.</li>
                                <?php endif; ?>
                                <?php if($nature == "Presentation" and $hourdiff> "6" and $location == "Interior, spacious"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li><?php echo round($participationsamount*1); ?> serving of warm food </li>
                                <li>It is good to have warm food for participations even if it is warm weather, but usually in events with multiple exhibitors there is something warm food by the organizer or other exhibitors.</li>
                                <?php endif; ?>
                                <?php if($nature == "Presentation" and $hourdiff> "6" and $location == "Interior, cramped"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li><?php echo round($participationsamount*1.5); ?> serving of warm food </li>
                                <li>It is good to have warm food for participations even if it is warm weather. Warm food helps the participants cope, as long as the food is not too heavy.</li>
                                <?php endif; ?>
                                
                                <?php if(($nature == "Demonstration") and ($hourdiff < "4") and $location == "Outside"): ?>
                                <li><?php echo $participationsamount; ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>Even if the avent is outside, it is not necessary to have servings for this is quite short event. </li>
                                <?php endif; ?>
                                <?php if(($nature == "Demonstration") and ($hourdiff < "4") and $location == "Interior, spacious"): ?>
                                <li><?php echo $participationsamount; ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>Servings are not necessary, but nice way to welcome participations</li>
                                <?php endif; ?>
                                <?php if(($nature == "Demonstration") and ($hourdiff < "4") and $location == "Interior, cramped"): ?>
                                <li><?php echo $participationsamount; ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>Servings are not necessary, but nice way to welcome participations</li>
                                <?php endif; ?>
                                
                                <?php if($nature == "Demonstration" and ($hourdiff > "4" and $hourdiff <= "6") and $location == "Outside"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>Because event is outside it is good to have something salty to offer.</li>
                                <?php endif; ?>
                                <?php if($nature == "Demonstration" and ($hourdiff > "4" and $hourdiff <= "6") and $location == "Interior, spacious"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>No need for warm food, but it is good to see somebody provides something salty if you are organizing the event.</li>
                                <?php endif; ?>
                                <?php if($nature == "Demonstration" and ($hourdiff > "4" and $hourdiff <= "6") and $location == "Interior, cramped"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>No need for warm food, but it is good to have salty and sweet bites for participations especially if the event is after working hours.</li>
                                <?php endif; ?>
                                
                                <?php if($nature == "Demonstration" and $hourdiff> "6" and $location == "Outside"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li><?php echo round($participationsamount*1); ?> serving of warm food </li>
                                <li>It is good to have warm food for participations, even if it is warm weather. That way we can offer ether warmth or salts to participations. In the summer, a good option is soup, where the participants also get liquid at the same time.</li>
                                <?php endif; ?>
                                <?php if($nature == "Demonstration" and $hourdiff> "6" and $location == "Interior, spacious"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li><?php echo round($participationsamount*1); ?> serving of warm food </li>
                                <li>It is good to have warm food for participations, even if it is warm weather. That way we can offer ether warmth or salts to participations. In the summer, a good option is soup, where the participants also get liquid at the same time.</li>
                                <?php endif; ?>
                                <?php if($nature == "Demonstration" and $hourdiff> "6" and $location == "Interior, cramped"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li><?php echo round($participationsamount*1); ?> serving of warm food </li>
                                 <li>It is good to have warm food for participations, even if it is warm weather. That way we can offer ether warmth or salts to participations. In the summer, a good option is soup, where the participants also get liquid at the same time.</li>
                                <?php endif; ?>
                                
                                <?php if($nature == "Practice" and $hourdiff < "4" and $location == "Outside"): ?>
                                <li><?php echo $participationsamount; ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>Even if the avent is outside, it is not necessary to have servings for this is quite short event.</li>
                                <?php endif; ?>
                                <?php if($nature == "Practice" and $hourdiff < "4" and $location == "Interior, spacious"): ?>
                                <li><?php echo $participationsamount; ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>Servings are not necessary, but nice way to welcome participations</li>
                                <?php endif; ?>
                                <?php if($nature == "Practice" and $hourdiff < "4" and $location == "Interior, cramped"): ?>
                                <li><?php echo $participationsamount; ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>Servings are not necessary, but nice way to welcome participations</li>
                                <?php endif; ?>
                                
                                <?php if($nature == "Practice" and ($hourdiff > "4" and $hourdiff <= "6") and $location == "Outside"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>Because event is outside it is good to have something salty to offer</li>
                                <?php endif; ?>
                                <?php if($nature == "Practice" and ($hourdiff > "4" and $hourdiff <= "6") and $location == "Interior, spacious"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>No need for warm food, but it is good to have salty bites if there are no other providers in the event.</li>
                                <?php endif; ?>
                                <?php if($nature == "Practice" and ($hourdiff > "4" and $hourdiff <= "6") and $location == "Interior, cramped"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li>No need for warm food, but it is good to have salty and sweet bites for participations especially if the event is after working hours.</li>
                                <?php endif; ?>
                                
                                <?php if($nature == "Practice" and $hourdiff> "6" and $location == "Outside"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li><?php echo round($participationsamount*1); ?> serving of warm food </li>
                                <li>It is good to have warm food for participations, even if it is warm weather. That way we can offer ether warmth or salts to participations. In the summer, a good option is soup, where the participants also get liquid at the same time, especially if the practice is physically hard.</li>
                                <?php endif; ?>
                                <?php if($nature == "Practice" and $hourdiff> "6" and $location == "Interior, spacious"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li><?php echo round($participationsamount*1); ?> serving of warm food </li>
                                <li>It is good to have warm food for participations, even if it is warm weather.</li>
                                <?php endif; ?>
                                <?php if($nature == "Practice" and $hourdiff> "6" and $location == "Interior, cramped"): ?>
                                <li><?php echo round($participationsamount*1.5); ?> coffees and <?php echo $participationsamount; ?> piece of salty or sweet bite</li>
                                <li><?php echo round($participationsamount*1); ?> serving of warm food </li>
                                <li>It is good to have warm food for participations, even if it is warm weather.</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <br/><br/><hr class="new1">

        </section>
        <section class="research" >
            <div class="research-text">
                <button class="button-fullgen" id="btn-generate">Generate PDF</button>
                <br/><br/><br/><br/>
            </div>
        
        </section>
        
        <script>
    	var buttonElement = document.querySelector("#btn-generate");
    	buttonElement.addEventListener('click', function() {
		var pdfContent = document.getElementById("pdf-content").innerHTML;
		var windowObject = window.open();

		windowObject.document.write(pdfContent);

		windowObject.print();
		windowObject.close();
	});
</script>
        
        <?php

        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
        <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
        <script src="/vendorsvolunteer/js/jquery.waypoints.min.js"></script>
        <script src="/resourcesvolunteer/js/script.js"></script>
    </body>


</html>
  

