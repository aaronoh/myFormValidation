<?php

require_once 'bus.php';
require_once 'busTableGateway.php';
require_once 'dbconnection.php';
require_once 'validateBus.php';
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
    $reg = $formdata['reg'];
    $make = $formdata['make'];
    $model = $formdata['model'];
    $capacity = $formdata['capacity'];
    $engineSize = $formdata['engineSize'];
    $purchaseDate = $formdata['purchaseDate'];
    $serviceDate = $formdata['serviceDate'];
    $gid = $formdata['gid'];
    //make a new bus object with the data above, set id to -1 becasue it is ai in database
    $bus = new Bus(-1, $reg, $make, $model, $capacity, $engineSize, $purchaseDate, $serviceDate, $gid);
    //initialize db connection
    $dbconnection = dbconnection::getConnection();
    //connect to the bus table through  busTableGateway using the connection above
    $gateway = new busTableGateway($dbconnection);
    //execute the update function in the bustablegateway using the object created above
    $id = $gateway->insertBus($bus);
    //when completed redirect user to viewall
    header('Location: viewallbuses.php');
} else {
    //if an error occurs redisplay the create form
    require 'createBusForm.php';
}
?>