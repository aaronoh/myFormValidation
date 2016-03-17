<?php
require_once 'garage.php';
require_once 'dbconnection.php';
require_once 'garagesTableGateway.php';
require_once 'validateGarage.php';
require_once 'loginhelper.php';
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
    $gateway = new garageTableGateway($dbconnection);
    $statement = $gateway->getGarageById($id);

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
            <div class="col-lg-3 col-lg-offset-4">
                <h1 class="editheader">Edit Garage Form</h1>
                <?php
                if (isset($errorMessage)) {
                    echo '<p>Error: ' . $errorMessage . '</p>';
                }
                ?>   
                <form action="editGarage.php" 
                      method="POST" class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id;
                ?>" />

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" placeholder="Name" name="name" id="name" value="<?php echo $row['name'];
                ?>" />
                        <div class="error">
                            <span id="nameError">
                                <?php if (isset($errors['name'])) echo $errors['name']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input class="form-control" type="text"  placeholder="Address" name="address" id="address" value="<?php echo $row['address'];
                                ?>" />
                        <div class="error">
                            <span id="addressError">
                                <?php if (isset($errors['address'])) echo $errors['address']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label> 
                        <input class="form-control" type="text"  placeholder="Email" name="email" id="email" value="<?php echo $row['email'];
                                ?>" />

                        <div class="error">
                            <span id="emailError">
                                <?php if (isset($errors['email'])) echo $errors['email']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input class="form-control"  placeholder="Phone" type="text" name="phone" id="phone" value="<?php echo $row['phone'];
                                ?>" />

                        <div class="error">
                            <span id="phoneError">
                                <?php if (isset($errors['phone'])) echo $errors['phone']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="openinghours">Opening Hours</label>
                        <input class="form-control" placeholder="Opening Hours" type="text" name="openinghours" id="openinghours" value="<?php echo $row['openinghours'];
                                ?>" />
                        <div class="error">
                            <span id="openinghoursError">
                                <?php if (isset($errors['openinghours'])) echo $errors['openinghours']; ?>

                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="openingdate">Opening Date</label>
                        <input type="text" class="form-control"  placeholder="(YYYY-MM-DD)" name="openingdate" id="openingdate" value="<?php echo $row['openingdate'];
                                ?>" />
                        <div class="error">
                            <span id="openingdateError">
                                <?php if (isset($errors['openingdate'])) echo $errors['openingdate']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="managername">Manager Name</label>
                        <input type="text" class="form-control"  placeholder="Manager Name" name="managername" id="managername" value="<?php echo $row['managername'];
                                ?>" />
                        <div class="error">
                            <span id="managernameError">
                                <?php if (isset($errors['managername'])) echo $errors['managername']; ?>
                            </span>
                        </div>
                    </div>
                    <Button type="submit" class="form-btnspcing form-btn" name="submit" value="Submit" id="submit"> Submit </button>

                </form>
            </div>
        </div>

    </body>

</html>