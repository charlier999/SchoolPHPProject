<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: viewAllPostDataPage.php
	Date: Mar 26, 2020
	
	Description:
	Admin Debug Page: Shows all data for each post on the site 
	
 -->
<?php 
include_once 'myfuncs.php';

errorReporting();

if (GetDBConnect()->select_db(GetDBName())) // checks to see if the DB is connected
{
    $sql = "SELECT *
            FROM posts
            ORDER BY postID";
}
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>All Post Data</title>
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
    	   #TH_Order
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TD_Order
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   #TH_ModAction
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TD_ModAction
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   #TH_Title
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TD_Title
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   #TH_By
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TD_By
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   #TH_LastPost
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TD_LastPost
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   #TH_Date
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TD_Date
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   #TH_Content
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TD_Content
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>All Post Data</h2>
		</header>
		<hr>
		<?php  echo webpageTemplateString(); ?>
		<hr>
		<table>
        	<thead>
        		<tr>
        			<td id='TH_Order'>Order  |</td>
        			<td id='TH_ModAction'>  Mod Action  |</td>
        			<td id='TH_Title'>  Title</td>
        			<td id='TH_By'>  By</td>
        			<td id='TH_Date'>  Date</td>
        			<td id='TH_Content'>  Content</td>
        		</tr>
        	</thead>
        	<tbody>
        		<?php 
        		foreach (GetDBConnect()->query($sql) as $rows) // Executes querry
        		{
        		?>
        			<tr>
        				<td id='TD_Order'><?php echo $rows['postID']?></td>
        				<td id='TD_ModAction'><?php echo $rows['moderationAction']?></td>
        				<td id='TD_Title'><?php echo $rows['title']?></td>
        				<td id='TD_By'><?php echo userIDtoUserName($rows['userID_PostBy'])?></td>
        				<td id='TD_Date'><?php echo $rows['postDate']?></td>
        				<td id='TD_Content'><?php echo $rows['content']?></td>
        			</tr>
        		<?php 
        		}
        		?>
        	</tbody>
    	</table>
	</body>
</html>