<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'garage.php';
require_once 'dbconnection.php';
require_once 'garagesTableGateway.php';


$dbconnection = dbconnection::getConnection();
$gateway = new garageTableGateway($dbconnection);

$statement = $gateway->getGarage();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="deleteConfirm.js"></script>
    </head>
    <body>
      
        <table class =" pure-table test">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Opening Date</th>
                    <th>Opening Hours</th>
                    <th>Manager Name</th>
                </tr>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {

                    
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['phone'] . '</td>';
                    echo '<td>' . $row['openingdate'] . '</td>';
                    echo '<td>' . $row['openinghours'] . '</td>';
                    echo '<td>' . $row['managername'] . '</td>';
                    echo '<td>'
                    .'<a href="viewGarages.php?id=' .$row['id'].'">View</a>'
                    .'</td>';
                     echo '<td>'
                    .'<a href="editGarageForm.php?id=' .$row['id'].'">Edit</a>'
                    .'</td>';
                    
                    echo '<td>'
                    .'<a class="delete_btn" href="deleteGarage.php?id=' .$row['id'].'">Delete</a>'
                    .'</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
        </table>
        <p><a href ="createGarageForm.php">Add Garage</a></p>
    </body>
</html>
