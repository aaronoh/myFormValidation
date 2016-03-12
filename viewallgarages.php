<?php
require_once 'loginhelper.php';
require_once 'garage.php';
require_once 'dbconnection.php';
require_once 'garagesTableGateway.php';

start_session();

if (!is_logged_in()) {
    header("Location: loginform.php");
}

$user = $_SESSION['user'];


$dbconnection = dbconnection::getConnection();
$gateway = new garageTableGateway($dbconnection);

$statement = $gateway->getGarage();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="deleteConfirm.js"></script>
    </head>
    <body>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <?php require 'header.php'; ?>
        <div class="viewgstbl col-lg-8 col-lg-offset-2">
            
            <h1 class="gsheader col-lg-4 col-lg-offset-4">Our Garages</h1>
            <!--<hr class="col-lg-3 col-lg-offset-4">-->
            <p class="col-lg-offset-11 add"><a href ="createBusForm.php"><img src ="imgs/add.png"></a></p>
            <table class ="table table-striped">
                <thead>
                    <tr class="gtbheadings">
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
                        . '<a href="viewGarages.php?id=' . $row['id'] . '"><img src ="imgs/view.png"></a>'
                        . '</td>';
                        echo '<td>'
                        . '<a href="editGarageForm.php?id=' . $row['id'] . '"><img src ="imgs/edit.png"></a>'
                        . '</td>';

                        echo '<td>'
                        . '<a class="delete_btn" href="deleteGarage.php?id=' . $row['id'] . '"><img src ="imgs/delete.png"></a>'
                        . '</td>';
                        echo '</tr>';

                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
            </table>
        </div>
    </body>
</html>
