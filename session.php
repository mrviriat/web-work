<?php

session_start();

function isUserLoggedIn() {
    return isset($_SESSION['user']);
}

function logOut() {
    session_destroy();
}

?>