<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="shortcut icon" type="png" href="images/icon/favicon.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>LearnEd</title>
	<meta name="desciption" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="subjects.css">
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="class.js"></script>
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
	$dbname = "LearnED";

	// Create a new connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check the connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	// Query the database to fetch course_title
	$query = "SELECT DISTINCT course_title FROM LearnED";
	$result = $conn->query($query);
	$courseNames = [];
	while ($row = $result->fetch_assoc()) {
		$courseNames[] = $row['course_title'];
	}
	// Close the database connection
	$conn->close();
	?>
	<!-- cours de base -->
	<div class="title">
		<span> الصف الرابع<br> مع  LearnEd</span>
		<p class="shortdesc">حدد المسار الذي تريده</p>
	</div>
	<br><br>
	<!-- course_title select form -->
	<form dir="rtl">
		<label for="course" id="label">:حدد الدرس</label>
		<select id="course" name="course">
			<!-- Options for course titles will be dynamically populated -->
			<?php
			// Iterate over the first 9 course names
			$limitedCourses = array_slice($courseNames, 24, 12);
			
			foreach ($limitedCourses as $courseName) {
				echo "<option value=\"$courseName\">$courseName</option>";
			}
            ?>	
		</select>
		<br>
		<label for="chapter" id="label">:حدد فصلا</label>
		<select id="chapter" name="chapter">
			<!-- Options for chapter titles will be dynamically populated based on the selected course -->
		</select>
		<br>

		<label for="subchapter" id="label">حدد فصلا فرعيا:</label>
		<select id="subchapter" name="subchapter">
			<!-- Options for subchapter titles will be dynamically populated based on the selected chapter -->
		</select>
	</form>

	<!-- Data View here-->

	<div id=courseTitleDiv dir="rtl"> </div>
	<div id=chapterTitleDiv dir="rtl"> </div>
	<div id=subchapterTitleDiv dir="rtl"> </div>
	<div id="courseDetailsDiv" dir="rtl"><!-- Course details will be displayed here using JavaScript --></div>
	<br>
	<div style="background: linear-gradient(to left,  #fff, #f7e1e9);" dir="rtl">
		<p id="Question">:سؤال</p>		
		<div id="QuestionDetailsDiv" dir="rtl">
			<!-- Answer details will be displayed here using JavaScript -->
		</div>
		<div id="answerContainer" dir="rtl">
			<!-- Answer details will be displayed here using JavaScript -->
			<label for="answerChoicesDropdown">:حدد إجابة</label>
			<select id="answerChoicesDropdown" name="answerChoicesDropdown">
			<!-- Options for chapter titles will be dynamically populated based on the selected course -->
			</select>
			<br>
			<button id="checkAnswerButton">تحقق من الإجابة</button>
			<br><br><br><br>
    		<p id="answerResult">=نتيجة</p>
			<br>
			<div dir="rtl">
			<!-- Score View -->
			<?php
				$user_name = $_SESSION['user_name'];
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "login_sample_db"; 
				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$query = "SELECT Score FROM users WHERE user_name = '$user_name'";
				$result = $conn->query($query);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$score = $row['Score'];
					echo "<p> عدد النقاط :</p>" . $score;
				} else {
					echo "User not found or score not available.";
				}
				$conn->close();
			?>	
			</div>	
		</div>
	</div>	
	<!-- AI QUIZZ PART  -->
	<h1 dir="rtl" id="quizz_title">اختبار بالذكاء الاصطناعي</h1><br>
    <button id="generateButton" >قم بإجراء اختبار </button><br>
    <div id="quizzbox" dir="rtl"></div>
    <br><br><br>
    <input type="text" id="userInput" placeholder="...................................................... اكتب الإجابات المقترحة "><br><br>
    <button id="sendButton" >إرسال</button><br><br>
    <div id="chatbox" dir="rtl"></div>
	<!-- Videos pedagogique  -->
	<div class="title2" dir="rtl">
		<span >محتوى يوتيوب تربوي</span>
		<div class="shortdesc2" >
			<p> لمزيد من المحتوى التفاعلي</p>
		</div>
	</div>
	<br>
	<center>
		<div class="ccardbox2">
			<div class="dcard2"><span class="tag">1/3</span>
				<div class="fpart2">
					<img src="" alt="cours1">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/hplb18WyUuU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag">2/3</span>
				<div class="fpart2">
					<img src="" alt="cours1">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/hplb18WyUuU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag">3/3</span>
				<div class="fpart2">
					<img src="" alt="cours1">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/hplb18WyUuU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</center>
	<br><br>



	<!-- FOOTER -->
	<footer>
		<div class="footer-container">
			<div class="left-col">
				<img src="images/icon/logo - Copy.png" style="width: 200px;">
				<div class="logo"></div>
				<div class="social-media">
					<a href="http://www.esprit.tn/"><img src="images/icon\fb.png"></a>
					<a href="http://www.esprit.tn/"><img src="images/icon\insta.png"></a>
					<a href="http://www.esprit.tn/"><img src="images/icon\tt.png"></a>
					<a href="http://www.esprit.tn/"><img src="images/icon\ytube.png"></a>
					<a href="http://www.esprit.tn/"><img src="images/icon\linkedin.png"></a>
				</div><br><br>
				<p class="rights-text">Copyright © 2023 All Rights Reserved.
				</p>
				<br>
				<p><img src="images/icon/location.png"> 1, Pôle Technologique, 2 Rue André Ampère، Ariana 2083 </p>
				<br>
				<p><img src="images/icon/phone.png"> +216-70250000<br><img src="images/icon/mail.png">&nbsp;
					medamine.hammami@esprit.tn</p>
			</div>
			<div class="right-col">
				<h1 style="color: #fff" dir="rtl">نشرتنا  البريدية</h1>
				<div class="border" dir="rtl"></div><br>
				<p dir="rtl">أدخل بريدك الإلكتروني للحصول على أخبارنا وتحديثاتنا.</p>
				<form class="newsletter-form">
					<input class="txtb" type="email" placeholder="Enter Your Email">
					<input class="btn" type="submit" value="Submit">
				</form>
			</div>
		</div>
	</footer>

</body>

</html>