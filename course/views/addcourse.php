<div id="index-banner" class="parallax-container">
  <div class="section no-pad-bot">

  </div>
  <div class="parallax"><img src="<?php echo $g_url.'images/';?>background8.jpg" alt="Unsplashed background img 1"></div>
</div>
<div class="container">
  <div class="row" style="margin-top:-300px">
    <div class="col s12 m12">
      <div class="white card new-course-form">
        <h4 class="indigo-text">New Course</h4><hr>
        <div class="row">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <input id="course_name" type="text" required="" aria-required="true" length="120">
                <label for="course_name">Course Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="course_about" class="materialize-textarea"></textarea>
                <label for="course_about">Course Description</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m6">
                <input id="course_fee" type="text">
                <label for="course_fee">Fee</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="course_lang" type="text">
                <label for="course_lang">Language</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="course_syllabus" class="materialize-textarea"></textarea>
                <label for="course_syllabus">Syllabus</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="course_prereqs" type="text">
                <label for="course_prereqs">Prerequisites</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m6">
                <select id = "course_difficulty">
                  <option value="1" selected>Beginner</option>
                  <option value="2">Intermediate</option>
                  <option value="3">Expert</option>
                </select>
                <label>Difficulty Level</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m6">
                <input type="date" class="datepicker" id="course_startdate">
                <label for="course_startdate">Start Date (mm/dd/yyyy)</label>
              </div>
              <div class="input-field col s12 m6">
                <input type="date" class="datepicker" id="course_enddate">
                <label for="course_enddate">End Date (mm/dd/yyyy)</label>
              </div>
            </div>
            <a class="indigo white-text btn btn-large waves-effect waves-light" onclick="addcourse();">Submit</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
