<?php
session_start(); // Start the session
include("functions.php");
$con = connectToDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['user_name1'];
    $password = $_POST['password1'];
    $query = "SELECT * FROM users WHERE user_name = '$user_name'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $user_data = mysqli_fetch_assoc($result);

        if ($user_data) {
            // Compare the plain text password with the one from the database
            if ($password === $user_data['password']) {
                $_SESSION['user_name'] = $user_name;
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid login credentials.";
                header("Location: login.php?error=" . urlencode($error));
                exit();
            }
        } else {
            $error = "User not found.";
            header("Location: login.php?error=" . urlencode($error));
            exit();
        }
    } else {
        $error = "Database query error.";
        header("Location: login.php?error=" . urlencode($error));
        exit();
    }
}
?>
