<?php

require_once 'bus.php';
require_once 'busTableGateway.php';
require_once 'dbconnection.php';
require_once 'validateBus.php';

$formdata = array();
$errors = array();

validate($formdata, $errors);

if (empty($errors)) {
    $reg = $formdata['reg'];
    $make = $formdata['make'];
    $model = $formdata['model'];
    $capacity = $formdata['capacity'];
    $engineSize = $formdata['engineSize'];
    $purchaseDate = $formdata['purchaseDate'];
    $serviceDate = $formdata['serviceDate'];
    $gid = $formdata['gid'];

    $bus = new Bus(-1, $reg, $make, $model, $capacity, $engineSize, $purchaseDate, $serviceDate, $gid);

    $dbconnection = dbconnection::getConnection();

    $gateway = new busTableGateway($dbconnection);

    $id = $gateway->insertBus($bus);

    header('Location: viewallbuses.php');
} else {
    require 'createBusForm.php';
}
?>