function addcourse()
{
  //alert("Hi");
  var course_name = $("#course_name").val();
  var course_about = $("#course_about").val();
  var course_fee = $("#course_fee").val();
  var course_lang = $("#course_lang").val();
  var course_syllabus = $("#course_syllabus").val();
  var course_prereqs = $("#course_prereqs").val();
  var course_difficulty = $("#course_difficulty").val();
  var course_startdate = $("#course_startdate").val();
  var course_enddate = $("#course_enddate").val();
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
      success:function() {

      }
      error: function() {

      }
    }
  );
}
