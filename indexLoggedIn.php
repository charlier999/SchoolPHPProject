<!DOCTYPE html>
<!-- 
	Author: Charles Davis
	File: indexLoggedIn.php
	Date: Mar 25, 2020
	
	Description:
	
 -->
<?php 
include_once 'myfuncs.php';
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Logged In Home</title>
		
	</head>
	<body>
		<header>
			<img src="sampleLogo.png" width="40" height="40" alt="LOGO">
			<h2 style="display: inline">Home</h2>
		</header>
		<hr>
			<ul>
                <li style='display:inline'><a href='wami.php'>Settings</a></li>
                <li style='display:inline'><a href='logout.php'>Logout</a></li>
			</ul>
		<hr>
		<ul>
			<li><a href='blogpost.php'>Create Blog Post</a></li>
			<li><a href='viewposts.php'>View Posts</a></li>
		</ul>
	</body>
</html>