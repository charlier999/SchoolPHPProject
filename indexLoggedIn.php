<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: indexLoggedIn.php
	Date: Mar 25, 2020
	
	Description:
	Home page for loggged in users
	
	
 -->
<?php 
include('myfuncs.php');

errorReporting();

if (GetDBConnect()->select_db(GetDBName())) // Check to see if the DB is connected
{
    $sql = "SELECT *
            FROM posts
            ORDER BY postID";
    $result = GetDBConnect()->query($sql); // Execute querry
    $numberRows = $result->num_rows;
}
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Home</title>
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
    	   /*DataTable*/
    	   #Table
    	   {
    	       margin: auto;
		  	   
		  	   text-align: left;
		  	   
		  	   border-style: solid;
		  	   border-width: thin;
    	   }
    	   #TH_Title
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TD_Title{}
    	   #TH_By
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TD_By{}
    	   #TH_Date
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TD_Date{}
    	   #H3_NoPosts
    	   {
    	       font-size: 150%;
    	   }
		</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>Home</h2>
		</header>
		<hr>
		<?php echo webpageTemplateString();?>
		<hr>
		<?php         		
		if($numberRows != 0) // If there is posts
        {
        ?>
        <div id='Table'>
    		<table>
            	<thead>
            		<tr>
            			<td id='TH_Title'>Title</td>
            			<td id='TH_By'>By</td>
            			<td id='TH_Date'>Date</td>
            		</tr>
            	</thead>
            	<tbody>
            		<?php 
            		foreach (GetDBConnect()->query($sql) as $rows) // Execute querry
            		{
            		    if($rows['moderationAction'] == 0)
            		    {
                		?>
                			<tr>
                				<td id='TD_Title'><b><a href="getBlogRequest.php?postID='
                				    <?php echo $rows['postID'] ?> '"> 
                				    <?php echo $rows['title']?> </a></b></td>
                				<td id='TD_By'><?php echo userIDtoUserName($rows['userID_PostBy'])?></td>
                				<td id='TD_Date'><?php echo $rows['postDate']?></td>
                			</tr>
                		<?php 
                		}
            		}
            		?>
            	</tbody>
        	</table>
        </div>
    	<?php 
        }
        else 
        {
    	?>
    		<h3 id='H3_NoPosts'>There are no posts</h3>
    	<?php 
        }
    	?>
	</body>
</html>