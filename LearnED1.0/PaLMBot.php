<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" type="png" href="images/icon/favicon.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LearnEd</title>
	<meta name="desciption" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="subjects.css">
	<script type="text/javascript" src="script.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>


<body>
	<!-- NAVIGATION -->
	<header id="header">
		<nav>
			<div class="logo"><a href="index.php" ><img src="images/icon/logo.png" alt="logo"></a></div>
			<ul>
				<li><a class="active" href="index.php">Home</a></li>
				<li><a href="index.php#about_section">About</a></li>
				<li><a href="index.php#classes_section">Classes</a></li>
				<li><a href="index.php#contactus_section">Contact</a></li>
				<li><a href="index.php#feedBACK">Feedback</a></li>
			</ul>
			<a class="get-started" href="logout.php">Logout</a>
		</nav>
	</header>
    <?php
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

    // Query the database to fetch course names
    $query = "SELECT DISTINCT name FROM courses";
    $result = $conn->query($query);
    $courseNames = [];

    while ($row = $result->fetch_assoc()) {
        $courseNames[] = $row['name'];
    }

    // Close the database connection
    $conn->close();
    ?>

	<!-- cours de base -->
	<div class="title">
		<span>PaLM API BOT <br> ON LearnEd</span>
		<p class="shortdesc"> Select a Course</p>
	</div>
	<br><br>
	<!-- course_title select form -->
	<form>
		<label for="course" class="title2" >select a Course</label>
		<select id="course" name="course">
		<?php
        // Iterate over the first 9 course names
        $limitedCourses = array_slice($courseNames, 0, 49);
        foreach ($limitedCourses as $courseName) {
            echo "<option value=\"$courseName\">$courseName</option>";
        }
        ?>
		</select>
	</form>
    <div>
    </div>
    <br><br><br>
    <div id="ChatResponseDiv"></div><br><br>
    <button id="QuizButton">Ask</button><br><br>
    <div id="Quizbox" ></div><br><br>
    <input  style="float: left;" "text" id="userInput" placeholder="..............................................."><br><br>
    <button id="AnswerButton">Answer</button><br><br>
    <div id="chatbox" ></div><br><br>

    

<script>
	const courseDropdown = document.getElementById('course');
    const ChatResponseDiv = document.getElementById('ChatResponseDiv');
    const QuizButton = document.getElementById('QuizButton');
    const AnswerButton = document.getElementById('AnswerButton');
    const Quizbox = document.getElementById('Quizbox');
    const chatbox = document.getElementById('chatbox');
    const userInput = document.getElementById('userInput');
    let selectedCourse ='';
    let bot_quiz = "";
    let bot_answer = "";
	courseDropdown.addEventListener('change', function() {
        selectedCourse = courseDropdown.value;
        if (selectedCourse !== "") {
            fetch('PaLM.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
				},
				body: JSON.stringify({selectedCourse}),
			})
            .then(response => response.json()) 
            .then(data => {
                const courseElement = document.createElement('pre');
                courseElement.textContent = data.bot_response;
                ChatResponseDiv.appendChild(courseElement);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });

    QuizButton.addEventListener('click', () => {
		if (selectedCourse !== "") {
			fetch('PaLMQuiz.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
				},
				body: JSON.stringify({selectedCourse}),
			})
			.then(response => response.json())
			.then(data => {
				console.log(data.bot_quiz);
				display_quiz(data.bot_quiz);
				bot_quiz = data.bot_quiz ;
			})
			.catch(error => {
				console.error('Error:', error);
			});
		}
	});

    function display_quiz(bot_quiz) {
        const QuizElement = document.createElement('pre');
        if (bot_quiz === '') {
            bot_quiz = 'api error';
        }  
        QuizElement.textContent = bot_quiz;
        Quizbox.appendChild(QuizElement);
    }

    AnswerButton.addEventListener('click', () => {
        const userMessage = userInput.value;
		if (userMessage !== "" && bot_quiz !=="") {
			fetch('PaLMAnswer.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
				},
				body: JSON.stringify({bot_quiz:bot_quiz,userMessage:userMessage}),
			})
			.then(response => response.json())
			.then(data => {
				console.log(data.bot_answer);
				display_answer(data.bot_answer);
				bot_answer = data.bot_answer ;
			})
			.catch(error => {
				console.error('Error:', error);
			});
		}else {
            console.log("quiz or input not found");
        }
        userInput.value = '';
	});


    function display_answer(bot_answer) {
        const AnswerElement = document.createElement('pre');
        if (bot_answer === '') {
            bot_answer = 'api error';
        }  
        AnswerElement.textContent = bot_answer;
        chatbox.appendChild(AnswerElement);
    }

</script>
