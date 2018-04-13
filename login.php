<?php
require_once 'php/db.php';
session_start();
if (isset($_POST['register-submit'])) {
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm-password'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	if ($fullname != null && $username != null && $email != null && $password != null && $confirm_password != null && $address != null && $city != null && $state != null ) {
		$q1 = $db->query("SELECT * FROM student_info WHERE username = '". $username ."' OR email = '". $email ."'");
		if (mysqli_num_rows($q1) > 0) {
			echo "
<div class='alert alert-dismissible alert-danger'>	
<button type='button' class='close' data-dismiss='alert'>&times;</button>
<strong>Oh snap!</strong> <a href='#' class='alert-link'>The Email or username already Exists</a> Try some other...</div>";
		}
		if ($password == $confirm_password) {
			$options = [
			    'cost' => 11,
			    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			];
			$hashed = password_hash($password, PASSWORD_BCRYPT, $options);
			$q = $db->query("INSERT INTO student_info(name, email, username, password, address, city, state) VALUES ('$fullname','$email','$username', '$hashed', '$address', '$city', '$state')") or die(mysqli_error($db));
			if (!$q) {
				echo "
<div class='alert alert-dismissible alert-danger'>	
<button type='button' class='close' data-dismiss='alert'>&times;</button>
<strong>Oh snap!</strong> <a href='#' class='alert-link'>There is some technical issue</a> Try again later...</div>";
			}
		}else{
			echo "
<div class='alert alert-dismissible alert-danger'>	
<button type='button' class='close' data-dismiss='alert'>&times;</button>
<strong>Oh snap!</strong> <a href='#' class='alert-link'>Password and confirm password must match</a>Try again...</div>";
		}
	}else{
		echo "
<div class='alert alert-dismissible alert-danger'>	
<button type='button' class='close' data-dismiss='alert'>&times;</button>
<strong>Oh snap!</strong> <a href='#' class='alert-link'>All Fields are necessary </a> Try again...</div>";
	}
}


if (isset($_POST['login-submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$q2 = $db->query("SELECT * FROM student_info WHERE username = '". $username ."'") or die(mysqli_error($db));
	if (mysqli_num_rows($q2) > 0) {
		$row = $q2->fetch_assoc();
		if(password_verify($password, $row['password'])){
			$_SESSION['user'] = $row;
			header("Location: index.php");
		}else{
			echo "Chandu";
		}
	}
}


?>


<html>
<head>
<title>CourseGuide | Login/Signup</title>
 <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
	$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

</script>
<style>
	html{
		font-family: 'Varela Round', sans-serif;
	}

	body {
	font-family: 'Varela Round', sans-serif;
	padding-top: 90px;
}
.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #328cc1;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #328cc1;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #328cc1;
	border-color: #328cc1;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #328cc1;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #328cc1;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #328cc1;
	border-color: #328cc1;
}
</style>
</head>

<body>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
<div class="col-lg-12">
	<form id="login-form" method="post" style="display: block;">
		<div class="form-group">
			<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
		</div>
		<div class="form-group">
			<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
		</div>
		<div class="form-group text-center">
			<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
			<label for="remember"> Remember Me</label>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<button name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">Login</button>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-lg-12">
					<div class="text-center">
						<a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
					</div>
				</div>
			</div>
		</div>
	</form>
	<form id="register-form" method="post" style="display: none;">
		<div class="form-group">
			<input type="text" name="fullname" id="fullname" tabindex="1" class="form-control" placeholder="Full Name" value="">
		</div>
		<div class="form-group">
			<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
		</div>
		<div class="form-group">
			<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
		</div>
		<div class="form-group">
			<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
		</div>
		<div class="form-group">
			<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
		</div>
		<div class="form-group">
			<textarea name="address" id="address" tabindex="1" class="form-control" placeholder="Address"></textarea>
		</div>
		<div class="form-group">
			<input type="text" name="city" id="city" tabindex="1" class="form-control" placeholder="City" value="">
		</div>
		<div class="form-group">
			<input type="text" name="state" id="state" tabindex="1" class="form-control" placeholder="State" value="">
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3"><!-- 
					<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now"> -->
					<button name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now"></button>
				</div>
			</div>
		</div>
	</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>