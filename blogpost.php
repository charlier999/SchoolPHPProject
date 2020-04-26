<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: blogpost.php
	Date: February 25, 2020
	
	Description:
	Blogpost creation page
 -->
 <?php 
 include 'myfuncs.php';
 ?>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Create Post</title>
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
    	   /*Blog Post Create*/
    	   #F_Form
    	   {
    	    margin: auto;
		  	width: 50%;
		  	
		  	font-size: 150%;
		  	text-align: center;
		  	
		  	border-style: solid;
		  	border-width: thin;
    	   }
    	   #L_Title{}
    	   #I_Title{}
    	   #L_Content{}
    	   #I_Content{}
    	   #I_Submit{}
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
		<form id='F_Form' action="posthandler.php" method="post">
			<label id='L_Title'>Title*</label> 
			<br> 
			<input id='I_Title' type="text" name="title" maxlength="50" size="50">
			<br>
			<label id='L_Content'>Content*</label> 
			<br>
			<textarea id='I_Content' name="content" rows="10" cols="50"></textarea>
			<br>
			<input id='I_Submit' type="submit" name="submit" value="Create">
		</form>
	</body>
</html>