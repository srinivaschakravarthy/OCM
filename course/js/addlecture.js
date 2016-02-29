function addcourse()
{
  //alert("Hi");
  clearInputError();
  $('.addcourse-submit-btn').hide();
  var course_name = $("#course_name").val();
  var course_about = $("#course_about").val();
  var course_fee = $("#course_fee").val();
  var course_lang = $("#course_lang").val();
  var course_syllabus = $("#course_syllabus").val();
  var course_prereqs = $("#course_prereqs").val();
  var course_difficulty = $("#course_difficulty").val();
  var course_startdate = $("#course_startdate").val();
  var course_enddate = $("#course_enddate").val();
  var errors = 0;
  if(course_name == "")
  {
    $('#course_name').addClass('invalid');
    errors = 1;
  }
  if(course_about == "")
  {
    $('#course_about').addClass('invalid');
    errors = 1;
  }
  if(course_fee == "")
  {
    $('#course_fee').addClass('invalid');
    errors = 1;
  }
  if(course_lang == "")
  {
    $('#course_lang').addClass('invalid');
    errors = 1;
  }
  if(course_syllabus == "")
  {
    $('#course_syllabus').addClass('invalid');
    errors = 1;
  }
  if(course_prereqs == "")
  {
    $('#course_prereqs').addClass('invalid');
    errors = 1;
  }
  if(course_difficulty == "")
  {
    $('#course_difficulty').addClass('invalid');
    errors = 1;
  }
  if(course_startdate == "")
  {
    $('#course_startdate').addClass('invalid');
    errors = 1;
  }
  if(course_enddate == "")
  {
    $('#course_enddate').addClass('invalid');
    errors = 1;
  }
  if(errors == 1)
  {
    $('.addcourse-form-message').html("Fill all the required fields");
    $('.addcourse-submit-btn').show();
  }
  else
  {
    $.ajax(
      {
        url: g_url + "course/backend/addcourse.php",
        dataType:"json",
        type:"POST",
        data:
        {
          course_name:course_name,
          course_about:course_about,
          course_fee:course_fee,
          course_lang:course_lang,
          course_syllabus:course_syllabus,
          course_prereqs:course_prereqs,
          course_difficulty:course_difficulty,
          course_startdate:course_startdate,
          course_enddate:course_enddate,
        },
        success:function(json) {
          if(json.status == 1)
          {
            location.replace(g_url + "course/?c=" + json.courseid);
          }
        },
        error: function() {
          $('.addcourse-form-message').html("Something went wrong please try again later");
          $('.addcourse-submit-btn').show();
        }
      }
    );
  }
}
