<?php include ("../inc/connect.inc.php"); ?>
<?php
//print_r($_POST);
/* Get parameters */
if(isset($_POST['fname']))
	$fname = mysqli_real_escape_string($con,$_POST['fname']);
if(isset($_POST['lname']))
	$lname = mysqli_real_escape_string($con,$_POST['lname']);
if(isset($_POST['email']))
	$email = mysqli_real_escape_string($con,$_POST['email']);
if(isset($_POST['usertype']))
	$usertype = mysqli_real_escape_string($con,$_POST['usertype']);
if(isset($_POST['password']))
	$password = mysqli_real_escape_string($con,$_POST['password']);

$nakedemail = $email;
$nakedemail = str_replace(array('.', ','), '' , $nakedemail);
/* Check if the details already exist in the table */
$query = "SELECT nakedemail FROM users where nakedemail='$nakedemail'";
$result = mysqli_query($con,$query);
$numResults_email = mysqli_num_rows($result);

if( $_REQUEST['mode'] == 'valid_email')//First backend call with parameter valid_email to check if the email can be entered
{
	if($numResults_email>=1)//Email already registered
	{
		$result = array('status' => 1,'msg'=>'duplicate_email');
    	echo json_encode($result);
	}
    else
    {
    	$result = array('status' => 0,'msg'=>'email is peace!');
    	echo json_encode($result);
    }
}
else if($_REQUEST['mode'] == 'signup')
{
	$password1=md5($password);
	$timenow = date('Y-m-d H:i:s');
	/* Populate the users table*/
	mysqli_query($con,"INSERT INTO users (type, fname, lname, email, password, nakedemail, time_registered)
	VALUES ('$usertype','$fname','$lname','$email','$password1','$nakedemail','$timenow')");
	$u_id = mysqli_insert_id($con);//GEt primary key
	/* With the generated pk populate profiledata table */
	mysqli_query($con,"INSERT INTO profiledata (user_id) VALUES ('$u_id')");
	if($usertype == '1')
	{
		mysqli_query($con,"INSERT INTO students (user_id) VALUES ('$u_id')");
	}
	elseif ($usertype == '2')
	{
		mysqli_query($con,"INSERT INTO parents (user_id) VALUES ('$u_id')");
	}
	elseif ($usertype == '3')
	{
		mysqli_query($con,"INSERT INTO faculty (user_id) VALUES ('$u_id')");
	}

	session_start();
	$_SESSION["email"] = $email;
	$_SESSION["user_type"] = $usertype;

	$result = array('status' => 1,'msg'=>'signup success');
	echo json_encode($result);
}

?>
