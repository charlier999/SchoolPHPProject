<!DOCTYPE html>

<!-- 
	Author: Charles Davis
	Date: 2/20/2020
	File: loginresponse.html
	
	Description:
	Depresiated. no longer used.

 -->
<?php 
include_once('myfuncs.php');
include_once('loginhandler.php');
?>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Login Response</title>
	</head>
	<body>
		<ul>
			<li style='display:inline'><a href='indexLoggedIn.php'>Main Menu</a></li>
			<li style='display:inline'><a href="wami.php">Settings</a></li>
			<li style='display:inline'><a href="blogpost.php">Create a Blog Post</a></li>
			<?php 
			if (checkAdminAccess())
		      {
		          echo "<li style='display:inline'><a href='adminAccess.html'>Admin Settings</a></li>";
		      }
		      ?>
		</ul>
		<hr>
		<h2>
			<?php 
			echo "Hello " . getUserNameLH() . "! <p>" . getResponce() . "</p>"; 
			?>
		</h2>
	</body>
</html>