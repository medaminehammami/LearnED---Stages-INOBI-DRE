<?php
	session_start(); // Start the session

	if(isset($_SESSION['user_name'])) {
		$userName = $_SESSION['user_name'];
		echo "Welcome, $userName!";
	} else {
		echo "Please log in.";
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
	<script type="text/javascript" src="script.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script>
		$(window).on('scroll', function() {
			if ($(window).scrollTop()) {
				$('nav').addClass('black');
			} else {
				$('nav').removeClass('black');
			}
		})
	</script>
</head>

<body>
	<!-- Navigation Bar -->
	<header id="header">
		<nav>
			<div class="logo"><img src="images/icon/logo.png" alt="logo"></div>
			<ul>
				<li><a class="active" href="">Home</a></li>
				<li><a href="#about_section">About</a></li>
				<li><a href="#classes_section">Classes</a></li>
				<li><a href="#contactus_section">Contact</a></li>
				<li><a href="#feedBACK">Feedback</a></li>
			</ul>
			<div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="images/icon/search.png" alt="search" onclick=slide()></div>
			<a class="get-started" href="login.php">Get Started</a>
			<a class="get-started" href="PaLMBot.php">PaLM BOT</a>
		</nav>

		<div class="head-container">
			<div class="quote">
				<p>Welcome to Our Free AI-Powered e-Learning Platform for Primary School Kids!</p>
				<h5>Education is a fundamental right, and we believe that access to quality learning should be available
					to everyone. That's why we've created this platform to provide free, engaging, and personalized
					educational content for primary school kids in Tunisia.</h5>
				<div class="play">
					<img src="images/icon/play.png" alt="play"><span><a href="https://youtu.be/JgZ2L8ctFB0" target="_blank">Watch Now</a></span>
				</div>
			</div>
			<div class="svg-image">
				<img src="images/extra/svg1.jpg" alt="svg">
			</div>
		</div>
	</header>
	<!-- ABOUT -->
	<div class="diffSection" id="about_section">
		<center>
			<p style="font-size: 50px; padding: 100px">What is LearnED for ?</p>
		</center>
		<div class="about-content">
			<div class="side-image">
				<img class="sideImage" src="images/extra/e3.jpg">
			</div>
			<div class="side-text">
				<h2>General Purpose</h2>
				<p>The primary purpose of the application is to
					assist elementary school students studying in
					Tunisia by providing them with a web-based
					platform that automatically generates
					pedagogically sound educational content. The
					application aims to enhance their learning
					experience, engagement, and understanding of
					various subjects.</p>
			</div>
		</div>
	</div>
	<!-- Classes -->
	<div class="title" id="classes_section">
		<br><br>
		<span>Classes available on LearnEd</span>
	</div>
	<br><br>
	<div class="course">
		<center>
			<div class="cbox">
				<div class="det"><a href="display.php"><img src="images/courses/1ere.png"><br>1ére Année</a></div>
				<div class="det"><a href="display2.php"><img src="images/courses/2eme.png"><br>2eme Année</a></div>
				<div class="det"><a href="display3.php"><img src="images/courses/3eme.png"><br>3eme Année</a></div>
			</div>
			<div class="cbox">
				<div class="det"><a href="display4.php"><img src="images/courses/4eme.png"><br>4eme Année</a></div>
				<div class="det"><a href="display5.php"><img src="images/courses/5eme.png"><br>5eme Année</a></div>
				<div class="det"><a href="display6.php"><img src="images/courses/6eme.png"><br>6eme Année</a></div>
			</div>
		</center>
	</div>



	<!-- PORTFOLIO -->
	<div class="diffSection" id="portfolio_section">
		<center>
			<p style="font-size: 50px; padding: 100px; padding-bottom: 40px;">Portfolio</p>
		</center>
		<div class="content">
			<p>
				“Education is the passport to the future, for tomorrow belongs to those who prepare for it today.” “Your
				attitude, not your aptitude, will determine your altitude.” “If you think education is expensive, try
				ignorance.” “The only person who is educated is the one who has learned how to learn …and change.”
			</p>
		</div>
	</div>

	<div class="extra">
		<p>We're increasing this data every year</p>
		<div class="smbox">
			<span>
				<center>
					<div class="data">154</div>
					<div class="det">Enrolled Students</div>
				</center>
			</span>
			<span>
				<center>
					<div class="data">62</div>
					<div class="det">Total Courses</div>
				</center>
			</span>
			<span>
				<center>
					<div class="data">56</div>
					<div class="det">Placed Students</div>
				</center>
			</span>
			<span>
				<center>
					<div class="data">27</div>
					<div class="det">Total Projects</div>
				</center>
			</span>
		</div>
	</div>


	<!-- TEAM -->
	<div class="diffSection" id="team_section">
		<center>
			<p style="font-size: 50px; padding-top: 100px; padding-bottom: 60px;">Why Choose Our Platform?</p>
		</center>
		<div class="totalcard">
			<div class="card">
				<center><img src="images/icon/ai-icon.png"></center>
				<center>
					<div class="card-title">AI-Powered</div>
					<div id="detail">
						<p>“ Our platform utilizes cutting-edge Artificial Intelligence to generate interactive and
							tailor-made courses based on the official pedagogical planning set by the Tunisian
							government “</p>
					</div>
				</center>
			</div>
			<div class="card">
				<center><img src="images/icon/experience-icon.png"></center>
				<center>
					<div class="card-title">Engaging Learning Experience</div>
					<div id="detail">
						<p>“ Our platform offers a dynamic and fun learning environment that sparks curiosity and
							nurtures a love for knowledge.“</p>
					</div>
				</center>
			</div>
			<div class="card">
				<center><img src="images/icon/verif.png"></center>
				<center>
					<div class="card-title">Curriculum Aligned</div>
					<div id="detail">
						<p>“Our content is aligned with the national curriculum, making it an excellent supplementary
							resource for your child's education journey. “</p>
					</div>
				</center>
			</div>
			<div class="card">
				<center><img src="images/icon/accessible-icon.png"></center>
				<center>
					<div class="card-title">Accessible Anywhere, Anytime</div>
					<div id="detail">
						<p>“ Learning shouldn't be limited to the classroom. With our web-based platform, your child can
							explore and learn at their own pace from the comfort of home or on the go. “</p>
					</div>
				</center>
			</div>
		</div>
	</div>


	<!-- CONTACT US -->
	<div class="diffSection" id="contactus_section">
		<center>
			<p style="font-size: 50px; padding: 100px">Contact Us</p>
		</center>
		<div class="csec"></div>
		<div class="back-contact">
			<div class="cc">
				<form action="mailto:LearnEDk9419@gmail.com" method="post" enctype="text/plain">
					<label>First Name <span class="imp">*</span></label><label style="margin-left: 185px">Last Name
						<span class="imp">*</span></label><br>
					<center>
						<input type="text" name="fname" style="margin-right: 10px; width: 175px" required="required"><input type="text" name="lname" style="width: 175px" required="required"><br>
					</center>
					<label>Email <span class="imp">*</span></label><br>
					<input type="email" name="mail" style="width: 100%" required="required"><br>
					<label>Message <span class="imp">*</span></label><br>
					<input type="text" name="message" style="width: 100%" required="required"><br>
					<label>Additional Details</label><br>
					<textarea name="addtional"></textarea><br>
					<button type="submit" id="csubmit">Send Message</button>
				</form>
			</div>
		</div>
	</div>


	<!-- FEEDBACK -->
	<div class="title2" id="feedBACK">
		<span>Give Feedback</span>
		<div class="shortdesc2">
			<p>Please share your valuable feedback to us</p>
		</div>
	</div>

	<div class="feedbox">
		<div class="feed">
			<form action="mailto:LearnEDk9419@gmail.com" method="post" enctype="text/plain">
				<label>Your Name</label><br>
				<input type="text" name="" class="fname" required="required"><br>
				<label>Email</label><br>
				<input type="email" name="mail" required="required"><br>
				<label>Additional Details</label><br>
				<textarea name="addtional"></textarea><br>
				<button type="submit" id="csubmit">Send Message</button>
			</form>
		</div>
	</div>

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
