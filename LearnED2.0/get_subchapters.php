<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LearnED";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectedChapter = $_GET['chapter'];

$sql = "SELECT DISTINCT subchapter_title FROM LearnED WHERE chapter_title = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $selectedChapter);
$stmt->execute();

$subchapters = array();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $subchapters[] = $row;
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode(array('subchapters' => $subchapters));
?>
