<?php
//Author Ahmad Shahwaiz
//www.ahmadshahwaiz.com
include "conn.php";


if(isset($_POST['var1']) && isset($_POST['var2']) && isset($_POST['var3']) && isset($_POST['var4']) && isset($_POST['var5']) && isset($_POST['var6']) && isset($_POST['var7']) && isset($_POST['var8']))
{
	$id 			= 	addslashes(mysql_real_escape_string($_POST['var1']));
	$name           = 	addslashes(mysql_real_escape_string($_POST['var2']));
	$gender 		= 	addslashes(mysql_real_escape_string($_POST['var3'])); 
	$loc 		    = 	addslashes(mysql_real_escape_string($_POST['var4'])); 
	$timezone 		= 	addslashes(mysql_real_escape_string($_POST['var5'])); 
	$verified 		= 	addslashes(mysql_real_escape_string($_POST['var6'])); 
	$fblink 		= 	addslashes(mysql_real_escape_string($_POST['var7'])); 
	$email          = 	addslashes(mysql_real_escape_string($_POST['var8']));  
 
 	$check 			= 	mysql_query("select fbid from masteruser where fbid='".$id."' limit 1");
  	$ch 			=	mysql_num_rows($check);
  	if($ch == 0)
  	{
		$insert  	= mysql_query("insert into masteruser (`fbid`, `name`, `gender`, `locale`, `timezone`, `verified`, `fblink`,`email`) values ('$id', '$name','$gender','$loc',$timezone, '$verified', '$fblink','$email')"); 
	}

} 
 
?>