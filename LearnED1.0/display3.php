<?php
	if (!empty($_SESSION['user_name'])) {
		header("location:login.php");
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
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>

<body>

	<!-- NAVIGATION -->
	<header id="header">
		<nav>
			<div class="logo"><img src="images/icon/logo.png" alt="logo"></div>
			<ul>
				<li><a class="active" href="index.php">Home</a></li>
				<li><a href="index.php">About</a></li>
				<li><a href="index.php">Classes</a></li>
				<li><a href="index.php">Contact</a></li>
				<li><a href="index.php">Feedback</a></li>
			</ul>
			<div><form action="logout.php" method="post"><button type="submit">Log Out</button></form></div>
		</nav>
		</nav>

	</header>

	<!-- header-->
	<div class="title">
		<span>3rd Grade<br> on LearnEd</span>
	</div>
	<!-- cours list-->
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
<br><br>
	<form>
		<label for="course" class="title2" >select a Course</label>
		<select id="course" name="course">
			<?php
        // Iterate over the first 9 course names
        $limitedCourses = array_slice($courseNames, 17, 7);
        
        foreach ($limitedCourses as $courseName) {
            echo "<option value=\"$courseName\">$courseName</option>";
        }
        ?>
		</select>
	</form>

	<div id="courseDetails">
		<!-- Course details will be displayed here using JavaScript -->
	</div>

	<script>
		const courseDropdown = document.getElementById('course');
		const courseDetailsDiv = document.getElementById('courseDetails');

		courseDropdown.addEventListener('change', function () {
			const selectedCourse = courseDropdown.value;

			// Use AJAX or fetch API to retrieve course details from the server
			// and update the courseDetailsDiv with the fetched data
			// Example:
			fetch('get_course_details.php?course=' + encodeURIComponent(selectedCourse))
				.then(response => response.text())
				.then(data => {
					courseDetailsDiv.innerHTML = data;
				})
				.catch(error => {
					console.error('Error:', error);
				});
		});
	</script>
	<!-- end cours -->
	<!--Courses de plus-->
	<div class="inbt">
		connaisance de bases
	</div>

	<div class="ccard">
		<center>
			<div class="ccardbox">
				<div class="dcard">
					<div class="fpart"><img src="images/courses/base1ere.png"></div>
					<a href="">
						<div class="spart">2 Courses <img src="images/icon/dropdown.png"></div>
					</a>
				</div>
				<div class="dcard">
					<div class="fpart"><img src="images/courses/base1ere.png"></div>
					<a href="">
						<div class="spart">2 Courses <img src="images/icon/dropdown.png"></div>
					</a>
				</div>

			</div>
		</center>
	</div>


	<!-- Videos pedagogique 2eme Année -->
	<div class="title2">
		<span>Contenu Youtube pedagogique</span>
		<div class="shortdesc2">
			<p>Pour un contenu plus interactif</p>
		</div>
	</div>

	<center>
		<div class="ccardbox2">
			<div class="dcard2"><span class="tag">4/8</span>
				<div class="fpart2">
					<img src="" alt="cours1">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/hplb18WyUuU"
						title="YouTube video player" frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag">4/8</span>
				<div class="fpart2">
					<img src="" alt="cours1">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/hplb18WyUuU"
						title="YouTube video player" frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag">4/8</span>
				<div class="fpart2">
					<img src="" alt="cours1">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/hplb18WyUuU"
						title="YouTube video player" frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						allowfullscreen></iframe>
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
					<a href="#"><img src="images/icon\fb.png"></a>
					<a href="#"><img src="images/icon\insta.png"></a>
					<a href="#"><img src="images/icon\tt.png"></a>
					<a href="#"><img src="images/icon\ytube.png"></a>
					<a href="#"><img src="images/icon\linkedin.png"></a>
				</div><br><br>
				<p class="rights-text">Copyright © 2021 All Rights Reserved.
				</p>
				<br>
				<p><img src="images/icon/location.png"> locaion</p>
				<br>
				<p><img src="images/icon/phone.png"> +216-11111111<br><img src="images/icon/mail.png">&nbsp;
					learnED@email.com</p>
			</div>
			<div class="right-col">
				<h1 style="color: #fff">Our Newsletter</h1>
				<div class="border"></div><br>
				<p>Enter Your Email to get our News and updates.</p>
				<form class="newsletter-form">
					<input class="txtb" type="email" placeholder="Enter Your Email">
					<input class="btn" type="submit" value="Submit">
				</form>
			</div>
		</div>
	</footer>

</body>

</html>