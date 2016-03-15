<?php
require_once 'loginhelper.php';
require_once 'dbconnection.php';
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

$garages = $garageGateway->getGarageByBusId($id);
$buses = $busGateway->getBusById($id);


if (!$buses) {
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
        <div class="container">
        <div class="col-lg-12 col-lg-offset-1">
            <table class ="table table-striped">
                <thead>
                    <tr>

                        <th><a href="viewallbuses.php"><img src ="imgs/back.png"></a><th>
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
                    $bus = $buses->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>' . '</td>';
                    echo '<td>' . '</td>';
                    echo '<td>' . $bus['reg'] . '</td>';
                    echo '<td>' . $bus['make'] . '</td>';
                    echo '<td>' . $bus['model'] . '</td>';
                    echo '<td>' . $bus['capacity'] . '</td>';
                    echo '<td>' . $bus['engineSize'] . '</td>';
                    echo '<td>' . $bus['purchaseDate'] . '</td>';
                    echo '<td>' . $bus['serviceDate'] . '</td>';
                    echo '<td>' . $bus['garageID'] . '</td>';
                    echo '<td>'
                    . '<a href="editBusForm.php?id=' . $bus['id'] . '"><img src ="imgs/edit.png"></a>'
                    . '</td>';

                    echo '<td>'
                    . '<a class="delete_btn" href="deleteBus.php?id=' . $bus['id'] . '"><img src ="imgs/delete.png"></a>'
                    . '</td>';
                    echo '</tr>';
                    ?>
            </table>
        </div>
            <?php $garage = $garages->fetch(PDO::FETCH_ASSOC);?>
            <h4>This bus is assigned to our <?php echo $garage['name']; ?> Garage:</h4>
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
                    
                    while ($garage) {
                        echo '<tr>';
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
                        $garage = $garages->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
            </table>

        </div>
        </div>
        <div class="spacing"></div>
<?php require 'footer.php'; ?>
    </body>
</html>
