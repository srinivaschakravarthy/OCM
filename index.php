<?php include("inc/header.inc.php");
error_reporting(E_ALL);?>
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
      include("views/loggedin.php");
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
