<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: createpostresponse.php
	Date: Mar 25, 2020
	
	Description:
	The response page for when a user submits a post
 -->
<?php 
include_once 'myfuncs.php';
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Put Title Here</title>
		<style type="text/css">
		  /* TopPageBar */
		  #TopPageName
		  {
		      display: inline;		     
		      font-size:250%;
		  }
		  #IMG_Logo{}
		   
		  body
		  {
		  	background-color: rgb(230, 255, 255);
		  }
		  
		  /*All Links Bar*/
		  #NavBar
		  {
		  	text-aline: left;
		  }
    	  /*Responce*/
    	  #P_Res
    	  {
    	       font-size: 150%; 
    	  }
		</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>Create Post</h2>
		</header>
		<hr>
		<?php echo webpageTemplateString(); ?>
		<hr>
		<?php echo getResponcePH();?>
	</body>
</html>