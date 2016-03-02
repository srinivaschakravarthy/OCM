<?php include("common.php");?>
<?php
courseheader('overview');
 ?>
<div class="container">
  <div class="section">
    <!--   Icon Section   -->
    <div class="row">
      <div class="col s12 m3">
        <h5>Instructors</h5><hr>
        <?php
        // $query = "SELECT users.user_id FROM users, faculty, taught_by WHERE users.user_id = faculty.user_id AND taught_by.faculty_id = faculty.faculty_id AND taught_by.course_id = $courseid";
        // $result = mysqli_query($con, $query);
        // if(mysqli_num_rows($result))
        // {
        //   while ($row = mysqli_fetch_assoc($result)) {
        //     usercard($row['user_id']);
        //   }
        // }
        $query = "SELECT users.user_id, users.fname, users.lname
                  FROM users
                  WHERE user_id IN (
                    SELECT user_id
                    FROM faculty
                    WHERE faculty_id IN(
                      SELECT faculty_id
                      FROM taught_by
                      WHERE course_id = $courseid
                    )
                  )";
        $result = mysqli_query($con, $query);
        $numResults = mysqli_num_rows($result);
        if($numResults)
        {
          while($row = mysqli_fetch_assoc($result))
          {
            usercard($row['user_id']);
          }
          //print_r($instructordata);
        }
       ?>
      </div>
      <div class="col s12 m9">
        <h5>About the course</h5><hr>
        <p><?php echo $course_about; ?></p>
        <h5>Syllabus</h5><hr>
        <p><?php echo $course_syllabus; ?></p>
        <h5>Prerequisites</h5><hr>
        <p><?php echo $course_prereqs; ?></p>
        <?php
          if($enrolled)
          {
        ?>
            <a class="btn indigo white-text right waves-effect waves-dark" href="<?php echo $g_url; ?>course/lectures.php?c=<?php echo $courseid; ?>">Get Started</a>
        <?php
          }
          else
          {
        ?>
        <a class="btn indigo white-text right modal-trigger waves-effect waves-light" href="<?php echo $global_uid ? '#course-enroll-modal':'#anonuser-modal' ?>">Enroll</a>
        <?php
          }
        ?>
      </div>

    </div>

  </div>
</div>
<?php
if($newuser)
{
?>
  <!-- Modal Structure of Course Welcome -->
  <div id="course-welcome-modal" class="modal">
    <div class="modal-content">
      <div class="row">
        <center>
          <h5>Welcome to <?php echo $course_name; ?></h5><hr>
          <p>Course Enrollment Successful!</p>
          <a class="btn indigo white-text right waves-effect waves-dark" href="<?php echo $g_url; ?>course/lectures.php?c=<?php echo $courseid; ?>">Go to Classroom</a>
        </center>
      </div>
    </div>
  </div>
<?php
}
?>
