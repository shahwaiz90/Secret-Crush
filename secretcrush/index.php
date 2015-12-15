<?php
include "conn.php";

?><!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Who has a Secret CRUSH on YOU!</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<head>
<style>
@font-face { font-family: Cutie; src: url('fonts/Cutie Patootie.ttf'); } 
#customFont {
font-family: Cutie
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files --> 
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Titillium+Web:200,300,600,400,700,900' rel='stylesheet' type='text/css'>
<!--- banner Slider starts Here --->  
  	
<style type="text/css">
.fblikes {width:692px;height:108px;overflow:hidden;position:relative;left:5px;bottom:-10px;}
.fblikes #iframe {position:absolute;top:-97px;left:-8px;width:600px;height:400px;}
</style> 
  
  <link href="css/script.css" rel="stylesheet" type="text/css" media="all" />
 
<!----//End-slider-script---->
<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".scroll").click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
	});
}); 
</script>
<div id="fb-root"></div>    
 <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '576006605868521',
      xfbml      : true,
      version    : 'v2.5'
    });  
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1524928871128113";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk')); 
    
  
  function inviteFriends(message){
    FB.ui({
      method: 'apprequests',if
      message: message,
      data:"576006605868521"
    }
         );
  }
  
  var flag =0;
  
  function mshuffle(o)
  {
    	for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    	return o;
  } 
 
  var auth = ""; 
  function sendRequestToFriends(text,title)
  { 
    	FB.login(function(response) 
    	{
      		if (response.authResponse) 
      		{
        		if(!flag) {
        		auth = response.authResponse;
		          flag=1; 
       			 }
       			  
		          processResult();
      		}
      		else 
      		{
        		processResult();
     		}
    	}
             , { scope: 'email,user_friends'}
             , { display: 'popup'}
            );
  }
  var email;
   function getEmail(){
         
  	FB.api('me?fields=email', function(response) { 
  	 
	      email = response["email"] ;
	        
	}); 
 	     
  }
  var myDp;
  var myName;
   function getMyDp(){
         
  	FB.api('me?fields=name,gender,picture.type(large)', function(response) { 
  	 
	      myDp= response.picture.data["url"];
	      myName = response["name"];  
	}); 
 	     
  }

  var friendData = new Array();
  var friendName = new Array();
  var friendUrl = new Array();
  function processResult()
  { 
    	var friends = new Array();	 
        getEmail();
        getMyDp();

    	FB.api('me/invitable_friends?fields=id,email,gender,name,picture.type(large)&limit=5000', function(response) { 
    	 
	        for (var i = 0; i < response.data.length; i++) 
	        {       //response.data.length
	          	friends[i] 	=  response.data[i].id; 
	          	friendData [i]  =  response.data[i].name+"|"+response.data[i].picture.data["url"];
	          	friendName[i] = response.data[i].name;
	           	friendUrl[i] = response.data[i].picture.data["url"];
	          	
	      	}
	      	  var jsonName = JSON.stringify(friendName);
	      	  var jsonUrl = JSON.stringify(friendUrl);
	      	  
	      mshuffle(friends);
	      mshuffle(friendData);
	      var res = friendData[0].split("|"); 
		    	 
		    	 var temp = res[0].split(" ");
		    	 var res1 = temp[0];
		    	 var res2 = res[1];
		    	         
		var uid = "";

		 $.ajax({
		    type: 'POST',
		    // make sure you respect the same origin policy with this url:
		    // http://en.wikipedia.org/wiki/Same_origin_policy
		    url: 'animateimages.php',
		    data: { 
		        'var1': res1,
		        'var2': res[1],
		        'var3': email,
		        'var4': myName,
		        'var5': myDp
		        
		    },
		    success: function(msg){
		    	uid  = msg; 
		    	 
		    	updateValue(uid) 
	    		}
		});
		   
	    });
   }
   var url;
   var pic2; 
   var name2; 
   
   function updateValue(uid)
   {  
   	var  name = uid.split("|");
   	 var pic = name[1];
   	 pic2 = pic;
   	  name2 = name[0]; 
   	  url = "http://www.ahmadshahwaiz.com/app/SecretCrush/index.php";
   	  document.getElementById("imgId").src=name[1]; 
	    	document.getElementById('imgId').style.width = '550px';
	    	document.getElementById("labelid").innerHTML = "OMG! <b>"+name[0] +"</b> has a <b>SECRET  CRUSH</b> on <b>YOU!</b><a onClick='shareOnFacebook(url,name2,pic2,myName)'><br/><b>--><font color='red'><u>Share on FACEBOOK!</u></font><--</a>"; 
   }
     
  </script>
  
  <link rel="stylesheet" type="text/css" media="screen" href="falling-in-love/hearts.min.css" /> 
</head><!--style="background-image:url(images/background.jpg)"-->
<body style="background-image:url(images/background.jpg);background-repeat: y-repeat;">   

<script type="text/javascript" src="falling-in-love/hearts.min.js"></script>
<script type="text/javascript">
    Hearts({
        element: document.body,  // display hearts within this element
        zIndex: -999999,         // create hearts at this z-index
        maxHearts: 955,           // maximum on screen at once
        newHeartDelay: 002,      // delay between creating new hearts
        colors: ['red', 'pink','purple'], // colors to be randomly selected from
        minOpacity: 0.2,         // minimum opacity
        maxOpacity: 1.0,         // maximum opacity
        minScale: 0.8,           // minimum scaling factor
        maxScale: 9.4,           // maximum scaling factor
        minDuration: 4,          // minimum seconds a heart can be on screen
        maxDuration: 18,         // maximum seconds a heart can be on screen
        endAfterNumHearts: 64,   // stop creating new hearts after this many have been created
        endAfterNumSeconds:1530   // stop creating new hearts after this many seconds
    });
</script>
<script type="text/javascript">Hearts();</script>
<!--- Header Starts Here -->
		 
	<!--- Header Ends Here --> 
	<!-- Banner Starts Here --->
	<div class="banner">
		<div class="container">
		<!-- Slideshow 4 -->
		    <div  id="top" class="callbacks_container">
			        	<center><div class="container">
			<h3 class="top-head"> </h3>
			<center><span class="line">
				<span class="sub-line"></span>
			</span><br> 
 <center><span id="customFont" style="font-size: xx-large; color:#043d5d;"><b> Who secretly has a crush on YOU!</b><br/>
Do you ever want to know who secretly loves you? Click the below button to find out! </span> </center>
							<center>
							<a href="#" onClick="sendRequestToFriends('Invite friends to see results!','')" >
								<div class="step1" id="step"><br>
								<button>See 'Who has a crush on YOU!'</button>
								</div>
							</a>
							
							</center><br> 
        <div id="aboveIframeDiv" style="padding:4px;width:563px;height:289px;margin:0 auto;box-shadow:0px 0px 10px #000;border:1px solid #888">
        	 <center><img id='imgId' width='550' height='280' src='images/friendzone.jpg'/></center>  
	        			 <center><div id="customFont"><span style='font-size:  xx-large; color:#043d5d;' id='labelid'><b>Which of your friend has a SECRET CRUSH on YOU, FIND OUT !</b></div></center> 
       <center><div class="fb-like" data-href="https://www.facebook.com/StoryApps/" data-layout="standard" data-action="like" data-show-faces="true" data-share="false"></div></center> 		 
       
      <div id="customFont"><span style='font-size:  xx-large; color:#043d5d;' id='labelid'><b>Developed by: </b>
      <div class="fb-follow" data-href="https://www.facebook.com/ahmad.shahwaiz.33" data-layout="standard" data-show-faces="true"></div>
       <br/><br/><br/><br/><br/> <br/><br/><br/><br/> </div>
					</div>
					 </div>
			<!-- End Of Slider -->
		</div>
	</div>
	  <div id="fb-root"></div>
<script>
function shareOnFacebook(url,name,pic,username)
    {   
    
FB.ui({ 
  method: 'share',   
  href: 'http://www.ahmadshahwaiz.com/app/SecretCrush/'+pic,
  picture: 'http://www.ahmadshahwaiz.com/app/SecretCrush/'+pic,
  caption: name+' has a secret crush on '+username,
  ref:'facebook,types',
  description: 'asdasd',
  name:'asdsad'
  
}, function(response){});
 
}
 </script>


</body>
</html>
