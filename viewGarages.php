<?php
require_once 'loginhelper.php';
require_once'dbconnection.php';
require_once 'garagesTableGateway.php';


if (!isset($_GET['id'])) {
    die("Illegal Request");
}
$id = $_GET['id'];

$dbconnection = dbconnection::getConnection();
$gateway = new garageTableGateway($dbconnection);

$statement = $gateway->getGarageById($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Illegal Request");
}
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
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <div class="col-lg-10 col-lg-offset-1">
            <table class ="table table-striped">
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
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['phone'] . '</td>';
                    echo '<td>' . $row['openingdate'] . '</td>';
                    echo '<td>' . $row['openinghours'] . '</td>';
                    echo '<td>' . $row['managername'] . '</td>';
                    echo '<td>'
                    . '<a class="delete_btn" href="deleteGarage.php?id=' . $row['id'] . '">Delete</a>'
                    . '</td>';
                    echo '<td>'
                    . '<a href="editGarageForm.php?id=' . $row['id'] . '">Edit</a>'
                    . '</td>';
                    echo '</tr>';
                    ?>
            </table>
    </body>
</html>