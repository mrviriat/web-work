<?php
// session_start();
include('session.php');

echo "<!DOCTYPE html>\n<html><head>";

require_once 'functions.php';
$userstr = ' (Guest)';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $_CURRENT = $user;
    $loggedin = TRUE;
    $userstr = " ($user)";
} else
    $loggedin = FALSE;

echo "<title>$appname$userstr</title><link rel='stylesheet'" .
    "href='customeStyleTable.css' type='text/css'>" .
    "</head><body><center><canvas id='logo' width='624' " .
    "height='96'>$appname</canvas></center>" .
    "<div class='appname'>$appname$userstr</div>" .
    "<script src='javascript.js'></script>";

if (!$loggedin) {
    echo ("<br><ul class='menu'>" .
        "<li><a href='/'>Home</a></li>" .
        "<li><a href='signup.php'>Sign up</a></li>" .
        "<li><a href='login.php'>Log in</a></li></ul><br>" .
        "<span class='info'>&#8658; You must be logged in to " .
        "view this page.</span><br><br>");
}
?>