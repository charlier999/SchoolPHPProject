<!DOCTYPE html>
<!--
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
include_once('registerhandler.php');
?>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Registration Failed</title>
	</head>
	<body>
		<ul>
			<li style='display:inline'><a href='index.html'>Main Menu</a></li>
			<li style='display:inline'><a href='register.html'>Register</a></li>
		</ul>
		
		<hr>
		
		<h2>
			You failed to Register.
		</h2>
		
		<?php 
		    include_once('registerhandler.php');
		    echo "<p>" . getResponceRH() . "</p>";
		?>
		<p>
			Please register again.
		</p>
	</body>
</html>