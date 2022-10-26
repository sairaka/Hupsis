<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
include_once 'database.php';
$result = pg_query($db,"SELECT * FROM eventinformation ORDER BY starts");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/vendorstapahtuma/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="/vendorstapahtuma/css/grid.css">
        <link rel="stylesheet" type="text/css" href="/vendorstapahtuma/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="/resourcestapahtuma/css/style.css"> 
        <script src="/vendorstapahtuma/js/sorttable.js"></script>

        
        <title>Eventlist</title> 
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
                    <h1>Events saved to the data base</h1>
                </div>
                <div class="main-text">
                    <p>
                        <b>On this page, you can see the events saved in the database, edit their information, create an automatic plan and delete them.</b>
                    </p>
                </div>    
            </div>
        </header>
        
        <section class="listofevents js--studies">
            <table class="tb sortable" id="eventslisttb">
                <thead>
                    <tr>
                         <th>Event starts</th>
                         <th>Events name</th>
                         <th>Create plan</th>
                         <th>Update /<br/>report</th>
                         <th>Delete</th>
                         <th></th>
                     </tr>
                </thead>
                <?php
                $i=0;
                while($row=pg_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo date('d.m.Y', strtotime( $row["starts"])); ?></td>
                        <td><?php echo $row["eventname"]; ?></td>
                        <td><a href="event_plan.php?id=<?php echo $row["id"]; ?>"><i class="ion-android-list icon-small"></a></td>
                        <td><a href="event_update.php?id=<?php echo $row["id"]; ?>"><i class="ion-android-create icon-small"></a></td>
                        <td><a href="delete_process.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete an event?'); return false;" ><i class="ion-close icon-small"></a></td>
                        <td><a href="event_plan2.php?id=<?php echo $row["id"]; ?>" style="color:#FFFCFC;">Testi</a></td>
                        
                    </tr>
                <?php
                $i++;
                }
                ?>
            </table>
            <br/><br/><br/><hr class="new1">
            <br/><br/>
            <a class="btn btn-full database-button" href="event_insert.php">Add new event</a>
            <a class="btn btn-full database-button" href="hupsis.html">Return to main page</a>
        </section>    
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
        <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
        <script src="/vendorsvolunteer/js/jquery.waypoints.min.js"></script>
        <script src="/resourcesvolunteer/js/script.js"></script>
    </body>


</html>
  

