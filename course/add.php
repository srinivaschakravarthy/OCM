<?php include("../inc/header.inc.php");?>
<?php
$needlogin = 1;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>New course - dbms3</title>
    <?php global_stylesheets();?>
  </head>
  <body class="">
    <?php
    top_banner();
    if(isset($needlogin) && $needlogin == 1 && !$global_uid)
    {
      include("../misc/views/needlogin.php");
    }
    elseif ($global_usertype != "3") {
      include("../misc/views/accessdenied.php");
    }
    else
    {
      include("views/addcourse.php");
    }
    include("../inc/footer.php");
    ?>
    <?php global_modals();?>
    <?php global_js('course');?>
    <script src="<?php echo $g_url;?>course/js/addcourse.js"></script>
  </body>
</html>
