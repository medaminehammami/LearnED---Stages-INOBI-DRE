<?php
function connectToDatabase() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "login_sample_db";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Set charset and collation
    mysqli_set_charset($con, "utf8");
    return $con;
}


