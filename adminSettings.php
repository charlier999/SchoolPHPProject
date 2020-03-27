<!DOCTYPE html>
<!-- 
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
		
	</head>
	<body>
		<header>
			<img src="sampleLogo.png" width="40" height="40" alt="LOGO">
			<h2 style="display: inline">Admin Settings</h2>
		</header>
		<hr>
			<ul><?php echo webpageTemplateString(); ?></ul>
		<hr>
		<ul>
			<li><a href='viewAllUsersPage.php'>All Users List</a><li>
			<li><a href='viewAllPostDataPage.php'>All Posts Data</a></li>
		</ul>
	</body>
</html>