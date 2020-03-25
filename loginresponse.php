<!DOCTYPE html>

<!-- 
	Author: Charles Davis
	Date: 2/20/2020
	File: loginresponse.html
	
	Description:
	Depresiated. no longer used.

 -->
<?php 
include('myfuncs.php');
include('loginhandler.php');
?>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Login Response</title>
	</head>
	<body>
		<h2>
			<?php 
			startLH();
			echo "Hello " . getUserID(); 
			echo getResponce();
			?>
		</h2>
		<ul>
			<li>
				<a href="index.html">
					Main Menu
				</a>
			</li>
			<li>
				<a href="wami.php">
					Account Info
				</a>
			</li>
			<li>
				<a href="blogpost.php">
					Create a Blog Post
				</a>
			</li>
		</ul>
		<hr>
		<ul>
			<li>
				<a href="adminAccess.html">
					Admin Debug Page -=- not for final
				</a>
			</li>
		</ul>
	</body>
</html>