<?php

require_once 'garage.php';
require_once 'dbconnection.php';
require_once 'garagesTableGateway.php';



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id'])) {
        die("Illegal Request");
    }
    $id = $_GET['id'];

    $dbconnection = dbconnection::getConnection();
    $gateway = new garageTableGateway($dbconnection);
    $statement = $gateway->getGarageById($id);

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if (!row) {
        die("Illegal Request");
    }
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id'])) {
        die("Illegal request");
    }
    $id = $_POST['id'];
    
    $row = $formdata;
}
else {
    die("Illegal request");
}

if (!isset($errors)) {
    $errors = array();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Edit Garage Form</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form action="editGarage.php" 
              method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id'];; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Name: </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $row['name']; ?>" />
                            <span id="nameError" class="error">
                                <?php echoValue($errors, 'name'); ?>
                            </span>
                        </td>
                    </tr>
                    
                     <tr>
                        <td>Manager Name: </td>
                        <td>
                            <input type="text" name="mname" value="<?php echo $row['mname']; ?>" />
                            <span id="mnameError" class="error">
                                <?php echoValue($errors, 'mname'); ?>
                            </span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Address: </td>
                        <td>
                            <input type="text" name="address" value="<?php echo $row['address']; ?>" />
                            <span id="addressError" class="error">
                                <?php echoValue($errors, 'address'); ?>
                            </span>
                        </td>
                    </tr>
                    
                      <tr>
                        <td>eMail: </td>        
                        <td>
                            <input type="email" name="email" value="<?php echo $row['email']; ?>" />
                            <span id="emailError" class="error">
                                <?php echoValue($errors, 'email'); ?>
                            </span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Phone: </td>
                        <td>
                            <input type="text" name="phone" value="<?php echo $row['phone']; ?>" />
                            <span id="phoneError" class="error">
                                <?php echoValue($errors, 'phone'); ?>
                            </span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Opening Hours: </td>
                        <td>
                            <input type="text" name="opdate" value="<?php echo $row['opdate']; ?>" />
                            <span id="opdateError" class="error">
                                <?php echoValue($errors, 'opdate'); ?>
                            </span>
                        </td>
                    </tr>
