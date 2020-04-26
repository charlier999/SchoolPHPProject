<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: editBlogPost.php
	Date: Apr 3, 2020
	
	Description:
	The Page and form for editing a blogpost
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
		<title>Edit Post</title>
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
    	   /*Edit Form*/
    	   #F_Form
    	   {
    	    margin: auto;
		  	width: 50%;
		  	
		  	font-size: 150%;
		  	text-align: center;
		  	
		  	border-style: solid;
		  	border-width: thin;
    	   }
    	   #L_Title{}
    	   #I_Title{}
    	   #L_Content{}
    	   #I_Content{}
    	   #B_Submit{}
    	       /*Removed MSG*/
    	       #P_RemMsg{}
		</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>Edit Post</h2>
		</header>
		<hr>
		<?php  echo webpageTemplateString(); ?>
		<hr>
		<?php 
		foreach (GetDBConnect()->query($sql) as $rows) // Excecute query
		{		    
		   if($rows['moderationAction'] == 0) // Post has not been deleated
		   {
            ?>
            <form id='F_Form' action="editBPhandler.php" method="post">
    			<label id='L_Title'>Title*</label> 
    			<br> 
    			<input id='I_Title' type="text" name="title" maxlength="50" size="48" value="<?php echo $rows['title'] ?>">
    			<br>
    			<label id='L_Content'>Content*</label> 
    			<br>
    			<textarea id='I_Content' name="content" rows="10" cols="50"><?php echo $rows['content']?></textarea>
    			<input type="hidden" name="postID" value="<?php echo $rows['postID'] ?>">
    			<br>
    			<input id='B_Submit' type="submit" name="submit">
			</form>
        <?php 
		    }
	      else if($rows['moderationAction'] == 1)
	          echo "<p id='P_RemMsg'>Post removed by User</p>";
	      else if($rows['moderationAction'] == 2)
	          echo "<p id='P_RemMsg'>Removed by Moderators</p>";
        }
        ?>
	</body>
</html>