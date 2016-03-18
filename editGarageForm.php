<?php
require_once 'garage.php';
require_once 'dbconnection.php';
require_once 'garagesTableGateway.php';
require_once 'validateGarage.php';
require_once 'loginhelper.php';
start_session();

//if user is not logged in, return to  log in form
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
         <!--javascript script for form validation-->
        <script src="validate.js"></script>
        <title></title>
    </head>
    <body>
        <!--Links to my google fonts bootstrap/my own style sheets & javascript scripts-->
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <!--php file which generates the html for my header-->
        <?php require 'header.php'; ?>
        <!--Bootstrap container-->
        <div class="conntainer">
            <!--Whole form contained in a grid 3, offset (pushed right) by 4 cols-->
            <div class="col-lg-3 col-lg-offset-4">
                <!--Page Header-->
                <h1 class="editheader">Edit Garage Form</h1>
                <?php
                if (isset($errorMessage)) {
                    echo '<p>Error: ' . $errorMessage . '</p>';
                }
                ?>  
                <!--Form actrion is editGarage, this sends the data entered in the form to the edit garage script-->
                <form action="editGarage.php" 
                      method="POST">
                    <!--id is a hidden field, needed so that the data entered can be identified when it is added to a garage object, but not editable by user-->
                    <input type="hidden" name="id" value="<?php echo $id;
                ?>" />
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" placeholder="Name" name="name" id="name" value="<?php echo $row['name'];
                ?>" />
                        <div class="error">
                            <span id="nameError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['name'])) echo $errors['name']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input class="form-control" type="text"  placeholder="Address" name="address" id="address" value="<?php echo $row['address'];
                                ?>" />
                        <div class="error">
                            <span id="addressError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['address'])) echo $errors['address']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="email">Email</label> 
                        <input class="form-control" type="text"  placeholder="Email" name="email" id="email" value="<?php echo $row['email'];
                                ?>" />

                        <div class="error">
                            <span id="emailError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['email'])) echo $errors['email']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input class="form-control"  placeholder="Phone" type="text" name="phone" id="phone" value="<?php echo $row['phone'];
                                ?>" />

                        <div class="error">
                            <span id="phoneError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['phone'])) echo $errors['phone']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="openinghours">Opening Hours</label>
                        <input class="form-control" placeholder="Opening Hours" type="text" name="openinghours" id="openinghours" value="<?php echo $row['openinghours'];
                                ?>" />
                        <div class="error">
                            <span id="openinghoursError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['openinghours'])) echo $errors['openinghours']; ?>

                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="openingdate">Opening Date</label>
                        <input type="text" class="form-control"  placeholder="(YYYY-MM-DD)" name="openingdate" id="openingdate" value="<?php echo $row['openingdate'];
                                ?>" />
                        <div class="error">
                            <span id="openingdateError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['openingdate'])) echo $errors['openingdate']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="managername">Manager Name</label>
                        <input type="text" class="form-control"  placeholder="Manager Name" name="managername" id="managername" value="<?php echo $row['managername'];
                                ?>" />
                        <div class="error">
                            <span id="managernameError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['managername'])) echo $errors['managername']; ?>
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