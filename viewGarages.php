<?php
require_once 'loginhelper.php';
require_once'dbconnection.php';
require_once 'garagesTableGateway.php';
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

$garageGateway = new garageTableGateway($dbconnection);
$busGateway = new busTableGateway($dbconnection);


$garages = $garageGateway->getGarageById($id);
$buses = $busGateway->getBusesByGarageId($id);


//if (!$garages) {
//    die("Illegal Request");
//}
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
        <?php require 'header.php'; ?>
        <div class="col-lg-10 col-lg-offset-1">
            <table class ="table table-striped">
                <thead>
                    <tr>
                        <th><a href="viewallgarages.php"><img src ="imgs/back.png"></a><th>
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
                    $garage = $garages->fetch(PDO::FETCH_ASSOC);
                    echo '<td>' . '</td>';
                    echo '<td>' . '</td>';
                    echo '<td>' . $garage['name'] . '</td>';
                    echo '<td>' . $garage['address'] . '</td>';
                    echo '<td>' . $garage['email'] . '</td>';
                    echo '<td>' . $garage['phone'] . '</td>';
                    echo '<td>' . $garage['openingdate'] . '</td>';
                    echo '<td>' . $garage['openinghours'] . '</td>';
                    echo '<td>' . $garage['managername'] . '</td>';
                    echo '<td>'
                    . '<a href="editGarageForm.php?id=' . $garage['id'] . '"><img src ="imgs/edit.png"></a>'
                    . '</td>';
                    echo '<td>'
                    . '<a class="delete_btn" href="deleteGarage.php?id=' . $garage['id'] . '"><img src ="imgs/delete.png"></a>'
                    . '</td>';

                    echo '</tr>';
                    ?>
            </table>
            <div class="col-lg-10 col-lg-offset-1 busesingaragestbl">
                <h4>Buses Assigned to our <?php echo $garage['name']; ?> Garage:</h4>
                <br>
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
                        </tr>
                        <?php
                        $bus = $buses->fetch(PDO::FETCH_ASSOC);
                        while ($bus) {
                            echo '<tr>';
                            echo '<td>' . $bus['reg'] . '</td>';
                            echo '<td>' . $bus['make'] . '</td>';
                            echo '<td>' . $bus['model'] . '</td>';
                            echo '<td>' . $bus['capacity'] . '</td>';
                            echo '<td>' . $bus['engineSize'] . '</td>';
                            echo '<td>' . $bus['purchaseDate'] . '</td>';
                            echo '<td>' . $bus['serviceDate'] . '</td>';
                            echo '<td>'
                            . '<a href="viewBuses.php?id=' . $bus['id'] . '"><img src ="imgs/view.png"></a>'
                            . '</td>';
                            echo '<td>'
                            . '<img src ="imgs/edit_notdone.png"></a>'
                            //. '<a href="editBusForm.php?id=' . $bus['id'] . '"><img src ="imgs/edit.png"></a>'
                            . '</td>';

                            echo '<td>'
                            . '<a class="delete_btn" href="deleteBus.php?id=' . $bus['id'] . '"><img src ="imgs/delete.png"></a>'
                            . '</td>';
                            echo '</tr>';
                            $bus = $buses->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                </table>
            </div>
        </div>
        <div class="spacing"></div>
        <?php require 'footer.php'; ?>
    </body>
</html>