<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: getBlogRequest.php
	Date: Mar 26, 2020
	
	Description:
	Allows the user to view the content on the post
 -->
<?php 
include('myfuncs.php');
$id = $_GET['postID'];

$sql = "SELECT *
        FROM posts
        WHERE postID= $id";
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>View Post</title>
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
    		  /*Show Blogpost*/
    	   #P_Content
    	   {
    	       margin:auto;
    	       height: 125%;
    	       
    	       font-size: 100%;
    	       text-aline: left;
    	       
    	       border-top: solid 1px gray;
    	       border-bottom: solid 1px gray;
    	   }
    	   #B_Edit{}
    	   #B_Delete{}
    	   #P_ModMsg
    	   {
    	       font-size: 150%;
    	   }
		</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>View Post</h2>
		</header>
		<hr>
		<?php  echo webpageTemplateString(); ?>
		<hr>
		<?php 
		foreach (GetDBConnect()->query($sql) as $rows) // Execute quarry
		{		    
		   if($rows['moderationAction'] == 0) // IF post is not deleted
		   {
            ?>
                <h3>
                	<b><a href="getBlogRequest.php?postID='<?php echo $rows['postID'] ?> '"><?php echo $rows['title']?></a></b>
                	 By: <?php echo userIDtoUserName($rows['userID_PostBy'])?> | <?php echo $rows['postDate']?>
                </h3>
        		
    			<p id='P_Content'><?php echo $rows['content']?></p>
        		<?php 
        		  if($rows['userID_PostBy'] == getUserID()) // Checks to see if the user logged in is the autor of the post
        		  {
                ?>
                	<br>
					<button id='B_Edit'><a href="editBlogPost.php?postID=<?php echo $id ?> ">Edit</a></button>
					<button id='B_Delete'><a href="deleteBlogPost.php?postID=<?php echo $id ?> ">Delete</a></button>
        		<?php 
        		  }
		      }
	      else if($rows['moderationAction'] == 1)
	          echo "<p id='P_ModMsg'>Post removed by User</p>";
	      else if($rows['moderationAction'] == 2)
	          echo "<p id='P_ModMsg'>Removed by Moderators</p>";
        }
        ?>
	</body>
</html>