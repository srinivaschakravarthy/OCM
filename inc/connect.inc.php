<?php

define('DB_HOST','10.5.18.68');
define('DB_NAME','13CS10055');
define('DB_USER','13CS10055');
define('DB_PASSWORD','cse12');
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());

/*Global urls*/
$g_url = "http://localhost/dbms3/";
$s3bucketurl = "http://localhost/dbms3/uploads/";
// $s3bucketurl = "https://s3-ap-southeast-1.amazonaws.com/dbms3/";

date_default_timezone_set('Asia/Kolkata');

?>
