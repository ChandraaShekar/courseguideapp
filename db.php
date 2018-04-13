<?php

// $host = "127.0.0.1";
// $user = "root";
// $pass = "";
// $daba = "course_guide";

$host = "course-guide-server.mysql.database.azure.com";
$user = "csreddy1998@course-guide-server";
$pass = "Chandu@123";
$daba= "course_guide";
try{
	$db = new mysqli($host,$user,$pass,$daba);
}catch(Exception $e){
	die("you have an error: " . $e);
}