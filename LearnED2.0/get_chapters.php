<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LearnED";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectedCourse = $_GET['course'];

$sql = "SELECT DISTINCT chapter_title FROM LearnED WHERE course_title = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $selectedCourse);
$stmt->execute();

$chapters = array();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $chapters[] = $row;
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode(array('chapters' => $chapters));
?>
