<?php
require_once 'garage.php';
require_once 'garagesTableGateway.php';
require_once 'dbconnection.php';
require_once 'validateGarage.php';

$formdata = array();
$errors = array();

validate($formdata, $errors);

if(empty($errors)){
$id = $_POST['id'];
$name = $_POST['name'];
$managername = $_POST['managername'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$openinghours = $_POST['openinghours'];
$openingdate = $_POST['openingdate'];

$garage = new Garage($id, $name, $address, $email, $phone, $openingdate, $openinghours, $managername );

$dbconnection = dbconnection::getConnection();

$gateway = new garageTableGateway($dbconnection);

$id = $gateway->update($garage);
        
header('Location: viewallgarages.php');
}
else{
    require 'editGarageForm.php';
}
?>