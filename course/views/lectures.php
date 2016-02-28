<?php include("common.php");?>
<?php
courseheader('lectures');
 ?>

<div class="container">
  <div class="section">
    <div class="row">
      <div class="col s12 m3 lecsidebar">
        <div class="collection">
        <?php
          $query = "SELECT *
                    FROM lectures
                    WHERE course_id = $courseid";
          $result = mysqli_query($con, $query);
          while ($row = mysqli_fetch_assoc($result))
          {
        ?>
            <a href="<?php echo $g_url; ?>course/lectures.php?c=<?php echo $courseid; ?>&l=<?php echo $row['index'] ?>" class="collection-item <?php echo $row['index'] == $lecturedata['index'] ? 'indigo-text':''; ?>">Lecture - <?php echo $row['index']; ?></a>
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
          else if($lecturenotfound == 1)
          {
        ?>
            <div class="center">
              <h5>Lecture Not Found</h5><hr>
              <img src="<?php echo $g_url; ?>images/error-404.png">
            </div>
        <?php
          }

          else
          {
            if($lecturedata['type'] == "video")
            {
        ?>
              <h5>Lecture - <?php echo $lecturedata['index']; ?></h5><hr>
              <video width="100%" height="100%" controls>
                <source src="<?php echo $s3bucketurl.$lecturedata['video_url'];?>" type="video/mp4">
                Your browser does not support the video tag.
              </video>
        <?php
            }
            else if($lecturedata['type'] == "text")
            {
        ?>
              <h5>Lecture - <?php echo $lecturedata['index']; ?></h5><hr>
              <object data="<?php echo $s3bucketurl.$lecturedata['file_url'];?>" type="application/pdf" height="500px" width="100%">
                <p>It appears you don't have a PDF plugin for this browser.
                No biggie... you can <a href="<?php echo $s3bucketurl.$lecturedata['file_url'];?>">click here to
                download the PDF file.</a></p>
              </object>
        <?php
            }
          }
        ?>
      </div>
    </div>
  </div>
</div>
