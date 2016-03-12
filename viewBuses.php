<?php
require_once 'loginhelper.php';
require_once 'dbconnection.php';
require_once 'busTableGateway.php';

start_session();


if (!is_logged_in()) {
    header("Location: loginform.php");
}

$user = $_SESSION['user'];

if (!isset($_GET['id'])) {
    die("Illegal Request");
}
$id = $_GET['id'];

$dbconnection = dbconnection::getConnection();
$gateway = new BusTableGateway($dbconnection);

$statement = $gateway->getBusById($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Illegal Request");
}
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
        <div class="col-lg-10 col-lg-offset-1">
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
                    </tr>
                    <?php
                    echo '<td>' . $row['reg'] . '</td>';
                    echo '<td>' . $row['make'] . '</td>';
                    echo '<td>' . $row['model'] . '</td>';
                    echo '<td>' . $row['capacity'] . '</td>';
                    echo '<td>' . $row['engineSize'] . '</td>';
                    echo '<td>' . $row['purchaseDate'] . '</td>';
                    echo '<td>' . $row['serviceDate'] . '</td>';
                    echo '<td>' . $row['garageID'] . '</td>';
                    echo '<td>'
                    . '<a href="editBusForm.php?id=' . $row['id'] . '"><img src ="imgs/edit.png"></a>'
                    . '</td>';

                    echo '<td>'
                    . '<a class="delete_btn" href="deleteBus.php?id=' . $row['id'] . '"><img src ="imgs/delete.png"></a>'
                    . '</td>';
                    echo '</tr>';
                    ?>
            </table>

        </div>
    </body>
</html>
