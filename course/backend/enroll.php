<?php include ("../../inc/header.inc.php"); ?>
<?php
if(isset($_POST['courseid']))
	$courseid = mysqli_real_escape_string($con,$_POST['courseid']);
if($global_uid)
{
  $query = "SELECT *
            FROM enrolled
            WHERE student_id IN (
              SELECT student_id
              FROM students
              WHERE user_id = $global_uid
            )
            AND course_id = $courseid";
  if(!mysqli_num_rows(mysqli_query($con,$query)))//Just checking if he is already enrolled
  {
    $timenow = date('Y-m-d H:i:s');
    $insertquery = "INSERT INTO enrolled (student_id, course_id, time_enrolled)
                    VALUES (
                      (
                        SELECT student_id
                        FROM students
                        WHERE user_id = $global_uid
                      ),
                      $courseid,
                      '".$timenow."'
                    )";
                    //echo $insertquery;
    mysqli_query($con, $insertquery);
  }
  header("Location: ".$g_url."course/?c=".$courseid."&new=1");
}
else
  header("Location: ".$g_url."course/?c=".$courseid);
?>
