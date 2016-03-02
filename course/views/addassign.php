<?php include("common.php");?>
<?php
courseheader('assignments');
?>
<div class="container">
  <div class="row" style="margin-top:0">
    <div class="col s12 m12">
      <div class="white card new-course-form">
        <h4 class="indigo-text">New Assignment</h4><hr>
        <div class="row">
          <div class="col s12">
            <br>
            <div class="row">
              <form class="col s12" enctype="multipart/form-data">
                <div class="row">
                  <div class="input-field col s12">
                    <textarea id="prob_stmnt" class="materialize-textarea" aria-required="true"></textarea>
                    <label for="prob_stmnt">Problem Statement</label>
                  </div>
                </div>
                <div class="row">
                  <div class="file-field input-field col s12">
                    <div class="btn indigo waves-effect waves-light">
                      <span>Choose File</span>
                      <input type="file" id="assignfile">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" id="assignfilename" type="text">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m6">
                    <input id="assign_marks" type="number" required="true" aria-required="true">
                    <label for="assign_marks" data-success="">Total Marks</label>
                  </div>
                  <div class="input-field col s12 m6">
                    <input type="date" class="datepicker" id="assign_deadline">
                    <label for="assign_deadline" aria-required="true">Submission Deadline (yyyy-mm-dd)</label>
                  </div>
                </div>
                <p class="addassign-form-message invalid red-text center"></p>
                <a class="right indigo white-text btn btn-large waves-effect waves-light addassign-submit-btn" onclick="addassign(<?php echo $courseid ?>);">Submit</a>
              </form>
              <div id = "loading1" hidden>
                <div class="progress indigo">
                  <div class="indeterminate indigo lighten-3"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
