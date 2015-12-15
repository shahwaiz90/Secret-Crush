 <?php

//This file will merge the images of user on a backgroundwith with some overlay of heart image.
include "conn.php";

if(isset($_POST['var1']) && isset($_POST['var2'])  && isset($_POST['var3']) && isset($_POST['var4'])  && isset($_POST['var5']))
{
	$name 			= 	mysql_real_escape_string($_POST['var1']);
	$path 			= 	mysql_real_escape_string($_POST['var2']);
	$email 			= 	mysql_real_escape_string($_POST['var3']); 
	$userName 		= 	mysql_real_escape_string($_POST['var4']); 
	$userDp 		= 	mysql_real_escape_string($_POST['var5']); 

}

  $uid   			=	md5(microtime().rand()); //Some random value renamed to image to save them.

  //Width & Height of user picture
  $width 			= 	210;
  $height 			= 	244;

  //Background Image
  $base_image 		= 	imagecreatefrompng("images/bgadjust.png"); 
 
  //Friend Dp
  $FriendDpImage 	= 	new Imagick($userDp);
  $FriendDpImage->setImageFormat("png");  
  $FriendDpImage->roundCorners(20,20);
  $FriendDpImage->resizeImage(20,20,Imagick::FILTER_LANCZOS,1);
  $FriendDpImage->setBackgroundColor(new ImagickPixel('transparent')); 
  $FriendDpImage->writeImage("rounded.png"); 
    
  //UserDP
  $UserDPImage 		= 	new Imagick($path);
  $UserDPImage->setImageFormat("png");  
  $UserDPImage->roundCorners(20,20);
  $UserDPImage->resizeImage(210,244,Imagick::FILTER_LANCZOS,1);
  $UserDPImage->setBackgroundColor(new ImagickPixel('transparent')); 
  $UserDPImage->writeImage("rounded.png");
  
  //HeartImage
  $HeartImage 		= 	new Imagick("images/bk.jpg");
  $HeartImage 		->	setImageFormat("png");  
  $HeartImage 		->	resizeImage(120,100,Imagick::FILTER_LANCZOS,1);
  $HeartImage 		->	setBackgroundColor(new ImagickPixel('transparent')); 
  $HeartImage 		->	writeImage("heart.png");
	 
  $top_image1 		= 	imagecreatefrompng("rounded.png"); 
  $top_image2 		= 	imagecreatefrompng("rounded2.png"); 
  $top_image4 		= 	imagecreatefrompng("images/gg.png");  
  
  //Path of this to be saved image
  $merged_image 	= 	"dps/$uid.png";
 
 imagesavealpha($top_image1, true);
 imagealphablending($top_image1, true);

 imagesavealpha($top_image2, true);
 imagealphablending($top_image2, true);


 imagecopy($base_image, $top_image2, 280, 23, 0, 0, $width, $height); //right side frame
 imagecopy($base_image, $top_image1, 40,23, 0, 0, $width, $height); //Left side photo frame
 
 function TextOverlay(){
 	$textimage  		= 	new Imagick();
	$draw 			= 	new ImagickDraw();
	$pixel 			= 	new ImagickPixel( 'transparent' );
 		/* New image    */
	$textimage  		->newImage(600, 600, $pixel);
	
		/* Black text  */
	$draw->setFillColor('blue');
	
		/* Font properties  */
	$draw->setFont('Bookman-DemiItalic');
	$draw->setFontSize( 20 );
	
		/* Create text */
	 $textimage->annotateImage($draw, 5,20, 0, "$name has a secret CRUSH on YOU!");
	
		/* Give image a format */
	$textimage->setImageFormat('png');  
	$textimage->writeImage("rounded3.png");  
  
	$top_image3 		= 	imagecreatefrompng("rounded3.png");    
 }

 function MergeImages(){

 	imagesavealpha($top_image3, true);
	imagealphablending($top_image3, true);

	imagesavealpha($top_image4, true);
	imagealphablending($top_image4, true);	

	//imagecopy($base_image, $top_image4, 100,150, 0, 0,128, 128); //heart
	imagecopy($base_image, $top_image3, 105,0, 0, 0, 600, 600); //text
	 
	imagepng($base_image, $merged_image);
 }

function SaveInDB(){
	 $insert =      mysql_query("insert into friendzone (`uid`, `name`, `path`,`email`,`fromName`,`fromPath`) values('".$uid."','".$name ."','".$merged_image."','".$email."','".$userName."','".$userDp."')");
	if($insert){
		echo $name."|".$merged_image;	//Sending Response Name of the Person and Merged Image.
	} 	
	else{
		echo "fail";	
	}
	
}

 TextOverlay();   
 MergeImages();
 SaveInDB();


?>