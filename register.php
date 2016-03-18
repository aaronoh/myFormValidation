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
    $formdata['password2'] = filter_input($input_method, "password2", FILTER_SANITIZE_STRING);

    // throw an exception if any of the form fields 
    // are empty
    if (empty($formdata['username'])) {
        $errors['username'] = "Username required";
    }

    if (empty($_POST['password'])) {
        $errors['password'] = "Please Enter a Password";
    }
    if (empty($formdata['password2'])) {
        $errors['password2'] = "Please Confirm Your Password";
    }
    // if the password fields do not match 
    // then throw an exception
    if (!empty($formdata['password']) && !empty($formdata['password2']) && $formdata['password'] != $formdata['password2']) {
        $errors['password'] = "Passwords do not match";
    }

    if (empty($errors)) {
        // since none of the form fields were empty, 
        // store the form data in variables
        $username = $formdata['username'];
        $password = $formdata['password'];
        $password2 = $formdata['password2'];

        // create a UserTable object and use it to retrieve 
        // the users
        $connection = dbconnection::getConnection();
        $userTable = new UserTable($connection);
        $user = $userTable->getUserByUsername($username);

        // since password fields match, see if the username
        // has already been registered - if it is then throw
        // and exception
        if ($user != null) {
            $errors['username'] = "This username is taken";
        }
    }

    if (!empty($errors)) {
        throw new Exception();
    }

    // since the username is not aleady registered, create
    // a new User object, add it to the database using the
    // UserTable object, and store it in the session array
    $user = new User(null, $username, $password, "user");
    $id = $userTable->insert($user);
    $user->setId($id);
    $_SESSION['user'] = $user;
    //once logged in redirect to home
    header('Location: index.php');
} catch (Exception $ex) {
    // if an exception occurs then extract message, redisplay registration form
    $errorMessage = $ex->getMessage();
    require 'registerform.php';
}
?>
