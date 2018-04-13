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
echo "<link rel=\"stylesheet\" href=\"css/jquery.tag-editor.css\">";
?>
<style type="text/css">
    body,p{
        color: #000;
    }
</style>
<?php
if (isset($_SESSION['search-int'])) {
    $search_int = $_SESSION['search-int'];
}else{
    $search_int = null;
}
?>
    <div class="dropdown-header container">
        <h1>Search By Interests</h1>
        We use advance methods and techniques to find tailored course, we compare 1000's of colleges to give you the best result based on your interest. 
        <br> Enter your Interests in the below input field and get the tailored course!
    </div>
    <br>
<form method="post" class="container">
    <textarea id="demo1" name="interesttag" class="form-control" value=<?php echo "\"". $search_int ."\""; ?>></textarea>
<button type="submit" class="btn btn-primary" name="submit">Search</button>
</form>
    
<section class="main">
        <div class='clg_1 container'>
        <?php
        $tags;
if (isset($_POST['submit'])) {
    $tags = $_POST['interesttag'];
    $str = str_replace(",", " ", $tags);
    $_SESSION['search-int'] = $tags;
    $q = $db->query("SELECT * FROM courses_information WHERE match(course_name, course_list) against('$str') ") or die(mysqli_error($db));
    // echo mysqli_num_rows($q);
    while ($row = $q->fetch_assoc()) {

        ?>
        <a href=by-interest.php?course=<?php echo $row['id']; ?> class="btn btn-link"><?php echo $row['course_name'];  ?></a>
        <?php
        echo "<br>";
    }
}
if (isset($_GET['course'])) {
    $id = $_GET['course'];
    $q1 = $db->query("SELECT * FROM courses_information WHERE id = '". $id ."'");
    $row=  $q1->fetch_assoc();
    ?>
<h2 class="text-primary"><?php echo $row['course_name'] ?></h2>
    <h4 class="text-primary">Description: </h4>
    <p><?php echo $row['description']; ?></p>
    <h4 class="text-primary">Eligibility: </h4>
    <p><?php echo $row['eligibility']; ?></p>
    <h4 class="text-primary">Scope: </h4>
    <p><?php echo $row['scope']; ?></p>
    <h4  class="text-primary">Course List: </h4>
    <p><?php echo $row['course_list']; ?></p>
    <h4  class="text-primary">Recuriters: </h4>
    <p><?php echo $row['recuriters']; ?></p>
    <h4  class="text-primary">Max Fee in india for UG: </h4>
    <p><?php echo $row['ug_max_fee']; ?></p>
    <h4  class="text-primary">Min Fee in india for UG: </h4>    
    <p><?php echo $row['ug_min_fee']; ?></p>
    <h4  class="text-primary">Max Fee in india for PG: </h4>
    <p><?php echo $row['pg_max_fee']; ?></p>
    <h4  class="text-primary">Min Fee in india for PG: </h4>
    <p><?php echo $row['pg_min_fee']; ?></p>
    <?php
}
        ?>
        </div>

</section>
<!-- <script src="js/scriptss.js"></script> -->

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
    <script src="js/jquery.caret.min.js"></script>
    <script src="js/jquery.tag-editor.js"></script>
<script>
//     function run(){
//  var x=   document.getElementById('Interest2').value;
//  var y=document.getElementById('main').value=x;
// document.write(y);
// }
$('#demo1').tagEditor({
    initialTags: [],
    delimiter: ', ', /* space and comma */
    placeholder: 'Ex: electronics, computers, aerodynamics etc.,'
});
</script>
</body>
</html>
