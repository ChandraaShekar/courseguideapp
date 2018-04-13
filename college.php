<?php
session_start();
require_once 'php/db.php';
if (isset($_SESSION['user'])) {
    $user_id  = $_SESSION['user']['id'];
    $fullname = $_SESSION['user']['name'];
    $username = $_SESSION['user']['username'];
    include "includes/after_login.php";
    // print_r($_SESSION['user']);
}else{
    include "includes/header.php";
}
if (isset($_GET['id'])) {
	$tab_id = $_GET['id'];
	$q = $db->query("SELECT * FROM college_data WHERE tab_id= '". $tab_id ."'");
	$row = $q->fetch_assoc();
	$q2 = $db->query("SELECT * FROM infra_data WHERE id = '". $row['id'] ."'");
	$no_q2 = mysqli_num_rows($q2);
	$q3 = $db->query("SELECT * FROM hostel_data WHERE id='". $tab_id ."'");
	$no_q3 = mysqli_num_rows($q3);
	$q4 = $db->query("SELECT * FROM courses_info WHERE id ='". $tab_id ."'");
	$no_q4 = mysqli_num_rows($q4);
}
?>
<style type="text/css">
	body,p{
		color: #000;
	}
	.slider {
		-webkit-appearance: none;
		width: 350px;
		height: 25px;
		background: #d3d3d3;
		outline: none;
		opacity: 0.7;
		-webkit-transition: .2s;
		transition: opacity .2s;
	}
	.slider::-webkit-slider-thumb {
		-webkit-appearance: none;
		appearance: none;
		width: 25px;
		height: 25px;
		background: #4CAF50;
		cursor: pointer;
}
    </style>
    <script>
    $(document).ready(function(){
        $('#filterfield').click(function(){
        var data = $(this).val();
           $.get('php/php_wishlist.php',{data:data},function(value){
            $('#response').html(value).show(slow);
        });
        });
    });
    </script>
    <div class="container">
	<div id="response"></div>	
	<h1><?php echo $row['college_institution']; ?></h1>
	<button class="btn btn-danger" id="filterfield" value=<?php echo "\"".$tab_id."\""; ?>>Add to Wishlist <span class="glyphicon glyphicon-star"></span></button>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="?id=<?php echo($tab_id); ?>&page=home">Basic Info</a>
  </li>
  <?php if ($no_q2 != 0) { ?>
  <li class="nav-item">
    <a class="nav-link" href="?id=<?php echo($tab_id); ?>&page=infra"">Infrastructure</a>
  </li>
  <?php }  ?>
  <?php if ($no_q3 != 0) { ?>
  <li class="nav-item">
    <a class="nav-link" href="?id=<?php echo($tab_id); ?>&page=hostel"">Hostel Details</a>
  </li>
  <?php }  ?>
   <?php if ($no_q4 != 0) { ?>
  <li class="nav-item">
    <a class="nav-link" href="?id=<?php echo($tab_id); ?>&page=courses"">Courses Info</a>
  </li>
  <?php }  ?>
 <li class="nav-item">
    <a class="nav-link" href="?id=<?php echo($tab_id); ?>&page=comments"">Comments</a>
  </li>
</ul>
<?php
if (isset($_GET['page'])) {
	if ($_GET['page'] == "home") {
		?>
		<h2>Basic Info</h2>
    <table class="table table-hover">

		<tr>
			<th scope="col">Name: </th>
			<td><?php echo $row['college_institution']; ?></td>
		</tr>
		<tr>
			<th scope="col">State: </th>
			<td><?php echo $row['state']; ?></td>
		</tr>
		<tr>
			<th scope="col">District: </th>
			<td><?php echo $row['district']; ?></td>
		</tr>
		<tr>
			<th scope="col">City: </th>
			<td><?php echo $row['city']; ?></td>
		</tr>
		<tr>
			<th scope="col">Pincode: </th>
			<td><?php echo $row['pin_code']; ?></td>
		</tr>
		<tr>
			<th scope="col">Address Line 1: </th>
			<td><?php echo $row['address_line1']; ?></td>
		</tr><tr>
			<th scope="col">Address line2: </th>
			<td><?php echo $row['address_line2']; ?></td>
		</tr>
		<tr>
			<th scope="col">Website: </th>
			<td><a href=<?php echo "\"http://".$row['website'] . "\""; ?> target="_blank" class="btn btn-link"><?php echo $row['website']; ?></a></td>
		</tr>
		<tr>
			<th scope="col">Area(in acre's): </th>
			<td><?php echo $row['area_in_acre']; ?></td>
		</tr>
		<tr>
			<th scope="col">Constructed in: </th>
			<td><?php echo $row['construct_in_sqmt']; ?> sqmt</td>
		</tr>
		<tr>
			<th scope="col">Year of Establishment: </th>
			<td><?php echo $row['year_of_establishment']; ?></td>
		</tr>
		<tr>
			<th scope="col">Affiliat University: </th>
			<td><?php echo $row['affiliat_university']; ?></td>
		</tr>
		<tr>
			<th scope="col">Year of Affiliation: </th>
			<td><?php echo $row['year_of_affiliation']; ?></td>
		</tr>
		<tr>
			<th scope="col">Other Affiliated University: </th>
			<td><?php echo $row['other_affiliated_university_id']; ?></td>
		</tr>
		<tr>
			<th scope="col">Statutory body id: </th>
			<td><?php echo $row['statutory_body_id']; ?></td>
		</tr>
		<tr>
			<th scope="col">Other Statutory body: </th>
			<td><?php echo $row['other_statutory_body']; ?></td>
		</tr>
		<tr>
			<th scope="col">Location: </th>
			<td><?php echo $row['location']; ?></td>
		</tr>
		<tr>
			<th scope="col">Location on Google Maps: </th>
				<tr><td><div id="googleMap" style="width:100%;height:200px;"></div></td></tr>
	<script>
	function myMap() {
	var mapProp= {
	    center:new google.maps.LatLng(<?php echo $row['latitude']; ?>, <?php echo $row['longitude']; ?>),
	    zoom:18,
	};
	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBgae96ta2PNFTnxqZyJlvvgtf_8LQdeM&callback=myMap"></script>
		</tr>
		<tr>
			<th scope="col">College Type: </th>
			<td><?php echo $row['type']; ?></td>
		</tr>
		<tr>
			<th scope="col">Autonomous: </th>
			<td><?php echo $row['autonomous']; ?></td>
		</tr>
		<tr>
			<th scope="col">Has Diploma Courses: </th>
			<td><?php echo $row['has_diploma_courses']; ?></td>
		</tr>
		<tr>
			<th scope="col">Management Type: </th>
			<td><?php echo $row['management']; ?></td>
		</tr>
		<tr>
			<th scope="col">Specialized: </th>
			<td><?php echo $row['specialized']; ?></td>
		</tr>
		<tr>
			<th scope="col">Evening College: </th>
			<td><?php echo $row['evening']; ?></td>
		</tr>
		<tr>
			<th scope="col">Speciality: </th>
			<td><?php echo $row['speciality']; ?></td>
		</tr>
		<tr>
			<th scope="col">Other Speciality: </th>
			<td><?php echo $row['other_speciality']; ?></td>
		</tr>
		<tr>
			<th scope="col">Girl Exclusive: </th>
			<td><?php echo $row['girl_exclusive']; ?></td>
		</tr>
		<tr>
			<th scope="col">Staff Quarters Available: </th>
			<td><?php echo $row['staff_quarter_available']; ?></td>
		</tr>
		<tr>
			<th scope="col">Non Teaching Staff: </th>
			<td><?php echo $row['non_teaching_staff']; ?></td>
		</tr>
		<tr>
			<th scope="col">Teaching Staff: </th>
			<td><?php echo $row['teaching_staff']; ?></td>
		</tr>
		<tr>
			<th scope="col">Total Staff: </th>
			<td><?php echo $row['total']; ?></td>
		</tr>
		<tr>
			<th scope="col">Student Hostel Available: </th>
			<td><?php echo $row['student_hostel_available']; ?></td>
		</tr>
		<tr>
			<th scope="col">Hostel Count: </th>
			<td><?php echo $row['hostel_count']; ?></td>
		</tr>
	</table>
  </div>
		<?php
	}elseif ($_GET['page'] == "infra") {
		// echo "Infra";
		?>
		<h2>Infrastructure</h2>
  	    <?php
	$infra = $q2->fetch_assoc();
    ?>
        <table class="table table-hover">
	<tr>
		<th scope="col">Playground</th>
		<td><?php echo $infra['playground']; ?></td>
	</tr>
	<tr>
		<th scope="col">Auditorium</th>
		<td><?php echo $infra['auditorium']; ?></td>
	</tr>
	<tr>
		<th scope="col">Theatre</th>
		<td><?php echo $infra['theatre']; ?></td>
	</tr>
	<tr>
		<th scope="col">Library</th>
		<td><?php echo $infra['library']; ?></td>
	</tr>
	<tr>
		<th scope="col">Laboratory</th>
		<td><?php echo $infra['laboratory']; ?></td>
	</tr>
	<tr>
		<th scope="col">Conference Hall</th>
		<td><?php echo $infra['conference_hall']; ?></td>
	</tr>
	<tr>
		<th scope="col">Health Center</th>
		<td><?php echo $infra['health_center']; ?></td>
	</tr>
	<tr>
		<th scope="col">Gymnasium Fitness Center</th>
		<td><?php echo $infra['gymnasium_fitness_center']; ?></td>
	</tr>
	<tr>
		<th scope="col">Indoor Stadium</th>
		<td><?php echo $infra['indoor_stadium']; ?></td>
	</tr>
	<tr>
		<th scope="col">Common Room</th>
		<td><?php echo $infra['common_room']; ?></td>
	</tr>
	<tr>
		<th scope="col">Computer Center</th>
		<td><?php echo $infra['computer_center']; ?></td>
	</tr>
	<tr>
		<th scope="col">Cafeteria</th>
		<td><?php echo $infra['cafeteria']; ?></td>
	</tr>
	<tr>
		<th scope="col">Guest House</th>
		<td><?php echo $infra['guest_house']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Playgrounds</th>
		<td><?php echo $infra['no_of_playgrounds']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Auditoriums</th>
		<td><?php echo $infra['no_of_auditoriums']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Theatres</th>
		<td><?php echo $infra['no_of_theatres']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Libraries</th>
		<td><?php echo $infra['no_of_libraries']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Laboratories</th>
		<td><?php echo $infra['no_of_laboratories']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Conference halls</th>
		<td><?php echo $infra['no_of_conference_halls']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Health Centers</th>
		<td><?php echo $infra['no_of_health_centers']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Gymnasim Fitness Centers</th>
		<td><?php echo $infra['no_of_gymnasim_fitness_centers']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Common Rooms</th>
		<td><?php echo $infra['no_of_common_rooms']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Computer Centers</th>
		<td><?php echo $infra['no_of_computer_centers']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of cafeteria</th>
		<td><?php echo $infra['no_of_cafeteria']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Guest Houses</th>
		<td><?php echo $infra['no_of_guest_houses']; ?></td>
	</tr>
	<tr>
		<th scope="col">Separate room for girls</th>
		<td><?php echo $infra['separate_room_for_girls']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Separate Rooms for Girls</th>
		<td><?php echo $infra['no_of_separate_rooms_for_girls']; ?></td>
	</tr>
	<tr>
		<th scope="col">Solar Power Generation</th>
		<td><?php echo $infra['solar_power_generation']; ?></td>
	</tr>
	<tr>
		<th scope="col">Connectivity nkn</th>
		<td><?php echo $infra['connectivity_nkn']; ?></td>
	</tr>
	<tr>
		<th scope="col">Connectivity nmeict</th>
		<td><?php echo $infra['connectivity_nmeict']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Books</th>
		<td><?php echo $infra['no_of_books']; ?></td>
	</tr>
	<tr>
		<th scope="col">No. of Journals</th>
		<td><?php echo $infra['no_of_journals']; ?></td>
	</tr>
	<tr>
		<th scope="col">Campus Friendly</th>
		<td><?php echo $infra['campus_friendly']; ?></td>
	</tr>
	<tr>
		<th scope="col">Grievance Redressal Mechanism</th>
		<td><?php echo $infra['grievance_redressal_mechanism']; ?></td>
	</tr>
	<tr>
		<th scope="col">Vigilance Cell</th>
		<td><?php echo $infra['vigilance_cell']; ?></td>
	</tr>
	<tr>
		<th scope="col">Opportunity Cell</th>
		<td><?php echo $infra['opportunity_cell']; ?></td>
	</tr>
 	</table>
		<?php
	}elseif ($_GET['page'] == "hostel") {
		// echo "Hostel";
		
		$hostel = $q3->fetch_assoc();
			// print_r($hostel);
		?>
		<table class="table table-hover">
			<tr>
				<th scope="cols">Hostel Name</th>
				<td><?php echo $hostel['name']; ?></td>
			</tr>
			<tr>
				<th scope="cols">Hostel Type</th>
				<td><?php echo $hostel['hostel_type']; ?></td>
			</tr>
			<tr>
				<th scope="cols">Intake Capacity</th>
				<td><?php echo $hostel['intake_capacity']; ?></td>
			</tr>
		</table>
		<?php
	}elseif ($_GET['page'] == "courses") {
		// echo "Courses";
		while ($course = $q4->fetch_assoc()) {
			$courses[] = $course;
		}
		// print_r($courses[0]);
		// print_r($courses);
		foreach ($courses as $course) {
			// print_r($course);
			?>
			<table class="table table-hover">
			<h3><?php echo $course['department']; ?></h3>
			<tr>
				<th>Level: </th>
				<td><?php echo $course['levell']; ?></td>
			</tr>
			<tr>
				<th>Programme</th>
				<td><?php echo $course['programme']; ?></td>
			</tr>
			<tr>
				<th>Discipline</th>
				<td><?php echo $course['discipline']; ?></td>
			</tr>
			<tr>
				<th>Discipline Group Category</th>
				<td><?php echo $course['discipline_group_category']; ?></td>
			</tr>
			<tr>
				<th>Discipline Group</th>
				<td><?php echo $course['discipline_group']; ?></td>
			</tr>
			<tr>
				<th>Intake</th>
				<td><?php echo $course['intake']; ?></td>
			</tr>
			<tr>
				<th>Admission Criterion</th>
				<td><?php echo $course['admission_criterion']; ?></td>
			</tr>
			<tr>
				<th>Duration Year</th>
				<td><?php echo $course['duration_year']; ?></td>
			</tr>
			<tr>
				<th>Duration Months</th>
				<td><?php echo $course['duration_month']; ?></td>
			</tr>
			<tr>
				<th>Type</th>
				<td><?php echo $course['type']; ?></td>
			</tr>
			<tr>
				<th>System</th>
				<td><?php echo $course['system']; ?></td>
			</tr>
			<tr>
				<th>University through which Approved</th>
				<td><?php echo $course['university_through_which_approved']; ?></td>
			</tr>
			<tr>
				<th>Statutory Body through which Approved</th>
				<td><?php echo $course['statutory_body_through_which_approved']; ?></td>
			</tr>
			<?php
		}
	}elseif ($_GET['page'] = "comments") {
		?>
		<div class="jumbotron">
			<?php
			if(isset($_SESSION['user'])){
				$q5 = $db->query("SELECT * FROM comments WHERE college_id = '".$tab_id."'");
				if (mysqli_num_rows($q5) == 0) {
					?>
					<h1>Be the first person to write a comment...</h1>
					<?php
				}
			}else{
				?>
				<h1>You need to login to Write or See the comments</h1>
				<?php
			}
			?>
		</div>
		<form method="post">
			<input type="range" min="1" max="5" value="3" class="slider form-control" id="myRange">
			<h3 class="text-danger">Your Rating: <span id="op"></span></h3>
			<textarea class="form-control" name="comment-msg" placeholder="Enter your message here..." rows="3"></textarea>
			<button name="submit" class="btn btn-primary">Submit</button>
			<script>
				var slider = document.getElementById("myRange");
				var output = document.getElementById("op");
				output.innerHTML = slider.value;
				slider.oninput = function() {
					output.innerHTML = this.value;
				}
			</script>
		</form>
		<?php
	}
	else{
		header("Location: http://localhost/cg/site/CourseGuide/college.php?id=". $tab_id ."&page=home");
	}
}
?>
</div>