<?php

define('DB_HOST','localhost');
define('DB_NAME','dbms3');
define('DB_USER','root');
define('DB_PASSWORD','');
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());

/*Global urls*/
$g_url = "http://localhost/dbms3/";
$s3bucketurl = "https://s3-ap-southeast-1.amazonaws.com/witlore/";

date_default_timezone_set('Asia/Kolkata');

?>
