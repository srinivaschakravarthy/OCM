<?php include("../inc/header.inc.php");?>
<?php
$course_name = "";
$coursepicurl = $s3bucketurl."default.jpg";//course pic url is set to default image
$needlogin = 1;//variable is set to 1 if login is absolutely necessary
$coursenotfound = 0;
$lecturenotfound = 0;
$editable = 0;
$enrolled = 0;
if(!isset($_REQUEST['c']) || $_REQUEST['c'] == "")//parameter for user id is not set
{
  $coursenotfound = 1;
}
else//course id parameter is set
{
  $courseid = $_REQUEST['c'];
  $query = "SELECT * FROM courses where course_id='$courseid'";
  $result = mysqli_query($con,$query);
  $numResults = mysqli_num_rows($result);
  if($numResults)
  {
    $coursedata = mysqli_fetch_assoc($result);
    $course_name = $coursedata['course_name'];
    $course_about = $coursedata['course_description'];
    $course_prereqs = $coursedata['prereq'];
    $course_syllabus = $coursedata['course_syllabus'];
    $course_fee = $coursedata['fees'];
  }
  else//For invalid course ids
  {
    $coursenotfound = 1;
  }
  //Now that we have found course details get lecture data
  if(!isset($_REQUEST['l']) || $_REQUEST['l'] == "")
  {
    $lecindex = 1;//If l variable is not set, set it to the first lecture
  }
  else//Index of the lecture is set
  {
    $lecindex = $_REQUEST['l'];
  }
  $query = "SELECT *
            FROM lectures
              LEFT OUTER JOIN text_lectures
                ON (text_lectures.lec_id = lectures.lec_id AND lectures.type = 'text')
              LEFT OUTER JOIN video_lectures
                ON (video_lectures.lec_id = lectures.lec_id AND lectures.type = 'video')
            WHERE lectures.index = $lecindex AND lectures.course_id = $courseid";
  $result = mysqli_query($con, $query);
  if(mysqli_num_rows($result))
  {
    $lecturedata = mysqli_fetch_assoc($result);
    //print_r($lecturedata);
  }
  else
  {
    $lecturenotfound = 1;
  }
}
if($global_usertype == 3)//If the viewing user is a faculty
{
  //Query to check if the current course is taught by the viewing user user
  $query = "SELECT *
            FROM taught_by
            WHERE taught_by.course_id = $courseid
            AND taught_by.faculty_id IN (
              SELECT faculty_id
              FROM faculty
              WHERE faculty.user_id = $global_uid
            )";
  $result = mysqli_query($con,$query);
  $numResults = mysqli_num_rows($result);
  if($numResults)
  {
    //If so then the current viewing user has access to edit the course info
    $editable = 1;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>New Lecture to <?php echo $course_name; ?> - dbms3</title>
    <?php global_stylesheets();?>
  </head>
  <body class="">
    <?php
    top_banner();
    if(isset($needlogin) && $needlogin == 1 && !$global_uid)
    {
      include("../misc/views/needlogin.php");
    }
    elseif ($global_usertype != "3" || $editable == 0) {
      include("../misc/views/accessdenied.php");
    }
    else
    {
      include("views/addlecture.php");
    }
    include("../inc/footer.php");
    ?>
    <?php global_modals();?>
    <?php global_js();?>
    <script src="<?php echo $g_url;?>course/js/addlecture.js"></script>
  </body>
</html>
