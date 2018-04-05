<?php
echo "<h1>Chandu</h1>";
session_start();
if (isset($_SESSION['user'])) {
   	 $app_name = null;
   	 $controller = null;
	$fullname = $_SESSION['user']['name'];
	$username = $_SESSION['user']['username'];
	include 'includes/after_login.php';
	echo "<div id=\"myModal\" class=\"modal\"><div class=\"modal-content\">
    <p style=\"font-size:30px;\">Hi, ". $fullname ."!</p>
    <p style=\"font-size:18px;\">Now that you have logged in we save some of your for your convinence to use it for later. We use advance methods and techniques to find tailored course, we compare 1000s of colleges to give you the best result based on your interest. <br>Get to know every detail of a branch, from the future scopes and job aspect to availability in colleges. <br> Find the best college for you in a giving area easily, and find the required information of all the colleges in that area.</p>
  </div>
</div>
";
}else{
   	 $app_name = null;
   	 $controller = null;
	include 'includes/header.php';
}
// include "includes/header.php";
?>
<style type="text/css">
	#myModal{
		height: 100%;
		width: 100%;
	}
</style>
	<div class="slider">
		<div class="img-responsive">
			<ul class="bxslider">
				<li><img src="images/schlor.jpg"></li>
				<li><img src="images/student.jpg"></li>
			</ul>
		</div>
   	</div>

	<div class="container" id="search">
		<div class="text-center">
			<div class="wow pulse" data-wow-offset="0">
				<h3 style="color:#328cc1; font-weight:bold;" >CourseGuide Helps you in finding</h3>
			</div>
			<div class="wow pulse" data-wow-offset="0">
				<h3 style="color:#328cc1;  font-weight:bold;" >The College that best Suits you.</h3>
			</div>
		</div>
	</div>


	<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="card wow fadeInLeft" data-wow-offset="0">
               <a href="byinterest.php">
                <div class="card-block">
                   	<i class="fa fa-heart-o fa-3x"></i>
                    <h4>Based on Interest</h4>
                    <p>We use advance methods and techniques to find tailored course, we compare 1000s of colleges to give you the best result based on your interest.</p>
                </div>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card wow fadeInLeft" data-wow-offset="0">
               <a href="bybranch.php">
                <div class="card-block">
                   <i class="fa fa-cogs fa-3x"></i>
                    <h4 class="card-title">Based on Branch</h4>
                    <p>Get to know every detail of a branch, from the future scopes and job aspect to availability in colleges.</p>
                </div>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card wow fadeInLeft" data-wow-offset="0">
               <a href="basedonlocation.php">
                <div class="card-block">
                   <i class="fa fa-location-arrow fa-3x"></i>
                    <h4 class="card-title">Based on Location</h4>
                    <p>Find the best college for you in a giving area easily, and find the required information of all the colleges in that area.</p>
                </div>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card wow fadeInLeft" data-wow-offset="0" >
               <a href="byclg_name.php">
                <div class="card-block">
                   <i class="fa fa-sort-alpha-asc fa-3x"></i>
                    <h4 class="card-title">Based on College Name</h4>
                    <p>Searching for a college is never been this easy, you can find every detail of a college easily just by searching its name.</p>
                </div>
                </a>
            </div>
		</div>
	</div>
 </div>

	  <div class="bluebag text-center" style="background-color:white; padding:20px 20px">
	  	<div class="wow fadeInLeft" data-wow-offset="0">
	  	<h2 style="color:#328cc1;top:30px;font-weight:bold;" >Features</h2>
	  	</div>
	  	<div class="ulcontent wow fadeInLeft" data-wow-offset="0">
		<ul><span class="glyphicon glyphicon-education"></span> Easy 3 step process to find the tailored course.</ul>
		<ul><span class="glyphicon glyphicon-education"></span> A student can find a course related to their interest and get it’s details </ul>
		<ul><span class="glyphicon glyphicon-education"></span> A student can get real time information about college.</ul>
		<ul><span class="glyphicon glyphicon-education"></span> A student can know about various facilities around the college.</ul>
		<br>
		<br>
		</div>
    </div>
    <div class="bluebag text-center" style="background-color:white; padding:20px 20px">
        <div class="wow fadeInLeft" data-wow-offset="0">
	  	<h2 style="color:#328cc1;top:30px;font-weight:bold;" >Chatbot</h2>
	  	</div>
        <div class="ulcontent wow fadeInLeft" data-wow-offset="0">
		<ul><span class="glyphicon glyphicon-education"></span> The chatbot is made to enhance human interaction in the course selection.</ul>
		<ul><span class="glyphicon glyphicon-education"></span> A student can find a course related to their interest with the help of bot.</ul>
		<ul><span class="glyphicon glyphicon-education"></span> A student can get complete information about the course from the chatbot.</ul>

		<br>
		<br>
		</div>
	  </div>

   	<footer>
		<div class="footer">
			<div class="container">
				<div class="col-md-4 wow fadeInUp" data-wow-offset="0">
					<h2>CourseGuide</h2>
					<p><a href="http://data.gov.in/"><img src="./images/datagov-logo.jpg" alt="Open Gov "></a></p>

					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
					</ul>
				</div>

				<div class="col-md-4 wow fadeInUp" data-wow-offset="0">
					<h3>APP</h3>
					<ul style="color:white">
						<a href="http://play.google.com">
						<li><img src="./images/android.png" alt="android"></li>
						</a>
					</ul>
				</div>

				<div class="col-md-4 wow fadeInUp" data-wow-offset="0">
					<h3>CONTACT INFO</h3>
					<ul style="color:white">
						<li><i class="fa fa-envelope fa-2x"></i> courseguide@gmail.com</li>
						<br>
						<li><a href="index.html"><img src="images/logo.png" alt=""></a></li>
					</ul>
				</div>

			</div>
		</div>

		<div class="sub-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						 <a target="_blank" href="index.html">CourseGuide 2018</a>. All Rights Reserved.
					</div>

					<div class="col-md-6">
						<ul class="pull-right">
							<li><a href="#">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Search</a></li>
							<li><a href="#">Extras</a></li>
							<li><a href="#">Login/Signup</a></li>
						</ul>
					</div>
				</div>
				<div class="pull-right">
					<a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
				</div>
			</div>
		</div>
	</footer>

	<script src="js/wow.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/functions.js"></script>
	<script>
	wow = new WOW(
	 {

		}	)
		.init();
	</script>

  </body>
</html>
