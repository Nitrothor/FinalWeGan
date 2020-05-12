
<?php
define('DB_SERVER','localhost');
define('DB_USER','niyengar_mysql');
define('DB_PASS' ,'oYPKWw5ZBZ0V');
define('DB_NAME', 'niyengar_638');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>