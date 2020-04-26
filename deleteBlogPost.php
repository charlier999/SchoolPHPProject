<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: deleteBlogPost.php
	Date: Apr 4, 2020
	
	Description:
	Page to confirm that the user wants to delete the post
 -->
<?php 
include_once 'myfuncs.php';
$id = $_GET['postID'];
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Deleate Post</title>
		<style type="text/css">
		  /* TopPageBar */
		  #TopPageName
		  {
		      display: inline;
		      font-size:250%;
		  }
		  #IMG_Logo{}
		   
		  body
		  {
		  	background-color: rgb(230, 255, 255);
		  }
		  
		  /*All Links Bar*/
		  #NavBar
		  {
		  	text-aline: left;
		  }
    	  /*Options*/
    	  #DIV_Question
    	  {
    	      margin: auto;
		      width: 35%;
		  	
		      font-size: 150%;
		      text-align: center;
		  
		      border-style: solid;
		      border-width: thin;
    	  }
    	  #B_Yes
    	  {
    	      padding: 15px 32px;
    	      font-size: 125%;
    	  }
    	  #B_No
    	  {
    	      padding: 15px 32px;
    	      font-size: 125%;
    	  }
		</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2  id='TopPageName'>Deleate Post</h2>
		</header>
		<hr>
		<?php  echo webpageTemplateString(); ?>
		<hr>
		<div id='DIV_Question'>
    		<h3 id='H3_Question'>Do you wish to remove your post?</h3>
    		<button id='B_Yes'><a href="deleteBlogPostResponse.php?postID=<?php echo $id ?> ">Yes</a></button>
    		<button id='B_No'><a href="getBlogRequest.php?postID=<?php echo $id ?> ">No</a></button>
		</div>
	</body>
</html>