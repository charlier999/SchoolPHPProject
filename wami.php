<!DOCTYPE html>

<!-- 
	Author: Charles Davis
	Date: 2/20/2020
	File: wami.php
	
	Description:
	   User's settings
	   
    TODO:
        - Make into an actual settings page
        - Change to standard layout
 -->
<?php 
include('myfuncs.php');
?>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Login Response</title>
	</head>
	<body>
		<h2>
			Greetings! My User ID is 
			<?php echo getUserID();?>
		</h2>
	</body>
</html>