<?php

require_once 'bustablegateway.php';
require_once 'dbconnection.php';
//If the page is accessed without an id in the get array, die
if (!isset($_GET['id'])) {
    die("Illegal Request");
}
$id = $_GET['id'];
//establish db connection
$dbconnection = dbconnection::getConnection();
//conect to database via gateway using the connection
$gateway = new busTableGateway($dbconnection);
//execute the delete bus function passing in the id
$gateway->deleteBus($id);
//redirect user to viewall buses on deletion
header('Location: viewallbuses.php');
