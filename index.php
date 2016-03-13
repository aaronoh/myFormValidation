<?php
require_once 'dbconnection.php';
require_once 'loginhelper.php';

start_session();

if (!is_logged_in()) {
    header("Location: loginform.php");
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>



        <?php require 'header.php'; ?><!-- Requires header.php to generate the code for the header !-->

        <div class="container">
            <div class="row col-lg-3 col-lg-offset-4 cntrltitle">
                <h2 class="landingheader">Control Panel</h2>
            </div>
            <div class="row col-lg-3 col-lg-offset-4 hrtitle">
                <hr>
            </div>
            <div class="row"></div>
            <div class="row controlpanel">


                <div class=" drivers col-lg-4 ">
                    <div class="row"><img src="imgs/driverlanding.png"><h3 class="driverlanding">Drivers</h3></div>
                    <br>
                    <p class="dtext">Here you can view our drivers, depending on your privileges you may also be able to add or delete a
                        driver as well as edit an individual drivers current details. </p>
                    </p>
                </div>
                <div class=" buses col-lg-4">
                    <div class="row"><a href ="viewallbuses.php"><img src ="imgs/buslanding.png"></a><h3 class="buslanding">Buses</h3></div>
                    <br>
                    <p class="dtext">Here you can view our buses, depending on your privileges you may also be 
                        able to add or delete a bus as well as edit an individual buses details.
                        <span class="italic"> Please verify service changes before approving an edit.</ 
                    </p>
                </div>

                <div class=" garages col-lg-4">
                    <div class="row"><a href ="viewallgarages.php"><img src ="imgs/garagelanding.png"></a><h3 class="garagelanding">Garages</h3></div>
                    <br>
                    <p class="dtext">Here you can view our garages, depending on your privileges you may also be able to
                        add or delete a garage as well as edit an individual garages current details. 
                    </p>
                </div>
            </div>
        </div>
        <div class="row spacing"></div>
        <?php require 'footer.php'; ?>

    </body>
</html>
