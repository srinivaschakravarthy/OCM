<?php include("../inc/header.inc.php");?>
<?php
$course_name = "";
$coursepicurl = $s3bucketurl."default.jpg";//course pic url is set to default image
$needlogin = 0;//variable is set to 1 if login is absolutely necessary
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
    $userdata = mysqli_fetch_assoc($result);
    $course_name = $userdata['course_name'];
    $course_about = $userdata['course_description'];
    $course_prereqs = $userdata['prereq'];
    $course_syllabus = $userdata['course_syllabus'];
  }
  else//For invalid course ids
  {
    $coursenotfound = 1;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title><?php echo $course_name ? $course_name:"Course Not Found" ;?> - dbms3</title>
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
    if(isset($needlogin) && $needlogin == 1)
    {
       include("../misc/views/needlogin.php");
    }
    else if($coursenotfound)
    {
       include("views/notfound.php");
    }
    else if(!$global_uid)
    {
       include("views/courseoverview.php");
    }
    include("../inc/footer.php");
    ?>
    <?php global_modals();?>
    <?php global_js('course');?>
  </body>
</html>
