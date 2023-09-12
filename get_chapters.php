<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LearnED";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected course from the query string
$selectedCourse = $_GET['course'];

// Prepare and execute the SQL query to fetch chapter titles
$sql = "SELECT DISTINCT chapter_title FROM LearnED WHERE course_title = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $selectedCourse);
$stmt->execute();

// Fetch the results into an array
$chapters = array();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $chapters[] = $row;
}

// Close the database connection
$stmt->close();
$conn->close();

// Return the chapter titles as JSON
header('Content-Type: application/json');
echo json_encode(array('chapters' => $chapters));
?>
