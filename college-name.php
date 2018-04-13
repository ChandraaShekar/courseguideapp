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
           $.get('php/college-list.php',{data:data},function(value){
            $('#tab').html(value).show(slow);
        }); 
        });
    });
    </script>
<div class="header container">
<h1 style="color: #000;">Search By College Name</h1>
Find the best college for you in a giving area easily, and find the required information of all the colleges in that area.</div>
<div class="search container">
   <form>
  <!-- <input type="text" name="search" class="form-control" placeholder="Search By Location..."> -->
                <input type="text" id="filterfield" name="search" class="form-control inputs" placeholder="Enter a college name..." autocomplete="off" />
                <br><hr>
                <div id="tab">
                    
                </div>
<!-- <button class="button btn btn-primary" name="submit">Search</button> -->
</form>

</div>
<section class="main container">
        <div class='clg_1'>

        </div>
</section>
<script>
    $(document).ready(function(){
 $('.selectpicker').selectpicker();

 $('#framework').change(function(){
  $('#hidden_framework').val($('#framework').val());
 });

 $('#multiple_select_form').on('submit', function(event){
  event.preventDefault();
  if($('#framework').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     //console.log(data);
     $('#hidden_framework').val('');
     $('.selectpicker').selectpicker('val', '');
     alert(data);
    }
   })
  }
  else
  {
   alert("Please select framework");
   return false;
  }
 });
});
</script>
</body>
</html>
