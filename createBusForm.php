<?php
require_once 'loginhelper.php';
require_once'dbconnection.php';
require_once 'garagesTableGateway.php';
require_once 'validateBus.php';

//begins session if user is logged in
start_session();
//if user is not logged in, return to  log in form
if (!is_logged_in()) {
    header("Location: loginform.php");
}

$user = $_SESSION['user'];

//function used to set values of the form elements
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
//connect to the garage table through  garageTableGateway using the connection above
$garageGateway = new garageTableGateway($dbconnection);

$garages = $garageGateway->getGarage();
?>
<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Create Bus</title>
        <!--javascript script for form validation-->
        <script src="validateBus.js"></script>
    </head>

    <body>
        <!--Links to my google fonts bootstrap/my own style sheets & javascript scripts-->
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <!--php file which generates the html for my header-->
        <?php require 'header.php'; ?>
        <!--Bootstrap container-->
        <div class="conntainer">
            <!--Page Header-->
            <h1 class="editheader col-lg-3 col-lg-offset-5">Create Bus Form</h1>
            <!--Whole form contained in a grid 2, offset (pushed right) by 5 cols-->
            <div class="col-lg-2 col-lg-offset-5">
                <!--Form actrion is createBus, this sends the data entered in the form to the create bus script-->
                <form class="form-group" action="createBus.php" method="post">
                    <!--Each form element is split into a form group-->
                    <div class="form-group">
                        <label for="reg">Reg</label>
                        <input class="form-control" type="text" name="reg" id="reg" value="<?php setValue($formdata, 'reg'); ?>" />
                        <div class="error">
                            <span id="regError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['reg'])) echo $errors['reg']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a form group-->
                    <div class="form-group">
                        <label for="make">Make</label>
                        <input class="form-control" type="text" name="make" id="make" value="<?php setValue($formdata, 'make'); ?>" />
                        <div class="error">
                            <span id="makeError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['make'])) echo $errors['make']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a form group-->
                    <div class="form-group">
                        <label for="model">Model</label> 
                        <input class="form-control" type="text" name="model" id="model" value="<?php setValue($formdata, 'model'); ?>" />

                        <div class="error">
                            <span id="modelError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['model'])) echo $errors['model']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a form group-->
                    <div class="form-group">
                        <label for="capacity">Capacity</label>
                        <input class="form-control"  type="number" name="capacity" id="capacity" value="<?php setValue($formdata, 'capacity'); ?>" />

                        <div class="error">
                            <span id="capacityError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['capacity'])) echo $errors['capacity']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a form group-->
                    <div class="form-group">
                        <label for="engineSize">Engine Size</label>
                        <input class="form-control"  type="text" name="engineSize" id="engineSize" value="<?php setValue($formdata, 'engineSize'); ?>" />
                        <div class="error">
                            <span id="engineSizeError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['engineSize'])) echo $errors['engineSize']; ?>

                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a form group-->
                    <div class="form-group">
                        <label for="purchaseDate">Purchase Date</label>
                        <input type="text" class="form-control"  placeholder="YYYY-MM-DD" name="purchaseDate" id="purchaseDate" value="<?php setValue($formdata, 'purchaseDate'); ?>" />
                        <div class="error">
                            <span id="purchaseDateError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['purchaseDate'])) echo $errors['purchaseDate']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a form group-->  
                    <div class="form-group">
                        <label for="serviceDate">Service Date</label>
                        <input type="text" class="form-control"  placeholder="YYYY-MM-DD" name="serviceDate" id="serviceDate" value="<?php setValue($formdata, 'serviceDate'); ?>" />
                        <div class="error">
                            <span id="serviceDateError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['serviceDate'])) echo $errors['serviceDate']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a form group-->  
                    <div class="form-group">
                        <label for="gid">Garage</label>
                        <select class="form-control" placeholder="Garage"  name="gid" id="gid">"> 
                            <?php
//                            the select options are populated by the garage name & id of each garage in the web_garage table
                            foreach ($garages as $garage) {
                                echo '<option value="' . $garage['id'] . '">' . $garage['name'] . '</option>';
                            }
                            ?>
                        </select>
                        <div class="error">
                            <span id="gidError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['gid'])) echo $errors['gid']; ?>

                            </span>
                        </div>
                    </div>
                    <!--Submit Button-->
                    <Button type="submit" class="form-btnspcing form-btn" name="submit" value="Submit" id="submit"> Submit </button>
                </form><!--closing form!-->
            </div><!--closing col containing form !-->
        </div><!--closing bootstrap container-->
         <?php require 'footer.php'; ?> <!--php file that generates the html code for my footer!-->
    </body>
</html>