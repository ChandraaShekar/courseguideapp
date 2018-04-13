<?php
session_start();
require_once 'php/db.php';
if (isset($_SESSION['user'])) {
	$user_id = $_SESSION['user']['id'];
    $fullname = $_SESSION['user']['name'];
    $username = $_SESSION['user']['username'];
    include "includes/after_login.php";
}else{
    include "includes/header.php";
}
?>
<style type="text/css">
	body,p{
		color: #000;
	}
	a:hover{
		color: #000;
		text-decoration: underline;
	}
</style>
<div class="container">
	<h2>WISHLIST</h2>
	<table class="table table-bordered table-responsive">
		<th><h3>Colleges wishlist: </h3></th>
		<?php
		$q = $db->query("SELECT college_data.college_institution,college_data.tab_id FROM wishlist RIGHT JOIN college_data ON college_data.tab_id = wishlist.clg_id WHERE wishlist.user_id = '". $user_id ."'");
		while ($row = $q->fetch_assoc()) {
			?>
			<tr>
			<td><a href=<?php echo "college.php?id=".$row['tab_id'] . "&page=home"; ?>><strong><?php echo $row['college_institution']; ?></strong></a></td>
		</tr>
			<?php
		}
		?>
	</table>
</div>
</body>
</html>