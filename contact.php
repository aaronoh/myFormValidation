<?php
require_once 'loginhelper.php';
start_session();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="deleteConfirm.js"></script>
        <!-- Script for google maps api -->
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script src="scripts/map.js"></script>

    </head>
    <body>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <?php
        if (is_logged_in()) {
            require 'header.php';
        } else {
            require 'headernonav.php';
        }
        ?>
        <div id="map"></div>
        <div class="container">
            <div class="row">
                <h1 class="gsheader col-lg-3 col-lg-offset-5">Contact Us</h1>
            </div>
            <div class="contactpanels col-lg-3 col-lg-offset-1">
                <table>
                    <tr>

                        <td class="tbtitle"><h4>

                                Human Resources</h4> </td>

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
            <div class="contactpanels movelosspv col-lg-3 col-lg-offset-1">
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

            <div class="contactpanels col-lg-3 col-lg-offset-1">
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
            <div class="clearfix"></div>
            <form  action="contact.php">
                <div class="col-lg-6">
                    <input type="text" class="contactform contactformspcing" placeholder="Name" />
                    <input type="email" class="contactform contactformspcing" placeholder="Email" />
                    <input type="text" class="contactform contactformspcing" placeholder="Subject" />
                </div>
                <div class="col-lg-6">
                    <textarea   class="contactform textarea"  placeholder="Message"></textarea>
                </div>
                <div class="  col-lg-1 col-lg-offset-5">
                    <button type="submit"   class="form-btn">Send Message</button> 
                </div>
            </form>
        </div>
        <?php require 'footer.php'; ?>
    </body>
</html>