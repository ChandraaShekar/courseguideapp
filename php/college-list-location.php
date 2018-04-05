<?php
require_once 'db.php';
$data = $_GET['data'];
$str = '';

if(strlen($data)>0){
    
// $query2 = ;
	$start = microtime(true);
$result2 = $db->query("SELECT * FROM college_data WHERE state LIKE '%$data%' OR city LIKE '%$data%' OR district LIKE '%$data%'");
$end = microtime(true);
$time = $end-$start . " s";
$str .= "<p>Showing " . mysqli_num_rows($result2) . " results in " . $time .". </p>";
while($row = $result2->fetch_row()){	
    $str.= '<div class="jumbotron"><a href="college.php?id='. $row[0] .'&page=home" class="records">
                    
                    <div class="r_i">
                        <h3>'.$row[4].'</h3>
                        <h5>'.$row[3].' > '. $row[8] .' > '. $row[7] .'</h5>
                    </div>
                    </a></div><hr>';
}
}
echo $str;