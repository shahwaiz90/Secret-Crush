<?php
include "conn.php";

//This file will save user all friends against their facebook ID & will also save user Object data

if(isset($_POST['var1']) && isset($_POST['var2']) && isset($_POST['var3']) && isset($_POST['var4']) && isset($_POST['var5']) && isset($_POST['var6']) && isset($_POST['var7']) && isset($_POST['var8']))
{
		$id 					= 	addslashes(mysql_real_escape_string($_POST['var1']));
		$name                   = 	addslashes(mysql_real_escape_string($_POST['var2']));
		$gender 				= 	addslashes(mysql_real_escape_string($_POST['var3'])); 
		$loc 		        	= 	addslashes(mysql_real_escape_string($_POST['var4'])); 
		$timezone 				= 	addslashes(mysql_real_escape_string($_POST['var5'])); 
		$verified 				= 	addslashes(mysql_real_escape_string($_POST['var6'])); 
		$fblink 				= 	addslashes(mysql_real_escape_string($_POST['var7'])); 
		$email                  = 	addslashes(mysql_real_escape_string($_POST['var8'])); 
		$friendName             = 	addslashes(mysql_real_escape_string($_POST['var9'])); 
		$friendUrl              = 	addslashes(mysql_real_escape_string($_POST['var10'])); 

		// Insert user record in the Database.
		$insert  = mysql_query("insert into masteruser (`fbid`, `name`, `gender`, `locale`, `timezone`, `verified`, `fblink`,`email`) values ('$id', '$name','$gender','$loc',$timezone, '$verified', '$fblink','$email')"); 
}

  $friendName  			= 	json_decode($friendName,true);
  $friendUrl  			= 	json_decode($friendUrl,true);
  $size  				=  	count($friendName); //count($friendArray); 
 
  $isIdAvailableRow 	= 	mysql_query("select userid from userfriends where id='".$id."' limit 1");
  $isIdAvailable 		=	mysql_num_rows($isIdAvailableRow);
  
  //If Id is not available (user is new)
  if($isIdAvailable == 0)
  {
  	 //Then insert all user friends in the against user's facebook Id.
	 for($i = 0; $i < $size; $i++){
	
		    $friendName2 		=  $friendName[$i]. "";
		    $friendUrl2 		=  $friendUrl[$i]. " ";
		 	$insert  			=  mysql_query("insert into userfriends (`userid`,`name`, `friendpic`) values('".$id."','".$friendName2."', '".$friendUrl2."')");
		  		
	} 
  }
 
?>