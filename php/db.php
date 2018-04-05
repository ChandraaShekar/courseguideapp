<?php

$host = "127.0.0.1";
$user = "root";
$pass = "";
$daba = "course_guide";
try{
	$db = new mysqli($host,$user,$pass,$daba);
}catch(Exception $e){
	die("you have an error: " . $e);
}