<?php
/* Database credentials.*/
if (!defined('DB_SERVER'))   define('DB_SERVER', 'localhost');
if (!defined('DB_USERNAME')) define('DB_USERNAME', 'pamcclel');
if (!defined('DB_PASSWORD')) define('DB_PASSWORD', 'Ozzie12!');
if (!defined('DB_NAME'))     define('DB_NAME', 'socialdestinationsdatabase');
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Error connecting to MySQL: " . mysqli_connect_error() . "\n "); }
?>