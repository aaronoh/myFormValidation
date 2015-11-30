<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'garage.php';
require_once 'dbconnection.php';
require_once 'garagesTableGateway.php';

$connection = dbconnection::getConnection();
$gateway = new GarageTableGateway($connection);

$statement = $gateway->getGarageById($id);
?>  
<html>
<!--    <head>
        <script type="text/javascript" src="js/programmer.js"></script>
        <title></title>
    </head>-->
    <body>
        <table>

                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Name</td>'
                    . '<td>' . $row['name'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Address</td>'
                    . '<td>' . $row['address'] . '</td>';
                    echo '</tr>';
                     echo '<td>Email</td>'
                    . '<td>' . $row['email'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Phone</td>'
                    . '<td>' . $row['phone'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Opening Date</td>'
                    . '<td>' . $row['openingdate'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Opening Hours</td>'
                    . '<td>' . $row['openinghours'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Manager Name</td>'
                    . '<td>' . $row['managername'] . '</td>';
                    echo '</tr>';
                ?>
        </table>
        <p>
    </body>
</html>
