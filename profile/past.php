<?php include("../inc/header.inc.php");?>
<?php
$fname = "";
$lname = "";
$profilepicurl = $s3bucketurl."default.jpg";//Profile pic url is set to default image
$needlogin = 0;//variable is set to 1 if login is absolutely necessary
$usernotfound = 0;
$editable = 0;
if(!isset($_REQUEST['u']) || $_REQUEST['u'] == "")//parameter for user id is not set
  {
    if(isset($_SESSION["email"]))//Parameter is not set and the user is logged in
    {
      $email = $_SESSION["email"];
      $query = "SELECT * FROM users where users.email='$email'";
      $result = mysqli_query($con,$query);
      $numResults = mysqli_num_rows($result);
      if($numResults)
      {
        $userdata = mysqli_fetch_assoc($result);
        $fname = $userdata['fname'];
        $lname = $userdata['lname'];
        $profileid = $userdata['user_id'];
        $editable = 1;
      }
    }
    else//User not logged in but trying to access his own homepage --politely prompt login
    {
      $needlogin = 1;
    }
  }
  else//uid parameter is set
  {
    $profileid = $_REQUEST['u'];
    $query = "SELECT * FROM users where users.user_id='$profileid'";
    $result = mysqli_query($con,$query);
    $numResults = mysqli_num_rows($result);
    if($numResults)
    {
      $userdata = mysqli_fetch_assoc($result);
      $fname = $userdata['fname'];
      $lname = $userdata['lname'];
      if(isset($global_uid) && $profileid == $global_uid)//If I'm in my own page
      {
        $editable = 1;
      }
    }
    else//For invalid profile ids
    {
      $usernotfound = 1;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Past courses of <?php echo $fname." ".$lname;?> - dbms3</title>
    <?php global_stylesheets();?>
  </head>
  <body class="">
    <?php
    if($editable == 1)
      top_banner('profile');
    else
      top_banner();
    ?>
    <?php
    if(isset($needlogin) && $needlogin == 1)
    {
       include("../misc/views/needlogin.php");
    }
    else if($usernotfound)
    {
       include("views/notfound.php");
    }
    else
    {
       include("views/past.php");
    }
    include("../inc/footer.php");
    ?>
    <?php global_modals();?>
    <?php global_js('profile');?>
  </body>
</html>
