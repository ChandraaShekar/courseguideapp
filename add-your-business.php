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
<script>
    $(document).ready(function(){
        $('#filterfield').keyup(function(){
        var data = $(this).val();
           $.get('php/business-colleges.php',{data:data},function(value){
            $('#tab').html(value).show(slow);
        }); 
        });
    });
    </script>
<div class="container">
    <h1>Add your Business</h1>
    <p>You can add your business here if your business is in the distance of 1KM radius of any UG or PG college. We will inform you by mail if your business got approved to display here.<a href="#" class="btn btn-link">Click here for more information...</a></p>
    <input type="text" id="filterfield" name="clg_search"  class="form-control" placeholder="Which college is arround your business...">
    <button name="submit" class="btn btn-primary">Submit</button>
    <div id="tab"></div>    
</div>
</body>
</html>