<?php
session_start();
$DB_User = "";
$DB_Pass = "";
$DB_Name = "";

$con = mysql_connect("localhost",$DB_User,$DB_Pass);
if(!$con)
{
	die("Connection Error");
	s
}
mysql_select_db($DB_Name,$con);  
?>