<?php
require_once 'loginhelper.php';
require_once 'dbconnection.php';
require_once 'garagesTableGateway.php';
require_once 'busTableGateway.php';

start_session();

//if user is not logged in, return to  log in form
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
//get garage by id based on garageID of bus object
$garages = $garageGateway->getGarageByBusId($id);
//get  bus by id based on the id passed in through the url
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
        <!--javascript script for delete confirmation-->
        <script src="deleteConfirm.js"></script>
    </head>
    <body>
        <!--Links to my google fonts bootstrap/my own style sheets & javascript scripts-->
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <?php require 'header.php'; ?>
        <!--whole page contained in a col 10, offset by one col. Didnt use a container as it was causing issues with grid sizes-->
        <div class="col-lg-10 col-lg-offset-1">
            <!--Page Header-->
             <h1 class="gsheader col-lg-3 col-lg-offset-5">Our Buses</h1>
            <table class ="table table-striped col-lg-12">
                <thead>
                    <tr>
                         <!--table headings including back button--> 
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
//                    echo out table data using each element of the bus object
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
                    //view/edit/delete image links
                    echo '<td>'
                    . '<a href="editBusForm.php?id=' . $bus['id'] . '"><img src ="imgs/edit.png"></a>'
                    . '</td>';

                    echo '<td>'
                    . '<a class="delete_btn" href="deleteBus.php?id=' . $bus['id'] . '"><img src ="imgs/delete.png"></a>'
                    . '</td>';
                    echo '</tr>';
                    ?>
            </table>
             <!--div containing table that displays garage containing bus-->
            <div class="col-lg-10 col-lg-offset-1 busesingaragestbl">
                <?php $garage = $garages->fetch(PDO::FETCH_ASSOC); ?>
                 <!--Table Header-->
                <h4>This bus is assigned to our <?php echo $garage['name']; ?> Garage:</h4>
                <table class ="table table-striped col-lg-8">
                    <thead>
                        <tr>
                             <!--table headings-->
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Manager Name</th>
                        </tr>
                        <?php
                        //echo out table data using each element of the garage object, while there are garages with
                        // the bus id passed through assigned to them(getGarageByBusId)
                        while ($garage) {
                            echo '<td>' . $garage['address'] . '</td>';
                            echo '<td>' . $garage['email'] . '</td>';
                            echo '<td>' . $garage['phone'] . '</td>';
                            echo '<td>' . $garage['managername'] . '</td>';
                            echo '<td>'
                            . '<a href="viewGarages.php?id=' . $garage['id'] . '"><img src ="imgs/view.png"></a>'
                            . '</td>';
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
        <?php require 'footer.php'; ?> <!--php file that generates the html code for my footer!-->
    </body>
</html>
