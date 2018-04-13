<?php
session_start();
require_once 'php/db.php';
if (isset($_SESSION['user'])) {
    $fullname = $_SESSION['user']['name'];
    $username = $_SESSION['user']['username'];
    include "includes/after_login.php";
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
}
?>
<style type="text/css">
	body,p{
		color: #000;
	}
    </style>
    <div class="container">
	<h1>College Info</h1>
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
</ul>
<?php
if (isset($_GET['page'])) {
	if ($_GET['page'] == "home") {
		// echo "Home";
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
	    zoom:10,
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
		
		while ($hostel = $q3->fetch_assoc()) {
			print_r($hostel);
		}
		?>
		<table class="table table-hover">
			<tr>
				<th scope="cols">Hostel Name</th>
				<td><?php echo $hostel['name']; ?></td>
			</tr>
			<tr>
				<th scope="cols"></th>
				<td><?php echo $hostel['']; ?></td>
			</tr>
			<tr>
				<th scope="cols"></th>
				<td><?php echo $hostel['']; ?></td>
			</tr>
			<tr>
				<th scope="cols"></th>
				<td><?php echo $hostel['']; ?></td>
			</tr>
			<tr>
				<th scope="cols"></th>
				<td><?php echo $hostel['']; ?></td>
			</tr>
		</table>
		<?php
	}else{
		echo "Home";
	}
}
?>
</div>