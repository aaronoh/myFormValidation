<?php
require_once'dbconnection.php';
require_once 'GarageTableGateway.php';

if(!isset($_GET['GarageID'])){
    die("Illegal Request");
}
$id = $_GET['GarageID'];
        
$dbconnection = dbconnection::getConnection();
$gateway = new garageTableGateway($dbconnection);

$statement = $gateway->getGarageById($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
if(!$row){
    die("Illegal Request");
}
?>
