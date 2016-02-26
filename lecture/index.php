<?php include("../inc/header.inc.php");?>
<?php
$needlogin = 1;//variable is set to 1 if login is absolutely necessary
$lecturenotfound = 0;
$editable = 0;
if(!isset($_REQUEST['id']) || $_REQUEST['id'] == "")//parameter for user id is not set
{
  $lecturenotfound = 1;
}
else//lecture id parameter is set
{

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title> - dbms3</title>
    <?php global_stylesheets();?>
  </head>
  <body class="">
    <?php
    if($editable == 1)
      top_banner('lecture');
    else
      top_banner();
    ?>
    <?php
    if(isset($needlogin) && $needlogin == 1)
    {
       include("../misc/views/needlogin.php");
    }
    else if($lecturenotfound)
    {
       include("views/notfound.php");
    }
    ?>
    <?php global_modals();?>
    <?php global_js('lecture');?>
  </body>
</html>
