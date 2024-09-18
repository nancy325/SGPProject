<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["firstname"]) || !isset($_SESSION["email"]) || !isset($_COOKIE["firstname"]) || !isset($_COOKIE["email"])) {
    header("Location: login.php");
    exit;
}

?>