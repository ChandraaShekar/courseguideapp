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
?>
<style type="text/css">
    body,p{
        color: #000;
    }
</style>
    <div class="header container">Get to know every detail of a branch, from the future scopes and job aspect to availability in colleges.</div>
<div class="search container">
<form method="POST">
  <input type="text" name="search" class="form-control" placeholder="Search By Branch...">
<button class="button btn btn-primary" name="submit">Search</button>
</form>
</div >
<section class="main container">
        <div class='clg_1'>
  <?php          
if (isset($_POST['submit'])) {
    $branch = $_POST['branch'];
    // $branch = preg_replace("#[^0-9 a-z]#i", "", $branch);
    $q = $db->query("SELECT DISTINCT * FROM courses_info WHERE discipline LIKE '%$branch%'") or die(mysqli_error($db));
                $no_of_result = mysqli_num_rows($q);
                while ($row = $q->fetch_assoc()) {
                    // $rows[] = $row;
                    echo $row['name'] . "<br>";
                }
                // $no = count($rows);
                // for ($i=0; $i < $no; $i++) { 
                // $rows = array_unique($rows);
                //     echo $rows[$i]['name'] . "<br>";
                // }
                // print_r($rows);
            }
            ?>
        </div>

</section>
</body>
</html>
