<?php include("common.php");?>
<?php
courseheader('overview');
 ?>
<div class="container">
  <div class="section">

    <!--   Icon Section   -->
    <div class="row">
      <div class="col s12 m12">
        <h5>About</h5><hr>
        <p><?php echo $course_about; ?></p>
        <h5>Syllabus</h5><hr>
        <p><?php echo $course_syllabus; ?></p>
        <h5>Prerequisites</h5><hr>
        <p><?php echo $course_prereqs; ?></p>
      </div>
    </div>

  </div>
</div>
