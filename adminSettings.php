<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: adminSettings.php
	Date: Mar 26, 2020
	
	Description:
	The settings page for admins
	
 -->
<?php 
include_once 'myfuncs.php';
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Admin Settings</title>
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
    	   /*Page Links*/
    	   #AULlink{}
    	   #APDlink{}
		  
		</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id="TopPageName">Admin Settings</h2>
		</header>
		<hr>
		<?php  echo webpageTemplateString(); ?>
		<hr>
		<ul>
			<li id="AULlink"><a href='viewAllUsersPage.php'>All User Data</a></li>
			<li id="APDlink"><a href='viewAllPostDataPage.php'>All Posts Data</a></li>
		</ul>
	</body>
</html>