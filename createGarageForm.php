<?php
require_once 'loginhelper.php';
require_once 'validateGarage.php';

start_session();

if (!is_logged_in()) {
    header("Location: loginform.php");
}

$user = $_SESSION['user'];

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
        <script src="validate.js"></script>

    </head>

    <body>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <?php require 'header.php'; ?>
        <div class="conntainer">
            <h1 class="editheader col-lg-3 col-lg-offset-5">Create Garage Form</h1>
            <div class="col-lg-2 col-lg-offset-5">

                <form class="form-group" action="createGarage.php" method="post">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="<?php setValue($formdata, 'name'); ?>" />
                        <div class="error">
                            <span id="nameError">
                                <?php if (isset($errors['name'])) echo $errors['name']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input class="form-control" type="text" name="address" id="address" value="<?php setValue($formdata, 'address'); ?>" />
                        <div class="error">
                            <span id="addressError">
                                <?php if (isset($errors['address'])) echo $errors['address']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="<?php setValue($formdata, 'email'); ?>" />

                        <div class="error">
                            <span id="emailError">
                                <?php if (isset($errors['email'])) echo $errors['email']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input class="form-control" type="text" name="phone" id="phone" value="<?php setValue($formdata, 'phone'); ?>" />

                        <div class="error">
                            <span id="phoneError">
                                <?php if (isset($errors['phone'])) echo $errors['phone']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="openinghours">Opening Hours</label>
                        <input class="form-control" type="text" name="openinghours" id="openinghours" value="<?php setValue($formdata, 'openinghours'); ?>" />
                        <div class="error">
                            <span id="openinghoursError">
                                <?php if (isset($errors['openinghours'])) echo $errors['openinghours']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gid">Opening Date</label>
                        <input type="text" class="form-control"  placeholder="YYYY-MM-DD" name="openingdate" id="openingdate" value="<?php setValue($formdata, 'openingdate'); ?>" />
                        <div class="error">
                            <span id="openingdateError">
                                <?php if (isset($errors['openingdate'])) echo $errors['openingdate']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="managername">Manager Name</label>
                        <input class="form-control" type="text" name="managername" id="managername" value="<?php setValue($formdata, 'managername'); ?>" />
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