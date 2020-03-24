<!DOCTYPE html>
<!-- 
	Author: Charles Davis
	File: blogpost.php
	Date: February 25, 2020
	
	Description:
	
 -->
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Create Blog Entry</title>
	</head>
	<body>
		<form action="posthandler.php" method="post">
			<header>
				<img src="sampleLogo.png" width="40" height="40" alt="LOGO">
				<!-- Make the sampleLogo.png smaller so 
    			     that the logo does not take up half of the page 
    			  -->
				<h2 style="display: inline">
					Create Blog Entry
				</h2>
			</header>

    		<hr>
    		<p>
    			<a href="index.html"> Home </a>
    		</p>
    		
    		<hr>
    		
    		<p>
    			<label> 
    				Title* 
    			</label> 
    			<br> 
    			<input type="text" name="title" maxlength="50" size="50">
    		</p>
    		<p>
    			<label> 
    				Content* 
    			</label> 
    			<br>
    			
    			<textarea name="content" rows="10" cols="50">
        		</textarea>
    		</p>
    		
    		<hr>
    		
    		<p>
    			<input type="submit" name="submit" value="Create">
    		</p>
    	</form>
	</body>
</html>