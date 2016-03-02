<?php include("common.php");?>
<?php
courseheader('lectures');
?>
<div class="container">
  <div class="row" style="margin-top:0">
    <div class="col s12 m12">
      <div class="white card new-course-form">
        <h4 class="indigo-text">New Lecture</h4><hr>
        <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s3"><a href="#video-lec" class="active indigo-text">Video</a></li>
              <li class="tab col s3"><a href="#text-lec" class="indigo-text">Text/PDF</a></li>
            </ul>
          </div>
          <div id="video-lec" class="col s12">
            <br>
            <div class="row">
              <form class="col s12" enctype="multipart/form-data">
                <div class="row">
                  <div class="input-field col s12">
                    <textarea id="video_desc" class="materialize-textarea" aria-required="true"></textarea>
                    <label for="video_desc">Video Description</label>
                  </div>
                </div>
                <div class="row">
                  <div class="file-field input-field col s12">
                    <div class="btn indigo waves-effect waves-light">
                      <span>Choose File</span>
                      <input type="file" id="videofile">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" id="videofilename" type="text">
                    </div>
                  </div>
                </div>
                <p class="addlec-form-message invalid red-text center"></p>
                <a class="right indigo white-text btn btn-large waves-effect waves-light addlec-submit-btn" onclick="addvideolec(<?php echo $courseid ?>);">Submit</a>
              </form>
              <div id = "loading1" hidden>
                <div class="progress indigo">
                  <div class="indeterminate indigo lighten-3"></div>
                </div>
              </div>
            </div>
          </div>
          <div id="text-lec" class="col s12">
            <br>
            <div class="row">
              <form class="col s12" enctype="multipart/form-data">
                <div class="row">
                  <div class="input-field col s12">
                    <textarea id="textlec_desc" class="materialize-textarea" aria-required="true"></textarea>
                    <label for="textlec_desc">Lecture Description</label>
                  </div>
                </div>
                <div class="row">
                  <div class="file-field input-field col s12">
                    <div class="btn indigo waves-effect waves-light">
                      <span>Choose File</span>
                      <input type="file" id="textfile">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" id="textfilename">
                    </div>
                  </div>
                </div>
                <p class="addlec-form-message invalid red-text center"></p>
                <a class="right indigo white-text btn btn-large waves-effect waves-light addlec-submit-btn" onclick="addtextlec(<?php echo $courseid ?>);">Submit</a>
              </form>
              <div id = "loading2" hidden>
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
