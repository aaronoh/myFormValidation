<?php

require_once 'garagestablegateway.php';
require_once 'dbconnection.php';
//If the page is accessed without an id in the get array, die
if (!isset($_GET['id'])) {
    die("Illegal Request");
}
$id = $_GET['id'];
//establish db connection
$dbconnection = dbconnection::getConnection();
//conect to database via gateway using the connection
$gateway = new garageTableGateway($dbconnection);
//execute the delete bus function passing in the id
$gateway->deleteGarage($id);
//redirect user to viewall garages on deletion
header('Location: viewallgarages.php');
