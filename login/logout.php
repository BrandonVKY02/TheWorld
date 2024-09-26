<?php

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();


setcookie(session_name(), '', time() - 3600, '/');
// Redirect to the login page or any other appropriate page
header("Location: login.php");
exit;
?>