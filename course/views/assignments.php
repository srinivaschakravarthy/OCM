<?php include("common.php");?>
<?php
courseheader('assignments');
 ?>

<div class="container">
  <div class="section">
    <div class="row">
      <div class="col s12 m3 lecsidebar">
        <div class="collection">
        <?php
          $query = "SELECT *
                    FROM assignments
                    WHERE course_id = $courseid";
          $result = mysqli_query($con, $query);
          while ($row = mysqli_fetch_assoc($result))
          {
        ?>
            <a href="<?php echo $g_url; ?>course/assignments.php?c=<?php echo $courseid; ?>&l=<?php echo $row['aindex'] ?>" class="collection-item <?php echo $row['aindex'] == $assignmentdata['aindex'] ? 'indigo-text':''; ?>">Assignment - <?php echo $row['aindex']; ?></a>
        <?php
          }
        ?>
        </div>
      </div>
      <div class="col s12 m9">
        <?php
          if ($enrolled == 0) {
        ?>
            <div class="center">
              <h5>You are not enrolled to this course</h5><hr>
              <a class="btn btn-large indigo white-text modal-trigger waves-effect waves-light" href="<?php echo $global_uid ? '#course-enroll-modal':'#anonuser-modal' ?>">Enroll</a>
            </div>
        <?php
          }
          else if($assignmentnotfound == 1)
          {
        ?>
            <div class="center">
              <h5>Assignment Not Found</h5><hr>
              <img src="<?php echo $g_url; ?>images/error-404.png">
            </div>
        <?php
          }
          else
          {
        ?>
              <h5>Assignment - <?php echo $assignmentdata['aindex']; ?></h5><hr>
              <p><?php echo $assignmentdata['prob_stmnt']; ?></p>
              <object data="<?php echo $s3bucketurl."assignments/".$assignmentdata['file_url'];?>" type="application/pdf" height="500px" width="100%">
                <p>It appears you don't have a PDF plugin for this browser.
                No biggie... you can <a href="<?php echo $s3bucketurl."assignments/".$assignmentdata['file_url'];?>">click here to
                download the PDF file.</a></p>
              </object>
        <?php
          }
        ?>
      </div>
    </div>
  </div>
</div>
