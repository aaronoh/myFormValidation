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

//validate the data entered using the validate function in the validateGarage.php file
validate($formdata, $errors);
//if the validation is passed (errors array empty) set each variable to the valuye of the coresponding variable in the formdata array
if (empty($errors)) {
    $id = $_POST['id'];
    $name = $formdata['name'];
    $managername = $formdata['managername'];
    $address = $formdata['address'];
    $email = $formdata['email'];
    $phone = $formdata['phone'];
    $openinghours = $formdata['openinghours'];
    $openingdate = $formdata['openingdate'];
    //make a new garage object with the data above
    $garage = new Garage($id, $name, $address, $email, $phone, $openingdate, $openinghours, $managername);
    //initialize db connection
    $dbconnection = dbconnection::getConnection();
    //connect to the bus table through  garageTableGateway using the connection above
    $gateway = new garageTableGateway($dbconnection);
    //execute the update function in the garagetablegateway using the object created above
    $id = $gateway->update($garage);
    //when completed redirect user to viewall
    header('Location: viewallgarages.php');
} else {
    //if an error occurs redisplay the edit form
    require 'editGarageForm.php';
}
?>