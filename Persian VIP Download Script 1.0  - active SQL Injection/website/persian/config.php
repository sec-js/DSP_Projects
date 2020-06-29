<?php 
include("tarikh.php");
include("fun.php");
error_reporting(0);
$usernamedb = "root"; 
$passworddb = "Admin2015"; 
$serverdb = "localhost";
$db_conn = "persian";
$GLOBALS["localhost"]="0";

mysql_connect("$serverdb","$usernamedb","$passworddb") or die(mysql_error()); 
@mysql_select_db("$db_conn") or die(mysql_error()); 
?>
