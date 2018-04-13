<?php
session_start();
require_once 'php/db.php';
if (isset($_SESSION['user'])) {
    $fullname = $_SESSION['user']['name'];
    $username = $_SESSION['user']['username'];
    include "includes/after_login.php";
    ?>
<div class="container">
    <?php
if (isset($_POST['clg_submit'])) {
    $college = $_POST['college'];
    $id = $_SESSION['user']['id'];
    $bus_name = $_POST['bus_name'];
    $des = $_POST['description'];
    // $file = $_POST['file'];
        $q = $db->query("INSERT INTO business (user_id, college,name, description) VALUES('$id', '$college', '$bus_name','$des')");
        if (!$q) {
            echo "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Oh snap!</strong>There's a problem please try again.</div>";
        }else{
            echo "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><strong>Done!</strong>Your Business details have been added, We will notify you by email once we aprove your business.</div>";
        }
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
    <h1>Add your Business</h1>
    <p>You can add your business here if your business is in the distance of 1KM radius of any UG or PG college. We will inform you by mail if your business got approved to display here.<a href="#" class="btn btn-link">Click here for more information...</a></p>
    <form method="post">
    <input type="text" id="filterfield" name="clg_search"  class="form-control" placeholder="Which college is arround your business..."><br>
    <input type="text" name="bus_name" class="form-control" placeholder="Enter your Business Name..."><br>
    <textarea class="form-control" placeholder="Give a Breif Description of your business..." name="description"></textarea><br>
    <input type="file" name="images" class="form-control" multiple>
    <input type='submit' name="clg_submit" class="btn btn-primary" value="submit">
    <div id="tab"></div>    
</form>
<?php
}else{
    include "includes/header.php";

?>
<div class="container">
    <h1 style="color: #000;">You need to login to use this Feature</h1>
    </div>
</div>
<?php
}
?>
</body>
</html>