<?php
session_start(); // Start the session
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
			<div class="logo"><a href="index.php" ><img src="images/icon/logo.png" alt="logo"></a></div>
			<ul>
				<li><a class="active" href="">Home</a></li>
				<li><a href="#about_section">About</a></li>
				<li><a href="#classes_section">Classes</a></li>
				<li><a href="#contactus_section">Contact</a></li>
				<li><a href="#feedBACK">Feedback</a></li>
			</ul>
			<div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="images/icon/search.png" alt="search" onclick=slide()></div>
			<?php
			if (isset($_SESSION['user_name'])) {
				echo '<a class="get-started" href="logout.php">Logout</a>';
			} else {
				echo '<a class="get-started" href="login.php">Get Started</a>';
			}
			?>
		</nav>

		<div class="head-container">
			<div class="quote">
				<p dir="rtl">مرحبا بكم في منصة التعلم الإلكتروني المجانية التي تعمل بنظام الذكاء الاصطناعي لأطفال المدارس الابتدائية </p>
				<h5 dir="rtl">التعليم حق أساسي، ونعتقد أن الوصول إلى التعلم الجيد يجب أن يكون متاحا للجميع. لهذا السبب أنشأنا هذه المنصة لتوفير مجانية وجذابة ومخصصة محتوى تعليمي لأطفال المدارس الابتدائية في تونس.</h5>
				<div class="play">
					<img src="images/icon/play.png" alt="play"><span><a href="https://youtu.be/JgZ2L8ctFB0" target="_blank">شاهد الآن</a></span>
				</div>
			</div>
			<div class="svg-image">
				<img src="images/extra/svg1.jpg" alt="svg">
			</div>
		</div>
	</header>
	<!-- ABOUT -->
	<div class="diffSection" id="about_section">
		<div class="head-container">
			<div class="quote">
				<div class="side-text">
					<p dir="rtl">الغرض العام</p>
					<h5 dir="rtl">غرض الأساسي من التطبيق هو مساعدة طلاب المدارس الابتدائية الذين يدرسون في تونس من خلال تزويدهم بشبكة الإنترنت النظام الأساسي الذي يولد تلقائيا محتوى تعليمي سليم تربويا. ال يهدف التطبيق إلى تعزيز تعلمهم الخبرة والمشاركة والفهم مواضيع مختلفة.</h5>
				</div>
			</div>
			<div class="svg-image">
				<img src="images/extra/e3.jpg">
			</div>
		</div>
	</div>
	<!-- Classes -->
	<div class="title" id="classes_section">
		<br><br>
		<span >(تسجيل الدخول مطلوب)LearnEd الفصول المتاحة على </span>
	</div>
	<br><br>
	<div class="course">
		<center>
			<div class="cbox">
				<div class="det"><a href="display.php"><img src="images/courses/1.png"></a></div>
				<div class="det"><a href="display2.php"><img src="images/courses/2.png"></a></div>
				<div class="det"><a href="display3.php"><img src="images/courses/3.png"></a></div>
			</div>
			<div class="cbox">
				<div class="det"><a href="display4.php"><img src="images/courses/4.png"></a></div>
				<div class="det"><a href="display5.php"><img src="images/courses/5.png"></a></div>
				<div class="det"><a href="display6.php"><img src="images/courses/6.png"></a></div>
			</div>
		</center>
	</div>



	<!-- PORTFOLIO -->
	<div class="diffSection" id="portfolio_section">
		<center>
			<p style="font-size: 50px; padding: 100px; padding-bottom: 40px;">مزايا</p>
		</center>
		<div class="content">
			<p>
				" التعليم هو جواز سفر للمستقبل، لأن الغد ملك لمن يستعدون له اليوم " . " إن موقفك، وليس مواهبك، هو الذي يحدد ارتفاعك " . "إذا كنت تعتقد أن التعليم مكلف، فحاول الجهل". " الشخص الوحيد المتعلم هو الشخص الذي تعلم كيف يتعلم ... ويتغير " .
			</p>
		</div>
	</div>

	<div class="extra">
		<p>نحن نعمل على زيادة هذه البيانات كل عام</p>
		<div class="smbox">
			<span>
				<center>
					<div class="data">154</div>
					<div class="det">التلاميذ المقيدون</div>
				</center>
			</span>
			<span>
				<center>
					<div class="data">62</div>
					<div class="det">مجموع الدروس المستفادة</div>
				</center>
			</span>
			<span>
				<center>
					<div class="data">56</div>
					<div class="det"> الطلاب المسجلون </div>
				</center>
			</span>
			<span>
				<center>
					<div class="data">27</div>
					<div class="det">مجموع المشاريع</div>
				</center>
			</span>
		</div>
	</div>


	<!-- TEAM -->
	<div class="diffSection" id="team_section">
		<center>
			<p style="font-size: 50px; padding-top: 100px; padding-bottom: 60px;">لماذا نختار منصّتنا؟</p>
		</center>
		<div class="totalcard">
			<div class="card">
				<center><img src="images/icon/ai-icon.png"></center>
				<center>
					<div class="card-title">مولد بالذكاء الإصطناعي</div>
					<div id="detail">
						<p>“ تستخدم منصتنا الذكاء الاصطناعي المتطور لإنشاء دورات تفاعلية ومصممة خصيصا بناء على التخطيط التربوي الرسمي الذي وضعته الحكومة التونسية “</p>
					</div>
				</center>
			</div>
			<div class="card">
				<center><img src="images/icon/experience-icon.png"></center>
				<center>
					<div class="card-title">تجربة تعليمية جذابة</div>
					<div id="detail">
						<p>“ توفر منصتنا بيئة تعليمية ديناميكية وممتعة تثير الفضول و يغذي حب المعرفة.“</p>
					</div>
				</center>
			</div>
			<div class="card">
				<center><img src="images/icon/verif.png"></center>
				<center>
					<div class="card-title">موالم للمناهج الدراسية</div>
					<div id="detail">
						<p>“يتماشى المحتوى الخاص بنا مع المنهج الوطني ، مما يجعله موردا تكميليا ممتازا لرحلة تعليم طفلك.“</p>
					</div>
				</center>
			</div>
			<div class="card">
				<center><img src="images/icon/accessible-icon.png"></center>
				<center>
					<div class="card-title">يمكن الوصول إليها في أي مكان وفي أي وقت</div>
					<div id="detail">
						<p>“ لا ينبغي أن يقتصر التعلم على الفصل الدراسي. من خلال منصتنا المستندة إلى الويب ، يمكن لطفلك الاستكشاف والتعلم بالسرعة التي تناسبه من راحة المنزل أو أثناء التنقل.“</p>
					</div>
				</center>
			</div>
		</div>
	</div>


	<!-- CONTACT US -->
	<div class="diffSection" id="contactus_section">
		<center>
			<p style="font-size: 50px; padding: 100px">اتصل بنا</p>
		</center>
		<div class="csec"></div>
		<div class="back-contact">
			<div class="cc" >
				<form action="mailto:mohamedhammami2355@gmail.com" method="post" enctype="text/plain" >
					<label> الإسم  <span class="imp">*</span></label><label style="margin-left: 185px">اللقب<span class="imp">*</span></label><br>
					<center>
						<input type="text" name="fname" style="margin-right: 10px; width: 175px" required="required"><input type="text" name="lname" style="width: 175px" required="required"><br>
					</center>
					<label>البريد <span class="imp">*</span></label><br>
					<input type="email" name="mail" style="width: 100%" required="required"><br>
					<label>الرسالة <span class="imp">*</span></label><br>
					<input type="text" name="message" style="width: 100%" required="required"><br>
					<label>معلومات إضافية</label><br>
					<textarea name="addtional"></textarea><br>
					<button type="submit" id="csubmit">إرسال</button>
				</form>
			</div>
		</div>
	</div>


	<!-- FEEDBACK -->
	<div class="title2" id="feedBACK" dir="rtl">
		<span >تقديم ملاحظات </span>
		<div class="shortdesc2">
			<p dir="rtl">يرجى مشاركة ملاحظاتك القيمة لنا</p>
		</div>
	</div>

	<div class="feedbox">
		<div class="feed" dir="rtl">
			<form action="mailto:mohamedhammami2355@gmail.com" method="post" enctype="text/plain">
				<label>الإسم</label><br>
				<input type="text" name="" class="fname" required="required"><br>
				<label>البريد</label><br>
				<input type="email" name="mail" required="required"><br>
				<label>معلومات إضافية</label><br>
				<textarea name="addtional"></textarea><br>
				<button type="submit" id="csubmit">إرسال</button>
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