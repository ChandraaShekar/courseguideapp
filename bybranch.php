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
<form method="POST" action="bybranch1.php">
  <input type="text" name="branch" class="form-control" placeholder="Search By Branch...">
<button class="button btn btn-primary" name="submit">Search</button>
</form>
</div >
<section class="main container">
        <div class='clg_1'>
            <?php
            if (isset($_POST['submit'])) {
                $branch = $_POST['branch'];
            }
            ?>
        </div>

</section>

</body>
</html>
