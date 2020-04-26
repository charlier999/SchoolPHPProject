<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: loginfailed.php
	Date: Mar 31, 2020
	
	Description:
	Page for when a user fails the login
 -->
<?php 
include_once 'myfuncs.php';
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Login Failed</title>
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
		  /*Responces*/
		  #P_Msg
		  {
		      font-size: 150%;
		  }
		  #P_Res
		  {
		      font-size: 150%;
		  }
		</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>Login Failed</h2>
		</header>
		<hr>
		<?php  echo webpageTemplateString(); ?>
		<hr>
		<p id='P_Res'><?php echo getResponce()?></p>
		<p id='P_Msg'>Please attempt to login again.</p>
	</body>
</html>