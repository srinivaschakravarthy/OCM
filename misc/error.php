<?php include("../inc/header.inc.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Something went wrong! - dbms3</title>
    <?php global_stylesheets();?>
  </head>
  <body class="">
    <?php
      top_banner();
    ?>
    <div class="container">
    	<center>
        <br>
    		<img src="<?php echo $g_url; ?>images/oops.png">
        <h5>Something went wrong!</h5><hr>
        <a href="<?php echo $g_url; ?>" class="btn btn-large indigo white-text">Go back to Homepage</a><br><br><br>
    	</center>
    </div>

    <?php
    include("../inc/footer.php");
    ?>
    <?php global_modals();?>
    <?php global_js();?>
  </body>
</html>
