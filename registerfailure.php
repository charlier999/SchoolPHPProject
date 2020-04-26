<!DOCTYPE html>
<!--
    Project: Milestone
	Author: Charles Davis
	Date:	Mar 25, 2020
	File:	
	
	Description:
	   The failed to register page for when a registration 
	   is not able to complete
	   
	TODO:
	   Change layout to fit standard layout 
-->
<?php 
include('myfuncs.php');
include('registerhandler.php');
?>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Registration Failed</title>
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
    	   #H2_MSG{}
    	   #P_Res{}
    	   #P_RegAgain{}
    	       		  
    	</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>Home</h2>
		</header>	
		<hr>
		<?php  echo webpageTemplateString(); ?>
		<hr>
		
		<h2 id='H2_MSG'>You failed to Register.</h2>
		<?php echo getResponceRH(); ?>
		<p id='P_RegAgain'>Please <a href='register.html'>register</a> again.</p>
	</body>
</html>