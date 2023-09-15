<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LearnED";

if (isset($_GET['subchapter']) && !empty($_GET['subchapter'])) {
    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $selectedSubchapter = "%" . $_GET['subchapter'] . "%"; // Add wildcards to the input

    $sql = "SELECT * FROM LearnED WHERE subchapter_title LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedSubchapter);
    $stmt->execute();
    if ($stmt->error) {
        die("Database error: " . $stmt->error);
    }

    $subchapterData = array();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $subchapterData[] = $row;
    }

    $stmt->close();
    $conn->close();

    header('Content-Type: application/json');
    echo json_encode(array('subchapterData' => $subchapterData));
} else {
    echo json_encode(array('error' => 'Subchapter parameter missing or empty'));
}
?>
