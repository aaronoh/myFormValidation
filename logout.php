<?php

require_once 'loginhelper.php';
require_once 'user.php';

start_session();

if (!is_logged_in()) {
    header("Location: loginform.php");
} else {
    unset($_SESSION['user']);

    header("Location: loginform.php");
}
?>
