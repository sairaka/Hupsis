

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
        
        <title>Event insert</title> 
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
        
        <section class="eventinfomation js--studies" id="myForm">
           <p3>
                <b>
                    <p>Tell us the basic information about the event <br/> &nbsp;</p>
                </b>
            </p3>
            
            <form id="informationsave" method="post" action="process_insert.php">
                <div class="row">
                    <div class="col span-1-of-2">
                        <label class="required">Name </label>
                        <br/> 
                        <input type="text" name="eventname" />
                        <br/>
                        <br/>
                        <label>Street address</label>
                        <br/>
                        <input type="text" name="street" />
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col span-1-of-2 postalbox"> 
                                <label>Postal code</label>
                                <br/>
                                <input type="numeric" name="postalcode" />
                            </div>    
                            <div class="col span-1-of-2 citybox">
                                <label>City</label>
                                <br/>
                                <input type="text" name="city" />
                            </div>
                        </div>
                        <br/>
                        <br/>
                    </div>    
                    <div class="col span-1-of-2"> 
                        <label class="required">Event starts</label>
                        <br/>
                        <input type="datetime-local" name="starts" style="min-width:200px;"/>
                        <br/>
                        <br/>
                        <label class="required">Event ends</label>
                        <br/>
                        <input type="datetime-local" name="ends" style="min-width:200px;" />
                        <br/>
                        <br/>
                    </div>
                </div>
                <br/>
                <div class="row">  
                    <div class="col span-1-of-2">    
                        <label>Nature of the event</label>
                        <br/>
                        <select id="nature" name="nature">
                            <option value="" selected disabled hidden> -- select an option -- </option> 
                            <option value="Presentation">Presentation</option>
                            <option value="Demonstration">Demonstration</option>
                            <option value="Practice">Practice</option>                    
                        </select>
                        <br/>
                        <br/>
                        <label>Event location</label>
                        <br/>
                        <select id="position" name="position">
                            <option value="" selected disabled hidden> -- select an option -- </option>
                            <option value="Outside">Outside</option>
                            <option value="Interior, spacious">Interior, spacious</option>
                            <option value="Interior, cramped">Interior, cramped</option>                    
                        </select>
                        <br/>
                        <br/>
                    </div>
                    <div class="col span-1-of-2">
                        <label>Are there other food/coffee providers at the event?</label>
                        <br/>
                        <select id="otherproviders" name="otherproviders">
                            <option value="" selected disabled hidden> -- select an option -- </option>
                            <option value="No other providers">No other providers</option>
                            <option value="Coffee">Yes, coffee</option>
                            <option value="Coffee and food">Yes, coffee and food</option>                         
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
                                <input type="numeric" name="amount_customers" />
                                <br/>
                                <br/>
                            </div>
                            <div class="col span-1-of-2">
                                <label>Age of the participants</label>
                                <br/>
                                <select id="age_customers" name="age_customers">
                                    <option value="" selected disabled hidden> - select an option - </option>
                                    <option value="0-16">0-16</option>
                                    <option value="17-29">17-29</option>
                                    <option value="30-65">30-65</option>
                                    <option value="66>">66&ge;</option>
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
                            <option value="" selected disabled hidden> -- select an option -- </option>
                            <option value="Members of the organization">Members of the organization</option>
                            <option value="Outsiders of the organization">Outsiders of the organization</option>
                            <option value="Both members of the organization and outsiders">Both members of the organization and outsiders</option>
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
                <b>Do you want to tell us something else about the event? <br/>&nbsp;
                </b>
                </p3>
                <br/>
                <textarea type="text" name="anythingelse"></textarea>
                <br/>
                <br><br>
		        <input type="submit" value="Save event"/>
		        <a class="btn btn-full" href="javascript:history.back()">Undo</a>
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
 

	

