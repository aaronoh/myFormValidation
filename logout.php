<?php

require_once 'loginhelper.php';
require_once 'user.php';

start_session();
//if user is not loged in, redirect to loginform. Otherwise unset the user object in the session and then redirect to log in form
if (!is_logged_in()) {
    header("Location: loginform.php");
} else {
    unset($_SESSION['user']);

    header("Location: loginform.php");
}
?>
