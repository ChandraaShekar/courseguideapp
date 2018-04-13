<?php
session_start();
require_once 'php/db.php';
if (isset($_SESSION['user'])) {
    $app_name = "ng-app=\"plunker\"";
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
    <div class="header container">
        <h1>By Interests</h1>
        We use advance methods and techniques to find tailored course, we compare 1000's of colleges to give you the best result based on your interest. 
        <br> Enter your Interests in the below input field and get the tailored course!
    </div>
    <br>
<form method="post">    
    <textarea id="demo1" name="interesttag" class="form-control" value=<?php echo "\"". $search_int ."\""; ?>></textarea>
<button type="submit" class="button button2" name="submit">Search</button>
</form>
    
<section class="main">

        <div class='clg_1'>
        <?php
if (isset($_POST['submit'])) {
    $tags = $_POST['interesttag'];
    $str = str_replace(",", " ", $tags);
    $q = $db->query("SELECT * FROM courses_information WHERE match(course_name, course_list) against('$str') ") or die(mysqli_error($db));
    // echo mysqli_num_rows($q);
    while ($row = $q->fetch_assoc()) {
        // echo "<a href=\"byinterest.php?course=$row['id'] \">$row['course_name']</a>";
        ?>
        <a href=by-interest.php?course=<?php echo $row['id']; ?> class="btn btn-link"><?php echo $row['course_name'];  ?></a>
        <?php
        echo "<br>";
    }
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
    initialTags: ['electronics', 'software', 'mechanics'],
    delimiter: ', ', /* space and comma */
    placeholder: 'Enter tags ...'
});
</script>
</body>
</html>
