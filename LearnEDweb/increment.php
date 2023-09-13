<?php
session_start();
$user_name = $_SESSION['user_name'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_sample_db"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$updateQuery = "UPDATE users SET Score = Score + 1 WHERE user_name = ?";
$stmt = $conn->prepare($updateQuery);

if ($stmt) {
    $stmt->bind_param("s", $user_name); // "s" indicates a string
    $stmt->execute();
    $stmt->close();
} else {
    $response = array('error' => 'Query preparation failed');
    echo json_encode($response);
    exit; 
}
$query = "SELECT Score FROM users WHERE user_name = '$user_name'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$score = $row['Score'];
    header('Content-Type: application/json');
    echo json_encode(array('score' => $score));
} else {
	echo "User not found or score not available.";
}

$conn->close();
?>