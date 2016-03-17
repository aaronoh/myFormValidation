<?php

require_once 'garage.php';
require_once 'garagesTableGateway.php';
require_once 'dbconnection.php';
require_once 'validateGarage.php';
require_once 'loginhelper.php';

$formdata = array();
$errors = array();

start_session();

if (!is_logged_in()) {
    header("Location: login_form.php");
}

validate($formdata, $errors);

if (empty($errors)) {
    $id = $_POST['id'];
    $name = $formdata['name'];
    $managername = $formdata['managername'];
    $address = $formdata['address'];
    $email = $formdata['email'];
    $phone = $formdata['phone'];
    $openinghours = $formdata['openinghours'];
    $openingdate = $formdata['openingdate'];

    $garage = new Garage($id, $name, $address, $email, $phone, $openingdate, $openinghours, $managername);

    $dbconnection = dbconnection::getConnection();

    $gateway = new garageTableGateway($dbconnection);

    $id = $gateway->update($garage);

    header('Location: viewallgarages.php');
} else {
    require 'editGarageForm.php';
}
?>