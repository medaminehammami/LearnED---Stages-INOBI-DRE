<!DOCTYPE html>
<html>
<head>
    <title>Display Courses</title>
    <style>
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

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "courses";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM courses WHERE name = '$selectedCourse'";
    $result = $conn->query($query);

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
       
    }
    $conn->close();
}
?>
</body>

</html>