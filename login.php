<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: login.html
	Date: February 6, 2020
	
	Description: 
	An HTML form to take user inputs for login 
 -->
<?php 
include_once 'myfuncs.php';
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Login</title>
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
    	   /*Login Form*/
    	   #F_Form
    	   {
    	    margin: auto;
		  	width: 35%;
		  	
		  	font-size: 150%;
		  	text-align: center;
		  	
		  	border-style: solid;
		  	border-width: thin;
    	   }
    	   #L_UN{}
    	   #I_UN{}
    	   #L_P{}
    	   #I_P{}
    	   #B_Submit{}
		</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>Login</h2>
		</header>
		<hr>
		<?php  echo webpageTemplateString(); ?>
		<hr>
		<form id='F_Form' action="loginhandler.php" method="post">
    		<label id='L_UN'>User Name</label>
    		<input id='I_UN' type="text" name="userName">
    		<br>
    		<label id='L_P'>Password</label>
    		<input id='I_P' type="password" name="userPassword">
    		<br>
    		<input id='B_Submit' type="submit" name="userSubmit">
		</form>
	</body>
</html>


		
