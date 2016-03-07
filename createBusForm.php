<?php

//require_once 'validateGarage.php';

function setValue($formdata, $fieldName) {
    if (isset($formdata) && isset($formdata[$fieldName])) {
        echo $formdata[$fieldName];
    }
}

if (!isset($formdata)) {
    $formdata = array();
}

if (!isset($errors)) {
    $errors = array();
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--<script src="validate.js"></script>-->
    </head>

    <body>
        <?php require 'utils/styles.php'; ?>
<?php require 'utils/scripts.php'; ?>
        <div class="conntainer">
            <h1>Create Bus Form</h1>
            <div class="col-lg-2 col-lg-offset-5">

                <form class="form-horizontal" action="createBus.php" method="post">

                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Reg" reg="reg" id="reg" value="<?php setValue($formdata, 'reg'); ?>" />
                        <div class="error">
                            <span id="regError">
<?php if (isset($errors['reg'])) echo $errors['reg']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text"  placeholder="Make" reg="make" id="make" value="<?php setValue($formdata, 'make'); ?>" />
                        <div class="error">
                            <span id="makeError">
<?php if (isset($errors['make'])) echo $errors['make']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">

                        <input class="form-control" type="text"  placeholder="Model" reg="model" id="model" value="<?php setValue($formdata, 'model'); ?>" />

                        <div class="error">
                            <span id="modelError">
<?php if (isset($errors['model'])) echo $errors['model']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control"  placeholder="Capacity" type="number" reg="capacity" id="capacity" value="<?php setValue($formdata, 'capacity'); ?>" />

                        <div class="error">
                            <span id="capacityError">
<?php if (isset($errors['capacity'])) echo $errors['capacity']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Engine Size" type="text" reg="engineSize" id="engineSize" value="<?php setValue($formdata, 'engineSize'); ?>" />
                        <div class="error">
                            <span id="engineSizeError">
<?php if (isset($errors['engineSize'])) echo $errors['engineSize']; ?>

                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Purchase Date    (YYYY-MM-DD)" reg="purchaseDate" id="purchaseDate" value="<?php setValue($formdata, 'purchaseDate'); ?>" />
                        <div class="error">
                            <span id="purchaseDateError">
<?php if (isset($errors['purchaseDate'])) echo $errors['purchaseDate']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Service Date       (YYYY-MM-DD)" reg="serviceDate" id="serviceDate" value="<?php setValue($formdata, 'serviceDate'); ?>" />
                        <div class="error">
                            <span id="serviceDateError">
<?php if (isset($errors['serviceDate'])) echo $errors['serviceDate']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Garage ID" type="text" reg="gid" id="gid" value="<?php setValue($formdata, 'gid'); ?>" />
                        <div class="error">
                            <span id="gidError">
<?php if (isset($errors['gid'])) echo $errors['gid']; ?>

                            </span>
                        </div>
                    </div>





                    <Button type="submit" class="btn btn-primary" reg="submit" value="Submit" id="submit"> Submit </button>

                </form>
            </div>
        </div>

    </body>

</html>