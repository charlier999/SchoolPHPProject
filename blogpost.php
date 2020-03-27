<!DOCTYPE html>
<!-- 
	Author: Charles Davis
	File: blogpost.php
	Date: February 25, 2020
	
	Description:
	Allows the user to create a blog post
 -->
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Create Blog Entry</title>
	</head>
	<body>
		<header>
			<img src="sampleLogo.png" width="40" height="40" alt="LOGO">
			<h2 style="display: inline">Admin Settings</h2>
		</header>
		<hr>
			<ul><?php echo webpageTemplateString(); ?></ul>
		<hr>
		<form action="posthandler.php" method="post">
			<label>Title*</label> 
			<br> 
			<input type="text" name="title" maxlength="50" size="50">
			<label>Content*</label> 
			<br>
			<textarea name="content" rows="10" cols="50"></textarea>
			<hr>
			<input type="submit" name="submit" value="Create">
		</form>
	</body>
</html>