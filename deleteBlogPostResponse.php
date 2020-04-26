<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: deleteBlogPostResponse.php
	Date: Apr 4, 2020
	
	Description:
	Deletes the post and provides a response that the post has been deleted.
 -->
<?php 
include_once 'myfuncs.php';
$id = $_GET['postID'];
$ma = "1";
// Posts are not deleated from the DB but have the moderationAction value updated to not allow the entry to be viewed
$sql = "UPDATE `posts` 
        SET `moderationAction`= '$ma' 
        WHERE `posts`.`postID` = $id";
if ($result = GetDBConnect()->query($sql))
    $response = "<p id='P_Response'>Your Post has been deleated</p>";
else
    $response = "<p id='P_Response'>Your Post failed to be deleated " . GetDBConnect()->error . "<p>";

dbClose();
    
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Post Deleated</title>
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
    	   /*Response*/
    	   #P_Response
    	   {
    	       font-size:150%;
    	   }
		</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>Post Deleated</h2>
		</header>
		<hr>
		<?php  echo webpageTemplateString(); ?>
		<hr>
		<?php echo $response ?>
	</body>
</html>