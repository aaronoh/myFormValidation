<?php
require_once 'garage.php';
require_once 'garagesTableGateway.php';
require_once 'dbconnection.php';
require_once 'process.php';

$name = $_POST['name'];
$mname = $_POST['mname'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$ophrs = $_POST['ophrs'];
$opdate = $_POST['opdate'];

$garage = new Garage(-1, $name, $address, $email, $phone, $opdate, $ophrs, $mname );

$dbconnection = dbconnection::getConnection();

$gateway = new garageTableGateway($dbconnection);

$id = $gateway->insertGarage($garage);
        
//header('Location: viewallgarages.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            div.container {
                margin: auto;

            }

            div.row {
                display: block;
                margin-top: 10px;
            }

            div.label {
                display: inline-block;
                width: 160px;
                text-align: right;
                padding-right: 5px;
            }

            div.control {
                display: inline-block;
                vertical-align: top;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <h3>Thank you for submitting your data.</h3>
            </div>
            <div class="row">
                <div class="label">
                    <label>Name</label>
                </div>
                <div class="control">
                    <?php echo $formdata['name']; ?>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label>Manager Name</label>
                </div>
                <div class="control">
                    <?php echo $formdata['mname']; ?>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label>Address</label>
                </div>
                <div class="control">
                    <?php echo $formdata['address']; ?>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label>Email</label>
                </div>
                <div class="control">
                    <?php echo $formdata['email']; ?>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label>Phone</label>
                </div>
                <div class="control">
                    <?php echo $formdata['phone']; ?>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label>Opening Hours</label>
                </div>
                <div class="control">
                    <?php echo $formdata['ophrs']; ?>
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label>Opening Date</label>
                </div>
                <div class="control">
                    <?php echo $formdata['opdate']; ?>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label>Platform</label>
                </div>
            </div>
            <div class="control">
                <?php
                if ($formdata['facilities'] != NULL) {
                    foreach ($formdata['facilities'] as $facilities) {//as
                        echo $facilities . ' ';
                    }
                }
                ?>
            </div>

            <div class="row">
                <div class="label">
                    <label>LateNight? </label>
                </div>
                <div class="control">
                    <?php echo $formdata['latenight']; ?>
                </div>
            </div>

            <div class="row">
                <div class="label">
                    <label>Avatar: </label>
                </div>
                <div class="control">
                    <?php echo $formdata['avatar']; ?>
                </div>
            </div>
        </div>


    </body>

</html>