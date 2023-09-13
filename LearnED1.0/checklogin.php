<?php
session_start(); // Start the session
include("functions.php");
$con = connectToDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['user_name1'];
    $password = $_POST['password1'];
    $query = "SELECT * FROM users WHERE user_name = '$user_name' && password ='$password'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $user_data = mysqli_fetch_assoc($result);

        if ($user_data) {
            $validUser = ($user_name === $user_data['user_name'] && $password === $user_data['password']);

            if ($validUser) {
                $_SESSION['user_name'] = $user_name;
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid login credentials.";
                header("Location: login.php");
                exit();
            }
        } else {
            $error = "User not found.";
            header("Location: login.php");
            exit();
        }
    } else {
        $error = "Database query error.";
        header("Location: login.php");
        exit();
    }
}
?>
