<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CourseGuide | Student Education Optimization.</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="icon" href="images/logo.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--  FONTS  -->
	<!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
<!--  STYLES	-->
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="css/prettyPhoto.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
<!--  SCRIPTS	-->

<style>
body{
    font-family: 'Varela Round', sans-serif;
}
.row {
display: flex;
flex-wrap: wrap;
}

.row > div[class*='col-'] {
display: flex;
}

.card{
   background-color:#80d4ff;
   color: aqua;
   margin-right: 10px;
   margin-top: 20px;
   margin-bottom: 50px;
   padding: 30px;
border-radius: 10px;
}
.card a {
   text-decoration: none;
}
.card p {
   color: white;
   font-size: 20px;
}
.card i{
margin-left: 75px;
margin-bottom: 20px;
}
.card h4{
    color:#4f84c4;
    font-weight: bold;
}

.bluebag{
    height:400px;
}

.bluebag ul {
color: black;
   font-size: 150%;
}
    .modal {
    display:block; /* Hidden by default */
    position: relative; /* Stay in place */
    padding-top: 50px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto;
        z-index: -900; /* Enable scroll if needed */
}

/* Modal Content */
.modal-content {
    color: white;
    background-color: #80d4ff;
    margin: auto;
    padding: 30px;
    width: 70%;

}
@media only screen and (max-width: 800px) {
    .modal-content{
        width:98%;
    }
}

li a:hover{
  color: #000;
}
</style>
    </head>
<body>
	<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top" style="position: relative;">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">CourseGuide</a>
            </div>
            <div class="collapse navbar-collapse" id="myNav">
              <ul class="nav navbar-nav">
                <li><a href="index.php">HOME</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">SEARCH<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="by-interest.php">BASED ON INTEREST</a></li>
                    <li><a href="location-search.php">BASED ON LOCATION</a></li>
                    <li><a href="college-name.php">BASED ON COLLEGE NAME</a></li>
                </ul>
                </li>
                  <li><a href="campus-consul.php">BE A CAMPUS CONSUL</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">OTHERS<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="add-your-business.php">ADD YOUR BUSINESS</a></li>
                  </ul>
                </li>
              </ul>
    <ul class="nav navbar-nav navbar-right">
                    <li><a href="wishlist.php"><img src="images/145d0dfb9c.svg" width="25" height="20">
                      <!-- <span class="glyphicon glyphicon glyphicon-th-list"></span> -->
                    </a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Settings</a></li>
          <li><a href="php/logout.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
</nav>
<hr>
	</header>

