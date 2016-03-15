<?php

require_once 'bus.php';
require_once 'busTableGateway.php';
require_once 'dbconnection.php';
require_once 'validateBus.php';

$formdata = array();
$errors = array();


validate($formdata, $errors);
if (empty($errors)) {
    $id = $_POST['id'];
    $reg = $_POST['reg'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $capacity = $_POST['capacity'];
    $engineSize = $_POST['engineSize'];
    $purchaseDate = $_POST['purchaseDate'];
    $serviceDate = $_POST['serviceDate'];
    $gid = $_POST['gid'];

    $bus = new Bus($id, $reg, $make, $model, $capacity, $engineSize, $purchaseDate, $serviceDate, $gid);

    $dbconnection = dbconnection::getConnection();

    $gateway = new busTableGateway($dbconnection);

    $id = $gateway->updateBus($bus);



    header('Location: viewallbuses.php');
} else {
    require 'editBusForm.php';
}
?>