<?php
require_once 'loginhelper.php';
require_once 'garage.php';
require_once 'dbconnection.php';
require_once 'garagesTableGateway.php';

start_session();
//if user is not logged in, return to  log in form
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
        <!--javascript script for delete confirmation -->
        <script src="deleteConfirm.js"></script>
    </head>
    <body>
         <!--Links to my google fonts bootstrap/my own style sheets & javascript scripts-->
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <?php require 'header.php'; ?>
        <!--bootstrap container-->
         <div class="container">
            <div class="col-lg-12">
                <!--Page Header-->
                <h1 class="gsheader col-lg-3 col-lg-offset-5">Our Garages</h1>
                <!--table headings including add button-->
                <table class ="col-lg-12 table table-striped">
                    <thead>
                        <tr class="gtbheadings">

                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Opening Date</th>
                            <th>Opening Hours</th>
                            <th>Manager Name</th>
                            <th></th>
                            <th></th>
                            <th><a href="createGarageForm.php"><img src ="imgs/add.png"></a><th>
                        </tr>
                        <?php
                        //echo out table data using each element of the garage object, while there are garages in the db
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        while ($row) {


                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['address'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . $row['phone'] . '</td>';
                            echo '<td>' . $row['openingdate'] . '</td>';
                            echo '<td>' . $row['openinghours'] . '</td>';
                            echo '<td>' . $row['managername'] . '</td>';
//                            view/edit/delete image links
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
        </div>
        <?php require 'footer.php'; ?> <!--php file that generates the html code for my footer!-->
    </body>
</html>
