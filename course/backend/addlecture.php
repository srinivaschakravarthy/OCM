<?php
include("../../inc/header.inc.php");
$lecindex = 1;
//Query to check if the current course is taught by the viewing user user
$timenow = date('Y-m-d H:i:s');

if(!$global_uid || $global_usertype != 3 || !isset($_REQUEST['courseid']))
{
  $result = array('status' => 0,'msg'=>'upload failed dsafdsakj');
}
else
{
  $courseid = $_REQUEST['courseid'];
  //Query to check if the user has access to add a lecture to the course
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
    if($_REQUEST['mode'] == 'video')
    {
      //Video file is necessary for video type
      if ( 0 < $_FILES['file']['error'] ) {
          //echo 'Error: ' . $_FILES['file']['error'] . '<br>';
          $result = array('status' => 0,'msg'=>'upload failed in file validation');
      }
      elseif ($_REQUEST['ext'] != 'mp4' && $_REQUEST['ext'] != 'webm' && $_REQUEST['ext'] != 'ogg') {
        # code...
        $result = array('status' => 2,'msg'=>'Unsupported Extension');
      }
      else {
        $_FILES['file']['name'] = "lec_vid_".time();//Initialize file name to time
        $storedfilename = $_FILES['file']['name'];
        $storedfilename .= ".".$_REQUEST['ext'];
        move_uploaded_file($_FILES['file']['tmp_name'], '../../uploads/' . $storedfilename);
        //Query to get the max index of the lectures so far uploaded
        $query = "SELECT MAX(lectures.index) AS lecindex FROM lectures WHERE course_id = $courseid";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result))
        {
          $lecindex = mysqli_fetch_assoc($result)['lecindex'] + 1;
        }
        //Now insert into lectures table
        $insertquery = "INSERT INTO lectures (course_id, lectures.index, type, time_added) VALUES ($courseid, $lecindex, 'video', '".$timenow."')";
        //echo json_encode($insertquery);
        mysqli_query($con, $insertquery);
        $lectureid = mysqli_insert_id($con);//GEt primary key
        mysqli_query($con, "INSERT INTO video_lectures (lec_id, description, video_url, time_added) VALUES ($lectureid, '".$_REQUEST['video_desc']."', '".$storedfilename."', '".$timenow."')");
        $result = array('status' => 1, 'msg' => 'upload successful', 'lecindex' => $lecindex);
      }
    }
    elseif ($_REQUEST['mode'] == 'text') {
      //Check if there is a file
      if($_REQUEST['ext'])
      {
        if ( 0 < $_FILES['file']['error'] ) {
            //echo 'Error: ' . $_FILES['file']['error'] . '<br>';
            $result = array('status' => 0,'msg'=>'upload failed');
        }
        elseif ($_REQUEST['ext'] != 'pdf') {
          # code...
          $result = array('status' => 2,'msg'=>'Unsupported Extension');
        }
        else {
          $_FILES['file']['name'] = "lec_pdf_".time();//Initialize file name to time
          $storedfilename = $_FILES['file']['name'];
          $storedfilename .= ".".$_REQUEST['ext'];
          move_uploaded_file($_FILES['file']['tmp_name'], '../../uploads/' . $storedfilename);
          //Query to get the max index of the lectures so far uploaded
          $query = "SELECT MAX(lectures.index) AS lecindex FROM lectures WHERE course_id = $courseid";
          $result = mysqli_query($con, $query);
          if(mysqli_num_rows($result))
          {
            $lecindex = mysqli_fetch_assoc($result)['lecindex'] + 1;
          }
          mysqli_query($con, "INSERT INTO lectures (course_id, lectures.index, type, time_added) VALUES ($courseid, $lecindex, 'text', '".$timenow."')");
          $lectureid = mysqli_insert_id($con);//GEt primary key
          //Insert into text lectures table
          mysqli_query($con, "INSERT INTO text_lectures(lec_id, lec_body, file_url, time_added) VALUES ($lectureid, '".$_REQUEST['textlec_desc']."', '".$storedfilename."', '".$timenow."')");
          $result = array('status' => 1, 'msg' => 'upload successful', 'lecindex' => $lecindex);
        }
      }
      else {
        //There is no file -- lecture is just simple text
        //Query to get the max index of the lectures so far uploaded
        $query = "SELECT MAX(lectures.index) AS lecindex FROM lectures WHERE course_id = $courseid";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result))
        {
          $lecindex = mysqli_fetch_assoc($result)['lecindex'] + 1;
        }
        //Populate lectures table
        mysqli_query($con, "INSERT INTO lectures (course_id, lectures.index, type, time_added) VALUES ($courseid, $lecindex, 'text', '".$timenow."')");
        $lectureid = mysqli_insert_id($con);//GEt primary key
        //Insert into text lectures table
        mysqli_query($con, "INSERT INTO text_lectures(lec_id, lec_body, time_added) VALUES ($lectureid, '".$_REQUEST['textlec_desc']."', '".$timenow."')");
      }
    }
  }
  else {
    $result = array('status' => 0,'msg'=>'upload failed something went wrong');
  }
}
echo json_encode($result);

?>
