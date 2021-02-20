<?php
/* Database credentials.*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'pamcclel');
define('DB_PASSWORD', 'Ozzie12!');
define('DB_NAME', 'socialdestinationsdatabase');
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Error connecting to MySQL: " . mysqli_connect_error() . "\n "); }
?>