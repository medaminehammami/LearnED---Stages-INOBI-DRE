<?php
session_start();

// Clear_all_session_variables
session_unset();


session_destroy();

// Clear_cookies
setcookie(session_name(), '', time() - 3600, '/');

// Redirect login.php 
header("Location: login.php");
exit();
?>