<?php
require_once 'loginhelper.php';
require_once 'validateGarage.php';
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
?>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Create Garage</title>
        <!--javascript script for form validation-->
        <script src="validate.js"></script>

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
            <h1 class="editheader col-lg-3 col-lg-offset-5">Create Garage Form</h1>
            <!--Whole form contained in a grid 3, offset (pushed right) by 5 cols-->
            <div class="col-lg-2 col-lg-offset-5">
                <!--Form action is createGarage, this sends the data entered in the form to the create garage script-->
                <form action="createGarage.php" method="post">
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="<?php setValue($formdata, 'name'); ?>" />
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
                        <input class="form-control" type="text" name="address" id="address" value="<?php setValue($formdata, 'address'); ?>" />
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
                        <input class="form-control" type="email" name="email" id="email" value="<?php setValue($formdata, 'email'); ?>" />

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
                        <input class="form-control" type="text" name="phone" id="phone" value="<?php setValue($formdata, 'phone'); ?>" />

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
                        <input class="form-control" type="text" name="openinghours" id="openinghours" value="<?php setValue($formdata, 'openinghours'); ?>" />
                        <div class="error">
                            <span id="openinghoursError">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['openinghours'])) echo $errors['openinghours']; ?>
                            </span>
                        </div>
                    </div>
                    <!--Each form element is split into a for group-->
                    <div class="form-group">
                        <label for="gid">Opening Date</label>
                        <input type="text" class="form-control"  placeholder="YYYY-MM-DD" name="openingdate" id="openingdate" value="<?php setValue($formdata, 'openingdate'); ?>" />
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
                        <input class="form-control" type="text" name="managername" id="managername" value="<?php setValue($formdata, 'managername'); ?>" />
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