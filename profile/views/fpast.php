<?php include("common.php");?>
<?php
profileheader('past');
 ?>

 <?php
    $email = $_SESSION["email"];
    $query = "SELECT * FROM users where users.email='$email'";
    $result = mysqli_query($con,$query);
    $numResults = mysqli_num_rows($result);
    if($numResults)
    {
      $profileid = $userdata['user_id'];
    }
    $today = date('Y-m-d');
    $query = "SELECT course_id from courses where course_id in (select course_id from taught_by where faculty_id in (select faculty_id from faculty where user_id = $profileid)) and start_date < '$today' and end_date < '$today'";
    $result = mysqli_query($con,$query);
    $numResults = mysqli_num_rows($result);
    //echo $numResults;
    if($numResults)
    {
      $i = 0;
      while($coursedata = mysqli_fetch_assoc($result))
      $course_id[$i++] = $coursedata['course_id'];
      //echo $course_id;
    }
 ?>
 <div class="container">
   <div class="section">
      <div class="row">
<?php
  foreach ($course_id as $key => $value) {
    ?>
    <div class="col m4">
    <?php coursecard($value); ?>
    </div>
    <?php
  }
?>
    </div>
  </div>
</div>
