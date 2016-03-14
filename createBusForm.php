<?php
require_once 'loginhelper.php';
require_once'dbconnection.php';
require_once 'garagesTableGateway.php';
require_once 'busTableGateway.php';

require_once 'validateBus.php';

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


$dbconnection = dbconnection::getConnection();

$garageGateway = new garageTableGateway($dbconnection);

$garages = $garageGateway->getGarage();
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
        <script src="validateBus.js"></script>
    </head>

    <body>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <div class="conntainer">
            <h1>Create Bus Form</h1>
            <div class="col-lg-2 col-lg-offset-5">

                <form class="form-horizontal" action="createBus.php" method="post">

                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Reg" name="reg" id="reg" value="<?php setValue($formdata, 'reg'); ?>" />
                        <div class="error">
                            <span id="regError">
                                <?php if (isset($errors['reg'])) echo $errors['reg']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text"  placeholder="Make" name="make" id="make" value="<?php setValue($formdata, 'make'); ?>" />
                        <div class="error">
                            <span id="makeError">
                                <?php if (isset($errors['make'])) echo $errors['make']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">

                        <input class="form-control" type="text"  placeholder="Model" name="model" id="model" value="<?php setValue($formdata, 'model'); ?>" />

                        <div class="error">
                            <span id="modelError">
                                <?php if (isset($errors['model'])) echo $errors['model']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control"  placeholder="Capacity" type="number" name="capacity" id="capacity" value="<?php setValue($formdata, 'capacity'); ?>" />

                        <div class="error">
                            <span id="capacityError">
                                <?php if (isset($errors['capacity'])) echo $errors['capacity']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Engine Size" type="text" name="engineSize" id="engineSize" value="<?php setValue($formdata, 'engineSize'); ?>" />
                        <div class="error">
                            <span id="engineSizeError">
                                <?php if (isset($errors['engineSize'])) echo $errors['engineSize']; ?>

                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Purchase Date    (YYYY-MM-DD)" name="purchaseDate" id="purchaseDate" value="<?php setValue($formdata, 'purchaseDate'); ?>" />
                        <div class="error">
                            <span id="purchaseDateError">
                                <?php if (isset($errors['purchaseDate'])) echo $errors['purchaseDate']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Service Date       (YYYY-MM-DD)" name="serviceDate" id="serviceDate" value="<?php setValue($formdata, 'serviceDate'); ?>" />
                        <div class="error">
                            <span id="serviceDateError">
                                <?php if (isset($errors['serviceDate'])) echo $errors['serviceDate']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" placeholder="Garage"  name="gid" id="gid">"> 
                             <?php
                                    foreach ($garages as $garage) {
                                        echo '<option value="'.$garage['id'].'">'.$garage['name'].'</option>';
                                    }
                                    ?>
                        </select>
                        <div class="error">
                            <span id="gidError">
                                <?php if (isset($errors['gid'])) echo $errors['gid']; ?>

                            </span>
                        </div>
                    </div>





                    <Button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit"> Submit </button>

                </form>
            </div>
        </div>

    </body>

</html>