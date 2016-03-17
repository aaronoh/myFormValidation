<?php
require_once 'loginhelper.php';
start_session();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact Us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Script for google maps api -->
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <!--Script for layout/design of myMap-->
        <script src="scripts/map.js"></script>
        <!--Links to my google fonts bootstrap/my own style sheets & javascript scripts-->
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>

    </head>
    <body>
        <!--If the user visiting this page is logged in, display the header with full navigation, 
        otherwise display a version of the header that only contains a login link in the nav bar -->
        <?php
        if (is_logged_in()) {
            require 'header.php';
        } else {
            require 'headernonav.php';
        }
        ?>
        <!--empty div, populated by the google maps api js scripts-->
        <div id="map"></div>
        <!--Bootstrap Container-->
        <div class="container">
            <!--Row for page header-->
            <div class="row">
                <h1 class="gsheader col-lg-3 col-lg-offset-5">Contact Us</h1>
            </div>
            <!--div containing  contact panel sized using bootstrap cols-->
            <div class="contactpanels col-lg-3 col-lg-offset-1">
                <!--Table containing contact panel-->
                <table>
                    <tr>
                        <td class="tbtitle">
                            <h4> Human Resources</h4> </td>
                    </tr>
                    <tr>
                        <td class="bold"> <h5>Craig Clarke</h5></td>
                    </tr>
                    <tr>
                        <td>01 230 1490</td>
                    </tr>
                    <tr>
                        <td>craig.hr@pilot.ie</td>
                    </tr>
                </table>

            </div>
            <!--Close panel-->
            <!--div containing  contact panel sized using bootstrap cols-->
            <div class="contactpanels movelosspv col-lg-3 col-lg-offset-1">
                <!--Table containing contact panel-->
                <table>
                    <tr>

                        <td class="tbtitle"><h4>
                                Loss Prevention</h4> </td>

                    </tr>
                    <tr>
                        <td class="bold"> <h5>Angela Jones</h5></td>
                    </tr>
                    <tr>
                        <td> 01 230 1412</td>
                    </tr>
                    <tr>
                        <td>angela@pilot.ie</td>
                    </tr>
                </table>

            </div> 
            <!--Close panel-->
            <!--div containing  contact panel sized using bootstrap cols-->
            <div class="contactpanels col-lg-3 col-lg-offset-1">
               <!--Table containing contact panel-->
                <table>
                    <tr>

                        <td class="tbtitle"><h4>Help & Emergencies</h4> </td>

                    </tr>
                    <tr>
                        <td class="bold"> <h5>Adam Doyle</h5></td>
                    </tr>
                    <tr>
                        <td> 01 230 1477</td>
                    </tr>
                    <tr>
                        <td>999/112</td>
                    </tr>
                </table>

            </div>
            <!--Close panel-->
            <!-- Form action to redirect to contact page - have not implemented a system for storing the messages sent-->
            <form  action="contact.php">
                <!--div containing the left form elements--> 
                <div class="col-lg-6">
                    <input type="text" class="contactform contactformspcing" placeholder="Name" />
                    <input type="email" class="contactform contactformspcing" placeholder="Email" />
                    <input type="text" class="contactform contactformspcing" placeholder="Subject" />
                </div>
                 <!--div containing the right form elements--> 
                <div class="col-lg-6">
                    <textarea   class="contactform textarea"  placeholder="Message"></textarea>
                </div>
                  <!--div containing submit button--> 
                <div class="col-lg-2 col-lg-offset-5 ">
                    <button type="submit"   class="form-btnspcing form-btn">Send Message</button> 
                </div>
            </form>
            <!--closing form-->
        </div>
        <!--php file which generates the html for my footer-->
        <?php require 'footer.php'; ?>
    </body>
</html>