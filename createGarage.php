<?php
require_once 'garage.php';
require_once 'garagesTableGateway.php';
require_once 'dbconnection.php';
require_once 'validateGarage.php';

$formdata = array();
$errors = array();

validate($formdata, $errors);

if (empty($errors)) {
    $name = $_POST['name'];
    $mname = $_POST['mname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $ophrs = $_POST['ophrs'];
    $opdate = $_POST['opdate'];

    $garage = new Garage(-1, $name, $address, $email, $phone, $opdate, $ophrs, $mname);

    $dbconnection = dbconnection::getConnection();

    $gateway = new garageTableGateway($dbconnection);

    $id = $gateway->insertGarage($garage);

    header('Location: viewallgarages.php');
} else {
    require 'createProgrammerForm.php';
}
?>
