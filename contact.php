<?php
require_once 'loginhelper.php';
start_session();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="deleteConfirm.js"></script>
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
        <div class="container">
            <div class="row">
                <h1 class="gsheader col-lg-2 col-lg-offset-5">Contact</h1>
            </div>

            <div class="row">
                <div class="contactpanels col-lg-2">
                    <table>
                        <tr>

                            <td class="tbtitle"> Human Resources </td>

                        </tr>
                        <tr>
                            <td class="bold"> Adam Doyle</td>
                        </tr>
                        <tr>
                            <td> 01 230 1412</td>
                        </tr>
                        <tr>
                            <td> adam.hr@pilot.ie</td>
                        </tr>
                    </table>

                </div>
                <div class="contactpanels col-lg-2 col-lg-offset-1">
                    <table>
                        <tr>

                            <td class="tbtitle"> Human Resources </td>

                        </tr>
                        <tr>
                            <td class="bold"> Adam Doyle</td>
                        </tr>
                        <tr>
                            <td> 01 230 1412</td>
                        </tr>
                        <tr>
                            <td> adam.hr@pilot.ie</td>
                        </tr>
                    </table>

                </div>      <div class="contactpanels col-lg-2 col-lg-offset-1">
                    <table>
                        <tr>

                            <td class="tbtitle"> Human Resources </td>

                        </tr>
                        <tr>
                            <td class="bold"> Adam Doyle</td>
                        </tr>
                        <tr>
                            <td> 01 230 1412</td>
                        </tr>
                        <tr>
                            <td> adam.hr@pilot.ie</td>
                        </tr>
                    </table>

                </div>
                <div class="contactpanels col-lg-2 col-lg-offset-1">
                    <table>
                        <tr>

                            <td class="tbtitle"> Human Resources </td>

                        </tr>
                        <tr>
                            <td class="bold"> Adam Doyle</td>
                        </tr>
                        <tr>
                            <td> 01 230 1412</td>
                        </tr>
                        <tr>
                            <td> adam.hr@pilot.ie</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </body>
</html>