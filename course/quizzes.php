<?php include("../inc/header.inc.php");?>
<?php
$course_name = "";
$coursepicurl = $s3bucketurl."default.jpg";//course pic url is set to default image
$needlogin = 1;//variable is set to 1 if login is absolutely necessary
$coursenotfound = 0;
$editable = 0;
if(!isset($_REQUEST['c']) || $_REQUEST['c'] == "")//parameter for user id is not set
{
  $coursenotfound = 1;
}
else//uid parameter is set
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
  }
  else//For invalid course ids
  {
    $coursenotfound = 1;
  }
}
if($global_uid)
{
  $query = "SELECT *
            FROM enrolled
            WHERE enrolled.course_id = $courseid
            AND enrolled.student_id IN (
              SELECT student_id
              FROM students
              WHERE students.user_id = $global_uid
            )";
  $result = mysqli_query($con,$query);
  $numResults = mysqli_num_rows($result);
  if($numResults)
    $enrolled = 1;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title><?php echo $course_name ? "Quizzes of ".$course_name:"Course Not Found" ;?> - dbms3</title>
    <?php global_stylesheets();?>
  </head>
  <body class="">
    <?php
    if($editable == 1)
      top_banner('course');
    else
      top_banner();
    ?>
    <?php
    if(isset($needlogin) && $needlogin == 1 && !$global_uid)
    {
       include("../misc/views/needlogin.php");
    }
    else if($coursenotfound)
    {
       include("views/notfound.php");
    }
    else if($global_uid)
    {
       include("views/quizzes.php");
    }
    include("../inc/footer.php");
    ?>
    <?php global_modals();?>
    <?php if(!$enrolled)enrollmodal();?>
    <?php global_js('course');?>
  </body>
</html>
