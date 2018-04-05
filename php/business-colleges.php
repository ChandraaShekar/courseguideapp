<?php
require_once 'db.php';
$data = $_GET['data'];
$str = '';

if(strlen($data)>0){
    
// $query2 = ;
	$start = microtime(true);
$result2 = $db->query($query2 = "SELECT * FROM college_data WHERE college_institution LIKE '%$data%' LIMIT 10");
$end = microtime(true);
$time = $end-$start . " s";
$str .= "<p><b>You can select only one college</b></p><form meth>";
while($row = $result2->fetch_row()){	
    $str.= '<div class="jumbotron">
      <label class="form-check-label" for="'.$row[0].'"><input type="radio" class="form-check-input" value="'. $row[0] .'" name="college" id="'. $row[0] .'""> '.$row[4].'</label><div class="r_i"><h5>'.$row[3].' > '. $row[8] .' > '. $row[7] .'</h5></div></div><hr>';
}
}
echo $str;