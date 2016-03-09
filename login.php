<?php

require_once 'loginhelper.php';
require_once 'user.php';
require_once 'dbconnection.php';
require_once 'UserTableGateway.php';

start_session();

// try to register the user - if there are any error/
// exception, catch it and send the user back to the
// login form with an error message
try {
    $formdata = array();
    $errors = array();

    $input_method = INPUT_POST;

    $formdata['username'] = filter_input($input_method, "username", FILTER_SANITIZE_STRING);
    $formdata['password'] = filter_input($input_method, "password", FILTER_SANITIZE_STRING);

    // throw an exception if any fields empty
    if (empty($formdata['username'])) {
        $errors['username'] = "Username required";
    }


    if (empty($formdata['password'])) {
        $errors['password'] = "Password required";
    }
    if (empty($errors)) {
        // store entered data in variables
        $username = $formdata['username'];
        $password = $formdata['password'];

        //retrieve users
        $connection = dbconnection::getConnection();
        $userTable = new UserTable($connection);
        $user = $userTable->getUserByUsername($username);

        //check if user already registered
        if ($user == null) {
            $errors['username'] = "Username is not registered";
        } else {
            if ($password !== $user->getPassword()) {
                $errors['password'] = "Password is incorrect";
            }
        }
    }

    if (!empty($errors)) {
        throw new Exception("There were errors. Please fix them.");
    }

    //create new user, add to db
    $_SESSION['user'] = $user;

//redirect to index when reg + logged in

    header('Location: index.php');
} catch (Exception $ex) {
    // if an exception occurs then extract the message
    // from the exception and send the user the
    // registration form
    $errorMessage = $ex->getMessage();
    require 'loginform.php';
}
?>
