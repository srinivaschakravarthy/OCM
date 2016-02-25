<?php
function courseheader($active = "overview"){
  global $editable;
  global $coursepicurl;
  global $course_name;
  global $g_url;
  global $courseid;
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
        <div class="col m8">
          <h4><?php echo $course_name; ?></h4>
        </div>
        <div class="col m2">
          <a class="btn white indigo-text">Join</a>
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
          <li><a href="<?php echo $g_url;?>course/?c=<?php echo $courseid;?>" class="<?php echo $active=='overview' ? 'indigo-text active':'' ?>">Overview</a></li>
          <li><a href="<?php echo $g_url;?>course/lectures.php?u=<?php echo $courseid;?>" class="<?php echo $active=='lectures' ? 'indigo-text active':'' ?>">Lectures</a></li>
          <li><a href="<?php echo $g_url;?>course/assignments.php?u=<?php echo $courseid;?>" class="<?php echo $active=='assignments' ? 'indigo-text active':'' ?>">Assignments</a></li>
          <li><a href="<?php echo $g_url;?>course/quizzes.php?u=<?php echo $courseid;?>" class="<?php echo $active=='quizzes' ? 'indigo-text active':'' ?>">Quizzes</a></li>
          <li><a href="<?php echo $g_url;?>course/discussions.php?u=<?php echo $courseid;?>" class="<?php echo $active=='discussions' ? 'indigo-text active':'' ?>">Discussions</a></li>
      </div>
    </nav>
  </div>
</div>
<?php
}//End of courseheader function
?>
