<?php
include("../../inc/header.inc.php");
$assignindex = 1;
//Query to check if the current course is taught by the viewing user user
$timenow = date('Y-m-d H:i:s');

if(!$global_uid || $global_usertype != 3 || !isset($_REQUEST['courseid']))
{
  $result = array('status' => 0,'msg'=>'upload failed dsafdsakj');
}
else
{
  $courseid = $_REQUEST['courseid'];
  //Query to check if the user has access to add a assignment to the course
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
    if($_REQUEST['mode'] == 'assign')
    {
      //Video file is necessary for video type
      if ( 0 < $_FILES['file']['error'] ) {
          //echo 'Error: ' . $_FILES['file']['error'] . '<br>';
          $result = array('status' => 0,'msg'=>'upload failed in file validation');
      }
      elseif ($_REQUEST['ext'] != 'pdf') {
        # code...
        $result = array('status' => 2,'msg'=>'Unsupported Extension');
      }
      else {
        $_FILES['file']['name'] = "assign_".time();//Initialize file name to time
        $storedfilename = $_FILES['file']['name'];
        $storedfilename .= ".".$_REQUEST['ext'];
        move_uploaded_file($_FILES['file']['tmp_name'], '../../uploads/assignments/' . $storedfilename);
        $prob_stmnt = $_REQUEST['prob_stmnt'];
        $assign_marks = $_REQUEST['assign_marks'];
        $assign_deadline = $_REQUEST['assign_deadline'];
        //Query to get the max index of the assignments so far uploaded
        $query = "SELECT MAX(assignments.aindex) AS assignindex FROM assignments WHERE course_id = $courseid";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result))
        {
          $assignindex = mysqli_fetch_assoc($result)['assignindex'] + 1;
        }
        //Now insert into assignments table
        $insertquery = "INSERT INTO assignments (course_id, assignments.aindex, prob_stmnt, time_added, marks, deadline) VALUES ($courseid, $assignindex, '".$prob_stmnt."' , '".$timenow."', $assign_marks, '".$assign_deadline." 23:59:59')";
        //echo json_encode($insertquery);
        mysqli_query($con, $insertquery);
        $result = array('status' => 1, 'msg' => 'upload successful', 'assignindex' => $assignindex);
      }
    }
    else {
    $result = array('status' => 0,'msg'=>'upload failed something went wrong');
    }
  }
  else {
  $result = array('status' => 0,'msg'=>'upload failed something went wrong');
  }
}
echo json_encode($result);

?>
