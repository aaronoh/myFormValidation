<?php
require_once 'garage.php';
require_once 'garagesTableGateway.php';
require_once 'dbconnection.php';
require_once 'process.php';

$formdata = array();
$errors = array();

if(empty($errors)){
$id = $_POST['id'];
$name = $_POST['name'];
$mname = $_POST['managername'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$ophrs = $_POST['openinghours'];
$opdate = $_POST['openingdate'];

$garage = new Garage($id, $name, $address, $email, $phone, $opdate, $ophrs, $mname );

$dbconnection = dbconnection::getConnection();

$gateway = new garageTableGateway($dbconnection);

$id = $gateway->update($garage);
        
header('Location: viewallgarages.php');
}
else{
    require 'editGarageForm.php';
}
?>