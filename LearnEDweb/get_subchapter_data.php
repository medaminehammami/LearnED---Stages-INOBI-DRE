<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LearnED";

// Check if 'subchapter' parameter exists in the query string
if (isset($_GET['subchapter']) && !empty($_GET['subchapter'])) {
    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the selected subchapter_title from the query string
    $selectedSubchapter = "%" . $_GET['subchapter'] . "%"; // Add wildcards to the input

    // Prepare and execute the SQL query to fetch subchapter data with LIKE
    $sql = "SELECT * FROM LearnED WHERE subchapter_title LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedSubchapter);
    $stmt->execute();
    if ($stmt->error) {
        die("Database error: " . $stmt->error);
    }

    // Fetch the results into an array
    $subchapterData = array();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $subchapterData[] = $row;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();

    // Return the subchapter data as JSON
    header('Content-Type: application/json');
    echo json_encode(array('subchapterData' => $subchapterData));
} else {
    // Handle the case when 'subchapter' parameter is missing or empty
    echo json_encode(array('error' => 'Subchapter parameter missing or empty'));
}
?>
