<?php

require_once 'bustablegateway.php';
require_once 'dbconnection.php';

if(!isset($_GET['id'])){
    die("Illegal Request");
}
$id = $_GET['id'];

$dbconnection = dbconnection::getConnection();

$gateway = new busTableGateway($dbconnection);

$gateway->deleteBus($id);

header('Location: viewallbuses.php');