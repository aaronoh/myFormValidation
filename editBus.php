<?php

require_once 'loginhelper.php';
require_once 'bus.php';
require_once 'busTableGateway.php';
require_once 'dbconnection.php';
require_once 'validateBus.php';

start_session();

if (!is_logged_in()) {
    header("Location: login_form.php");
}

$formdata = array();
$errors = array();


validate($formdata, $errors);
if (empty($errors)) {
    $id = $_POST['id'];
    $reg = $formdata['reg'];
    $make = $formdata['make'];
    $model = $formdata['model'];
    $capacity = $formdata['capacity'];
    $engineSize = $formdata['engineSize'];
    $purchaseDate = $formdata['purchaseDate'];
    $serviceDate = $formdata['serviceDate'];
    $gid = $formdata['gid'];

    $bus = new Bus($id, $reg, $make, $model, $capacity, $engineSize, $purchaseDate, $serviceDate, $gid);

    $dbconnection = dbconnection::getConnection();

    $gateway = new busTableGateway($dbconnection);

    $id = $gateway->updateBus($bus);



    header('Location: viewallbuses.php');
} else {
    require 'editBusForm.php';
}
?>