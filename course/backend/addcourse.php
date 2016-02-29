<?php include ("../../inc/header.inc.php"); ?>
<?php

if(!$global_uid || $global_usertype != 3)
{
	header("Location: ".$g_url."misc/error.php");
}
else {
	/* Get parameters */
	if(isset($_POST['course_name']))
		$course_name = mysqli_real_escape_string($con,$_POST['course_name']);
	if(isset($_POST['course_about']))
		$course_about = mysqli_real_escape_string($con,$_POST['course_about']);
	if(isset($_POST['course_fee']))
		$course_fee = mysqli_real_escape_string($con,$_POST['course_fee']);
	if(isset($_POST['course_lang']))
		$course_lang = mysqli_real_escape_string($con,$_POST['course_lang']);
	if(isset($_POST['course_syllabus']))
		$course_syllabus = mysqli_real_escape_string($con,$_POST['course_syllabus']);
	if(isset($_POST['course_prereqs']))
		$course_prereqs = mysqli_real_escape_string($con,$_POST['course_prereqs']);
	if(isset($_POST['course_difficulty']))
		$course_difficulty = mysqli_real_escape_string($con,$_POST['course_difficulty']);
	if(isset($_POST['course_startdate']))
		$course_startdate = mysqli_real_escape_string($con,$_POST['course_startdate']);
	if(isset($_POST['course_enddate']))
		$course_enddate = mysqli_real_escape_string($con,$_POST['course_enddate']);

	$timenow = date('Y-m-d H:i:s');
	/* Populate the course table*/
	$query = "INSERT INTO courses (course_name, course_description, course_syllabus, prereq, language, fees, start_date, end_date, skill_level, author_id, time_added)
	VALUES ('$course_name','$course_about','$course_syllabus','$course_prereqs','$course_lang', '$course_fee', '$course_startdate', '$course_enddate', '$course_difficulty', '$global_uid', '$timenow')";
	//echo $query;
	mysqli_query($con,$query);
	$courseid = mysqli_insert_id($con);//GEt primary key
	//Add the faculty as instructor
	mysqli_query($con, "INSERT INTO taught_by (faculty_id, course_id) VALUES ((SELECT faculty_id FROM faculty WHERE user_id = '$global_uid'),'$courseid')");
	$result = array('status' => 1,'msg'=>'course_added', 'courseid' => $courseid);
		echo json_encode($result);
}
?>
