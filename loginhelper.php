<?php

require_once 'user.php';
//function to begin session
function start_session() {
    $id = session_id();
    if ($id === "") {
        session_start();
    }
}
//function to check if user is logged in
function is_logged_in() {
    start_session();
    return (isset($_SESSION['user']));
}

?>