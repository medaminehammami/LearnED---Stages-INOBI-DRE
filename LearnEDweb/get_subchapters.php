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

// Get the selected chapter from the query string
$selectedChapter = $_GET['chapter'];

// Prepare and execute the SQL query to fetch subchapter titles
$sql = "SELECT DISTINCT subchapter_title FROM LearnED WHERE chapter_title = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $selectedChapter);
$stmt->execute();

// Fetch the results into an array
$subchapters = array();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $subchapters[] = $row;
}

// Close the database connection
$stmt->close();
$conn->close();

// Return the subchapter titles as JSON
header('Content-Type: application/json');
echo json_encode(array('subchapters' => $subchapters));
?>
