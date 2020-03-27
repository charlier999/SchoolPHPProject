<!DOCTYPE html>
<!-- 
	Author: Charles Davis
	File: logout.php
	Date: Mar 25, 2020
	
	Description:
	   The logged out page for when a user 
	   logs out of thier account
 -->
<?php 
include_once 'myfuncs.php';
userLogOut();
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Logged out</title>
		
	</head>
	<body>
		<header>
			<img src="sampleLogo.png" width="40" height="40" alt="LOGO">
			<h2 style="display: inline">You have been logged out!</h2>
		</header>
		<hr><ul><?php echo webpageTemplateString();?></ul><hr>
	</body>
</html>