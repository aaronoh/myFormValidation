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
    </head>
    <body>

        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <?php require 'header.php'; ?>
        <div class="conntainer">
            <div class="col-lg-2 col-lg-offset-5">
                <h1>Edit Bus Form</h1>
                <?php
                if (isset($errorMessage)) {
                    echo '<p>Error: ' . $errorMessage . '</p>';
                }
                ?>   
                <form action="editBus.php" 
                      method="POST" class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id;
                ?>" />

                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Reg" name="reg" id="reg" value="<?php echo $row['reg'];
                ?>" />
                        <div class="error">
                            <span id="regError">
                                <?php if (isset($errors['reg'])) echo $errors['reg']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text"  placeholder="Make" name="make" id="make" value="<?php echo $row['make'];
                                ?>" />
                        <div class="error">
                            <span id="makeError">
                                <?php if (isset($errors['make'])) echo $errors['make']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">

                        <input class="form-control" type="text"  placeholder="Model" name="model" id="model" value="<?php echo $row['model'];
                                ?>" />

                        <div class="error">
                            <span id="modelError">
                                <?php if (isset($errors['model'])) echo $errors['model']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control"  placeholder="Capacity" type="number" name="capacity" id="capacity" value="<?php echo $row['capacity'];
                                ?>" />

                        <div class="error">
                            <span id="capacityError">
                                <?php if (isset($errors['capacity'])) echo $errors['capacity']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Engine Size" type="text" name="engineSize" id="engineSize" value="<?php echo $row['engineSize'];
                                ?>" />
                        <div class="error">
                            <span id="engineSizeError">
                                <?php if (isset($errors['engineSize'])) echo $errors['engineSize']; ?>

                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Purchase Date    (YYYY-MM-DD)" name="purchaseDate" id="purchaseDate" value="<?php echo $row['purchaseDate'];
                                ?>" />
                        <div class="error">
                            <span id="purchaseDateError">
                                <?php if (isset($errors['purchaseDate'])) echo $errors['purchaseDate']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Service Date       (YYYY-MM-DD)" name="serviceDate" id="serviceDate" value="<?php echo $row['serviceDate'];
                                ?>" />
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
                                echo '<option value="' . $garage['id'] . '">' . $garage['name'] . '</option>';
                            }
                            ?>
                        </select>
                        <div class="error">
                            <span id="gidError">
                                <?php
                                foreach ($garages as $garage) {
                                    if ($garagee['id'] === $row['gid']) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                    echo '<option value="' . $garage['id'] . '" ' . $selected . '>' . $garage['name'] . '</option>';
                                }
                                ?>

                            </span>
                        </div>
                    </div>





                    <Button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit"> Submit </button>

                </form>
            </div>
        </div>

    </body>

</html>