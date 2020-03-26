<!DOCTYPE html>
<!-- 
	Author: Charles Davis
	File: logout.php
	Date: Mar 25, 2020
	
	Description:
	
 -->
<?php 
include_once 'myfuncs.php';
userLogOut();
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Put Title Here</title>
		
	</head>
	<body>
		<header>
			<img src="sampleLogo.png" width="40" height="40" alt="LOGO">
			<h2 style="display: inline">You have been logged out!</h2>
		</header>
		<hr><ul><?php echo webpageTemplateString();?></ul><hr>
	</body>
</html>