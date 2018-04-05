<?php
require_once 'db.php';
$data = $_GET['data'];
$str = '';

if(strlen($data)>0){
    
$query2 = "SELECT * FROM college_data WHERE college_institution LIKE '%$data%' LIMIT 50";
$result2 = $db->query($query2) 
or die();

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