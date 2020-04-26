<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: editBPresponse.php
	Date: Apr 3, 2020
	
	Description:
	The displays the response from the editBPHandler to the user
 -->
<?php 
include_once('myfuncs.php');
include_once('editBPHandler.php');
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Edit Post</title>
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
    	   /*Response*/
    	   #P_Res
    	   {
    	       font-size: 125%;
    	   }
		</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>Edit Post</h2>
		</header>
		<hr>
		<?php  echo webpageTemplateString(); ?>
		<hr>
			<p><?php echo getResponceEPH() ?></p>
	</body>
</html>