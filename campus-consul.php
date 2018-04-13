<?php
session_start();
require_once 'php/db.php';
if (isset($_SESSION['user'])) {
    $fullname = $_SESSION['user']['name'];
    $username = $_SESSION['user']['username'];
    include "includes/after_login.php";
?>
<style type="text/css">
  body,p,ul,li,h5{
    color: #000;
  }
</style>
<div class=" container">
  <link rel="stylesheet" type="text/css" href="css/campus.css">
  <img style="height: 20%; width: 100%; display: block;" src="images/cc.png">
  <center>
<button id="myBtn" class="btn btn-lg btn-primary">Know More</button>
<button id="myBtn2" class="btn btn-lg btn-primary ">Join Now</button>
</center>
<br>
<br>
<br>
<br>
<div id="myModal" class="modal">
	<div class="modal-content">
    <span class="close">&times;</span>
    <h3>Job Description:</h3>
    <p>As a campus ambassador, you will be responsible for striking strategic co- marketing alliances and partnerships with colleges and businesses for us with the marketing / alliances teams of other relevant corporate. Working closely with our team, you will drive impactful tie-ups making significant contribution to our brand awareness and revenues. </p>
    <h3>On a day to day basis, you will be working on:</h3>
    <ul>
    	<li>Identifying key alliance opportunities and reaching out to new alliance partners and finding as many business to list as possible.</li>
    	<li>Driving regular co-marketing partnerships from agreement to execution with colleges and business around it.</li>
    	<li>Utilization of brand assets in our listed businesses for revenue generation.</li>
    	<li>Finding unique opportunities for tie-ups with brands with similar TG / service offerings relevant to us. </li>
    	<li>Tracking conversions and traffic impact from ongoing partnerships.</li>
    </ul>
    <h3>Eligibility: Candidates who:</h3>
       <ul>
    	<li>Have great negotiation and relation building skills.</li>
    	<li> Are goal-orientated and have the ability to articulate goals clearly and adhere to timelines.</li>
    	<li>Are persistent and empathetic. </li>
    	<li>Have high commitment levels to be a part of a fast-paced industry-defining startup. </li>
    </ul>
       <h3>Eligibility: Candidates who:</h3>
       <ul>
    	<li>Have great negotiation and relation building skills.</li>
    	<li> Are goal-orientated and have the ability to articulate goals clearly and adhere to timelines.</li>
    	<li>Are persistent and empathetic. </li>
    	<li>Have high commitment levels to be a part of a fast-paced industry-defining startup. </li>
    </ul>
   <h3> Benefits of joining Us:</h3>
   <ul>
   <li>You get to be a part of a company revolutionizing the education industry.</li>
    <li>You get to work with the smartest people, who know how to have fun too.</li>
     <li>You get rewarded for thinking out of the box. </li>
      <li>You get to participate in the creation of what is going to be one of most loved brands in India.</li>
      <li>You never have a boring day at work at us.</li>
</ul>
<h3>Whats in for you after that:</h3>
<ul>
	<li>You get to share a 5% revenue of what you bring to us! (oh yes! So more you sell more you register)</li>

	<li>A certificate to show the world your amazing skills/work.</li>

	<li>Lots of our merchandises to flaunt.</li>
</ul>
  </div>
  </div>
  <script>
    $(document).ready(function(){
        $('#filterfield').keyup(function(){
        var data = $(this).val();
           $.get('php/business-colleges.php',{data:data},function(value){
            $('#tab').html(value).show(slow);
        }); 
        });
    });
    </script>
  <div id="myModal2" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Campus Consul</h2>
    <form method="post">
      <input type="text" name="college-name" class="form-control" placeholder="Enter your college name...." id="filterfield" required>
      <textarea class="form-control" name="your-description" placeholder="Enter some Description about you..." required></textarea>
      <button class="btn btn-primary">Submit</button>
      <div id="tab"></div>
    </form>
  </div>
</div>
  <script>
var modal = document.getElementById('myModal');
var modal2 = document.getElementById('myModal2');
var btn = document.getElementById("myBtn");
var btn2 = document.getElementById('myBtn2')
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

btn2.onclick = function() {
    modal2.style.display = "block";
}
span.onclick = function() {
    modal2.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal2.style.display = "none";
    }
}
  </script>
</div>
<?php
}else{
    include "includes/header.php";
?>
<div class="container">
  <h1 style="color: #000">You must login to use this feature.</h1>
</div>
<?php
}
?>
</body>
</html>
