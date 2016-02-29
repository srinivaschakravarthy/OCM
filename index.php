<?php
include("inc/header.inc.php");
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>DBMS Assignment - 3</title>
  <?php
    global_stylesheets();
  ?>
</head>
<body>
  <?php
    top_banner('home');
    if($global_uid)
    {
      if($global_usertype == "1")
        include("views/sdashboard.php");//Include student dashboard if user type is 1
      else if($global_usertype == "3")
        include("views/fdashboard.php");//Include faculty dashboard if user type is 3
      elseif ($global_usertype == "2")
        include("views/pdashboard.php");//Include parent dashboard if user type is 2
    }
    else
    {
      include("views/notloggedin.php");
    }
    include("inc/footer.php");
    global_modals();
  ?>
  <?php global_js();?>
  </body>
</html>
