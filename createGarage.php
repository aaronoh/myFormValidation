<?php

require_once 'garage.php';
require_once 'garagesTableGateway.php';
require_once 'dbconnection.php';
require_once 'validateGarage.php';
require_once 'loginhelper.php';

$formdata = array();
$errors = array();

start_session();
//if user is not logged in redirect them to the log in form 
if (!is_logged_in()) {
    header("Location: login_form.php");
}

//validate the data entered using the validate function in the validateBus.php file
validate($formdata, $errors);
//if the validation is passed (errors array empty) set each variable to the valuye of the coresponding variable in the formdata array
if (empty($errors)) {
    $name = $formdata['name'];
    $managername = $formdata['managername'];
    $address = $formdata['address'];
    $email = $formdata['email'];
    $phone = $formdata['phone'];
    $openinghours = $formdata['openinghours'];
    $openingdate = $formdata['openingdate'];
    //make a new garage object with the data above, set id to -1 becasue it is ai in database
    $garage = new Garage(-1, $name, $address, $email, $phone, $openingdate, $openinghours, $managername);
    //initialize db connection
    $dbconnection = dbconnection::getConnection();
    //connect to the garage table through the garageTableGateway  using the connection above
    $gateway = new garageTableGateway($dbconnection);

    $id = $gateway->insertGarage($garage);
    //when completed redirect user to viewall
    header('Location: viewallgarages.php');
} else {
    //if an error occurs redisplay the create form
    require 'createGarageForm.php';
}
?>
