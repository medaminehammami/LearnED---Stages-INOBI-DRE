<!DOCTYPE html>
<html>
<head>
    <title>Display Courses</title>
    <style>
        /* Define your CSS styles here */
        #courseDetails {
            background-color: #f7f7f7;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        #courseDetails h2 {
            color: #007bff;
            font-size: 24px;
        }

        #courseDetails p {
            line-height: 1.6;
        }

        #courseDetails p.question {
            font-style: italic;
            color: #555;
        }
    </style>
</head>
<body>
<?php
if (isset($_GET['course'])) {
    $selectedCourse = $_GET['course'];

    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "courses";

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query the database to fetch course details based on the selected course
    $query = "SELECT * FROM courses WHERE name = '$selectedCourse'";
    $result = $conn->query($query);

    // Display courses data as HTML
    if ($row = $result->fetch_assoc()) {
        echo "<div id='courseDetails'>";
        echo "<h2>{$row['name']}</h2>";
        echo "<br>";
        echo "<p>" . nl2br($row['body']) . "</p>";
        echo "<br>";
        echo "<h3>Questions and Answers</h3>";
        echo "<p>write down your answers then check if they are correct :</p>";
        echo "<p class='question'>" . nl2br($row['question']) . "</p>";
        echo "</div>";
        // ... You can format and display other data fields
    }

    // Close the database connection
    $conn->close();
}
?>
</body>

</html>