<?php

require_once 'user.php';

function start_session() {
    $id = session_id();
    if ($id === "") {
        session_start();
    }
}

function is_logged_in() {
    start_session();
    return (isset($_SESSION['user']));
}

?>