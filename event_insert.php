

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
        
        <title>RaisaK Event insert</title> 
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
                <div class="background">
                    <div class="box b"></div>
                </div>
                <div class="main-head">
                    <h1>Adding an event to the data base</h1>
                </div>
                <br/>
                <div class="main-text">
                </div>    
            </div>
        </header>
        
        <section class="tapahtumatiedot js--studies" id="myForm">
            <hr class="new1">
            <br/> 
            <br/>
           <p3>
                <b>
                    Tell us the basic information about the event <br/> &nbsp;
                </b>
            </p3>
            
            <form id="tietojentallennus" method="post" action="process_insert.php">
                <label>Name</label>
                <br/> 
                <input type="text" name="eventname" />
                <br/>
                <br/>
                <label>Street address</label>
                <br/>
                <input type="text" name="street" />
                <br/>
                <br/>
                <label>City</label>
                <br/>
                <input type="text" name="city" />
                <br/>
                <br/>
                 <label>Event starts</label>
                <br/>
                <input type="datetime-local" name="starts" />
                <br/>
                <br/>
                 <label>Event ends</label>
                <br/>
                <input type="datetime-local" name="ends" />
                <br/>
                <br/>
                <br/>
                <label>Nature of the event</label>
                <br/>
                <input type="radio" id="nature" name="nature" value="Presentation" /> Presentation<br/>
                <input type="radio" id="nature" name="nature" value="Demonstration" /> Demonstration<br/>
                <input type="radio" id="nature" name="nature" value="Practice" /> Practice<br/>
                <br/>
                <br/>
                <label>Event location</label>
                <br/>
                <input type="radio" id="position" name="position" value="Outside" /> Outside<br/>
                <input type="radio" id="position" name="position" value="Interior, spacious" /> Interior, spacious<br/>
                <input type="radio" id="position" name="position" value="Interior, cramped" /> Interior, cramped<br/>
                <br/>
                <br/>
                <label>Are there other food/coffee providers at the event?</label>
                <br/>
                <input type="radio" id="otherproviders" name="otherproviders" value="Coffee and food" /> Coffee and food<br/>
                <input type="radio" id="otherproviders" name="otherproviders" value="Coffee" /> Coffee<br/>
                <input type="radio" id="otherproviders" name="otherproviders" value="No other providers" />No other providers<br/>
                <br/>
                <br/>
                <hr class="new1">
                <br/>
                <br/>
                
                <p3>
                <b>
                    Tell us about the participants of the event <br/>&nbsp;
                </b>
                </p3>
                <br/>
                
                <label>Number of participants</label>
                <br/>
                <input type="numeric" name="amount_customers" />
                <br/>
                <br/>
                <label>Profile of participants</label>
                <br/>
                <input type="radio" id="profile" name="profile" value="Members of the organization" /> Members of the organization<br/>
                <input type="radio" id="profile" name="profile" value="Outsiders of the organization" /> Outsiders of the organization<br/>
                <input type="radio" id="profile" name="profile" value="Both members of the organization and outsiders" /> Both members of the organization and outsiders<br/>
                <br/>
                <label>Age of the participants</label>
                <br/>
                <input type="radio" id="age_customers" name="age_customers" value="30-65 with families" /> 30-65 with families<br/>
                <input type="radio" id="age_customers" name="age_customers" value="66/0-11" /> &ge;66/0-11<br/>
                <input type="radio" id="age_customers" name="age_customers" value="12-16" /> 12-16<br/>
                <input type="radio" id="age_customers" name="age_customers" value="17-30" /> 17-30<br/>
                <br/>
                <label>Anything else</label>
                <br/>
                <textarea type="text" name="anythingelse">
                </textarea>
                <br/>
                <br><br>
		        <input type="submit" />
                <br/>
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
 

	

