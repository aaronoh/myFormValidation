<?php
require_once 'loginhelper.php';
require_once 'bus.php';
require_once 'dbconnection.php';
require_once 'busTableGateway.php';

start_session();

if (!is_logged_in()) {
    header("Location: loginform.php");
}

$user = $_SESSION['user'];


$dbconnection = dbconnection::getConnection();
$gateway = new BusTableGateway($dbconnection);

$statement = $gateway->getBus();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="deleteConfirm.js"></script>
    </head>
    <body>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <?php require 'header.php'; ?>
        <div class="container">
            <div class="col-lg-12">
                <h1 class="gsheader col-lg-4 col-lg-offset-4">Our Buses</h1>
                <table class ="table table-striped">
                    <thead>
                        <tr>
                            <th>Reg</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Capacity</th>
                            <th>Engine Size</th>
                            <th>Purchase Date</th>
                            <th>Service Date</th>
                            <th>Garage ID</th>
                            <th></th>
                            <th></th>
                            <th><a href="createBusForm.php"><img src ="imgs/add.png"></a><th>
                        </tr>
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        while ($row) {


                            echo '<td>' . $row['reg'] . '</td>';
                            echo '<td>' . $row['make'] . '</td>';
                            echo '<td>' . $row['model'] . '</td>';
                            echo '<td>' . $row['capacity'] . '</td>';
                            echo '<td>' . $row['engineSize'] . '</td>';
                            echo '<td>' . $row['purchaseDate'] . '</td>';
                            echo '<td>' . $row['serviceDate'] . '</td>';
                            echo '<td>' . $row['garageID'] . '</td>';
                            echo '<td>'
                            . '<a href="viewBuses.php?id=' . $row['id'] . '"><img src ="imgs/view.png"></a>'
                            . '</td>';
                            echo '<td>'
                            . '<a href="editBusForm.php?id=' . $row['id'] . '"><img src ="imgs/edit.png"></a>'
                            . '</td>';

                            echo '<td>'
                            . '<a class="delete_btn" href="deleteBus.php?id=' . $row['id'] . '"><img src ="imgs/delete.png"></a>'
                            . '</td>';
                            echo '</tr>';

                            $row = $statement->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                </table>

            </div>
        </div>
        <?php require 'footer.php'; ?>
    </body>
</html>
