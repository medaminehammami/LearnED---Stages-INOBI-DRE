<?php
session_start(); // Start the session

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

// Clear session cookies
setcookie(session_name(), '', time() - 3600, '/');

// Redirect to a login page or another appropriate page
header("Location: login.php");
exit();
?>