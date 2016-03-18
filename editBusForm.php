<?php
require_once 'bus.php';
require_once 'dbconnection.php';
require_once 'busTableGateway.php';
require_once 'validateBus.php';
require_once 'loginhelper.php';
require_once 'garagesTableGateway.php';
start_session();

if (!is_logged_in()) {
    header("Location: loginform.php");
}

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id'])) {
        die("Illegal Request");
    }
    $id = $_GET['id'];

    $dbconnection = dbconnection::getConnection();
    $gateway = new busTableGateway($dbconnection);
    $statement = $gateway->getBusById($id);

    $garageGateway = new garageTableGateway($dbconnection);

    $garages = $garageGateway->getGarage();

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        die("Illegal Request");
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id'])) {
        die("Illegal request");
    }
    $id = $_POST['id'];
    $dbconnection = dbconnection::getConnection();
    $garageGateway = new garageTableGateway($dbconnection);
    $garages = $garageGateway->getGarage();
    $row = $formdata;
} else {
    die("Illegal request");
}

if (!isset($errors)) {
    $errors = array();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
            <!--Whole form contained in a grid 2, offset (pushed right) by 5 cols-->
            <div class="col-lg-2 col-lg-offset-5">
                <!--Page Header-->
                <h1 class="editheader">Edit Bus Form</h1>
                <?php
                if (isset($errorMessage)) {
                    echo '<p>Error: ' . $errorMessage . '</p>';
                }
                ?>   
                <!--Form action is editeBus, this sends the data entered in the form to the edit bus script-->
                <form action="editBus.php" 
                      method="POST">
                    <!--id is a hidden field, needed so that the data entered can be identified when it is added to a bus object, but not editable by user-->
                    <input type="hidden" name="id" value="<?php echo $id;
                ?>" />
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="reg">Reg</label>
                        <input class="form-control" type="text" placeholder="Reg" name="reg" id="reg" value="<?php echo $row['reg'];
                ?>" />
                        <div class="error">
                            <span id="regError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['reg'])) echo $errors['reg']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="make">Make</label>
                        <input class="form-control" type="text"  placeholder="Make" name="make" id="make" value="<?php echo $row['make'];
                                ?>" />
                        <div class="error">
                            <span id="makeError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['make'])) echo $errors['make']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="model">Model</label> 
                        <input class="form-control" type="text"  placeholder="Model" name="model" id="model" value="<?php echo $row['model'];
                                ?>" />

                        <div class="error">
                            <span id="modelError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['model'])) echo $errors['model']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="capacity">Capacity</label>
                        <input class="form-control"  placeholder="Capacity" type="number" name="capacity" id="capacity" value="<?php echo $row['capacity'];
                                ?>" />

                        <div class="error">
                            <span id="capacityError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['capacity'])) echo $errors['capacity']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="engineSize">Engine Size</label>
                        <input class="form-control" placeholder="Engine Size" type="text" name="engineSize" id="engineSize" value="<?php echo $row['engineSize'];
                                ?>" />
                        <div class="error">
                            <span id="engineSizeError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['engineSize'])) echo $errors['engineSize']; ?>

                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="purchaseDate">Purchase Date</label>
                        <input type="text" class="form-control"  placeholder="Purchase Date    (YYYY-MM-DD)" name="purchaseDate" id="purchaseDate" value="<?php echo $row['purchaseDate'];
                                ?>" />
                        <div class="error">
                            <span id="purchaseDateError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['purchaseDate'])) echo $errors['purchaseDate']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="serviceDate">Service Date</label>
                        <input type="text" class="form-control"  placeholder="Service Date       (YYYY-MM-DD)" name="serviceDate" id="serviceDate" value="<?php echo $row['serviceDate'];
                                ?>" />
                        <div class="error">
                            <span id="serviceDateError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['serviceDate'])) echo $errors['serviceDate']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="gid">Garage</label>
                        <select class="form-control" placeholder="Garage"  name="gid" id="gid">"> 
                            <!--the select options are populated by the garage name & id of each garage in the web_garage table
                            The currently selected option is also meant to be auto selected when a bus is clicked on for editing but this is currently not working.-->
                            <?php
                            foreach ($garages as $garage) {
                                if ($garage['id'] === $row['gid']) {
                                    $selected = 'selected="selected"';
                                } else {
                                    $selected = '';
                                }
                                echo '<option value="' . $garage['id'] . '" ' . $selected . '>' . $garage['name'] . '</option>';
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