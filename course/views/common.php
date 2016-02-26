<?php
function courseheader($active = "overview"){
  global $editable;
  global $coursepicurl;
  global $course_name;
  global $g_url;
  global $courseid;
  global $global_uid;
  global $enrolled;
  //Course status -- can be active, completed or yet to start
  //User status -- can be logged in or not logged in
  //If logged in -- he can be enrolled or not enrolled to the course
?>
<div id="index-banner" class="parallax-container">
  <div class="section no-pad-bot">
    <div class="container">
      <div class="row" style="margin-top:190px">
        <div class="col m2">
      		<?php if($editable)
      		{
      			?>
      			<input type='file' id="upload_dp" name='upload_dp' hidden/>
      		<a class="waves-effect waves-dark" onclick="upload_dp();" id="upload_dp_link"><img id="coursepicimg" src="<?php echo $coursepicurl;?>" alt="" class="responsive-img">
      			<!--<div id='picloading'>
      				<div class="progress grey">
      			  	<div class="indeterminate grey darken-1"></div>
      				</div>
      			</div>-->
      			<p class="uploadins">Change course pic</p></a>
      		<?php
      		}
      		else
      		{
      			?>
      		<img src="<?php echo $coursepicurl;?>" alt="" class="responsive-img">
      		<?php
      		}
      			?>
      	</div>
        <div class="col m7">
          <h4><?php echo $course_name; ?></h4>
        </div>
        <div class="col m3" style="margin-top:20px">
        <?php
          if($enrolled && $active == "overview")
          {
        ?>
          <a class="btn white indigo-text right">Get going</a>
        <?php
          }
          else if(!$enrolled)
          {
        ?>
          <a class="btn white indigo-text right modal-trigger" href="<?php echo $global_uid ? '#course-enroll-modal':'#anonuser-modal' ?>">Enroll</a>
        <?php
          }
        ?>
        </div>
      </div>
    </div>
  </div>
  <div class="parallax"><img src="<?php echo $g_url.'images/';?>background8.jpg" alt="Unsplashed background img 1"></div>
</div>
<div class="container">
  <div class="">
    <nav class="white" role="navigation" style="margin-top:-30px">
      <div class="nav-wrapper container">
        <ul class="">
          <li><a href="<?php echo $g_url;?>course/?c=<?php echo $courseid;?>" class="waves-effect waves-dark <?php echo $active=='overview' ? 'indigo-text active':'' ?>">Overview</a></li>
          <li><a href="<?php echo $g_url;?>course/lectures.php?c=<?php echo $courseid;?>" class="waves-effect waves-dark <?php echo $active=='lectures' ? 'indigo-text active':'' ?>">Lectures</a></li>
          <li><a href="<?php echo $g_url;?>course/assignments.php?c=<?php echo $courseid;?>" class="waves-effect waves-dark <?php echo $active=='assignments' ? 'indigo-text active':'' ?>">Assignments</a></li>
          <li><a href="<?php echo $g_url;?>course/quizzes.php?c=<?php echo $courseid;?>" class="waves-effect waves-dark <?php echo $active=='quizzes' ? 'indigo-text active':'' ?>">Quizzes</a></li>
          <li><a href="<?php echo $g_url;?>course/discussions.php?c=<?php echo $courseid;?>" class="waves-effect waves-dark <?php echo $active=='discussions' ? 'indigo-text active':'' ?>">Discussions</a></li>
      </div>
    </nav>
  </div>
</div>
<?php
}//End of courseheader function

function enrollmodal()
{
?>
  <div id="course-enroll-modal" class="modal">
    <div class="modal-content">
      <div class="row">
        <center>
          <h5>Confirm Enrollment</h5><hr>
          <div>
            <div class="col m9 left-align">
              Course Fee
            </div>
            <div class="col m3">
              <font size="5"><i class="fa fa-inr"></i>&nbsp;199</font>
            </div>
          </div>
          <a href="#login-modal" class="modal-trigger btn btn-large indigo">Pay Now</a>
        </center>
      </div>
    </div>
  </div>
<?php
}

?>
