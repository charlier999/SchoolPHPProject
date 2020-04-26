<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: logout.php
	Date: Mar 25, 2020
	
	Description:
	   The logged out page for when a user 
	   logs out of thier account
 -->
<?php 
include('myfuncs.php');
userLogOut();
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Logged out</title>
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
		  /*
		</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>You have been logged out!</h2>
		</header>
		<hr>
		<h3 id='NavBar'>
		<a href='login.php'>Login</a>  |  <a href='register.html'>Register</a>  |  <a href='index.html'>Home</a>
        </h3>
        <hr>
	</body>
</html>