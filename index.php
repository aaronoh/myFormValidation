<?php
require_once 'dbconnection.php';
require_once 'loginhelper.php';

start_session();
//if user is not logged in, return to  log in form
if (!is_logged_in()) {
    header("Location: loginform.php");
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Control Panel</title>
        <!--Links to my google fonts bootstrap/my own style sheets & javascript scripts-->
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <!--php file which generates the html for my header-->
        <?php require 'header.php'; ?><!-- Requires header.php to generate the code for the header !-->
        <!--Bootstrap container-->
        <div class="container">
            <!--Page Header-->
            <div class="row hrtitle col-lg-4 col-lg-offset-4 ">
                <h1 class="gsheader">Control Panel</h1>
            </div>
            <!--forces content under-->
            <div class="clearfix"></div>
            <!--each element of the control panel is held within this row-->
            <div class="row controlpanel ">
                <!--                each element of the control panel has its own 4 cols-->
                <div class=" buses col-lg-4">
                    <div class="row"><a href ="viewallbuses.php"><img src ="imgs/buslanding.png"></a><h3 class="buslanding">Buses</h3></div>
                    <br>
                    <p class="dtext">Here you can view our buses, depending on your privileges you may also be 
                        able to add or delete a bus as well as edit an individual buses details.
                        <span class="italic"> Please verify service changes before approving an edit.
                    </p>
                </div>
                <!--                each element of the control panel has its own 4 cols-->
                <div class=" garages col-lg-4">
                    <div class="row"><a href ="viewallgarages.php"><img src ="imgs/garagelanding.png"></a><h3 class="garagelanding">Garages</h3></div>
                    <br>
                    <p class="dtext">Here you can view our garages, depending on your privileges you may also be able to
                        add or delete a garage as well as edit an individual garages current details. 
                    </p>
                </div>
                <!--                each element of the control panel has its own 4 cols-->
                <div class=" drivers col-lg-4 ">
                    <div class="row"><img src="imgs/driverlanding.png"><h3 class="driverlanding">Drivers</h3></div>
                    <br>
                    <p class="dtext">Here you can view our drivers, depending on your privileges you may also be able to add or delete a
                        driver as well as edit an individual drivers current details.
                    </p>
                </div>
            </div><!-- closing control panel !-->
            <div class="row spacing"></div><!--white space div (ran into issues using margins, instead gave this a set height and bg colour-->
        </div><!-- Closing Bootstrap container !--> 
        <?php require 'footer.php'; ?><!--php file that generates the html code for my footer!-->
    </body>
</html>
