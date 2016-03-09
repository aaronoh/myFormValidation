<?php

require_once 'garagestablegateway.php';
require_once 'dbconnection.php';

if (!isset($_GET['id'])) {
    die("Illegal Request");
}
$id = $_GET['id'];

$dbconnection = dbconnection::getConnection();

$gateway = new garageTableGateway($dbconnection);

$gateway->deleteGarage($id);

header('Location: viewallgarages.php');
