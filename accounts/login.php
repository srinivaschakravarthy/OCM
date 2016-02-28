<?php include("../inc/connect.inc.php"); ?>
<?php
/* get parameters */
$email = mysqli_real_escape_string($con,$_POST['email']);
$password1 = mysqli_real_escape_string($con,$_POST['password']);
$password2 = md5($password1);

$nakedemail = $email;
$nakedemail = str_replace(array('.', ','), '' , $nakedemail);

$strSQL = mysqli_query($con,"SELECT * from users where nakedemail='$nakedemail' and password='$password2'");
$Results = mysqli_fetch_array($strSQL);
session_start();
if(count($Results)>=1)
{
	/* Entered credentials exist in the table -- set the session variable and return status 1 to front end*/
	$_SESSION["email"] = $email;
	$_SESSION["user_type"] = $Results['type'];
	$result = array('status' => 1, 'msg' => 'Credentials matched');
	echo json_encode($result);
}
else
{
	$result = array('status' => 0, 'msg' => 'Credentials mismatched');
	echo json_encode($result);
}
?>
