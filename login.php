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
        if ($user == null || $password !== $user->getPassword() ) {
            $errors['username'] = "Username or Passwrod is incorrect";
        } 
    }

    if (!empty($errors)) {
        throw new Exception("Error Encountered! See Below.");
    }

    //create new user, add to db
    $_SESSION['user'] = $user;

//redirect to index when reg + logged in

    header('Location: index.php');
} catch (Exception $ex) {
    // if exception occurs then extract message
    // and send the user the
    //login form
    $errorMessage = $ex->getMessage();
    require 'loginform.php';
}
?>
