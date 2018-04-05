<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_GET['data'])) {
	header("Location: ../index.php");
}else{
	require_once 'db.php';
	$user_id = $_SESSION['user']['id'];
	$tab_id = $_GET['data'];
	$q1 = $db->query("SELECT * FROM wishlist WHERE clg_id = '".$tab_id."' AND user_id='". $user_id ."'");
	if (!$q1) {
		echo "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Oh snap!</strong>There's a problem please try again.</div>";
	}elseif (mysqli_num_rows($q1) > 0) {
		echo "<div class=\"alert alert-dismissible alert-warning\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><h4 class=\"alert-heading\">Oops!</h4><p class=\"mb-0\">This college already exists in the <a href=\"wishlist.php\" class=\"alert-link\">wishlist</a>.</p></div>";

	}else{	
		$q = $db->query("INSERT INTO wishlist (clg_id, user_id) VALUES ('$tab_id','$user_id')");	
		if (!$q) {
			echo "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Oh snap!</strong> There's a problem try again.</div>";
		}else{
			echo "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Success!</strong> The college has been ass to the <a href=\"wishlist.php\" class=\"alert-link\">Wishlist</a> Successfully. </div>";
		}
	}
}