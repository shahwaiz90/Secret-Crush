<?php
//Author Ahmad Shahwaiz
//www.ahmadshahwaiz.com
session_start();
$con = mysql_connect("localhost","user","pass");
if(!$con)
{
	die("Connection Error");
	
}
mysql_select_db("db",$con);  
?>