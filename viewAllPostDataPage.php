<!DOCTYPE html>
<!-- 
	Author: Charles Davis
	File: viewAllPostDataPage.php
	Date: Mar 26, 2020
	
	Description:
	Admin Debug Page: Shows all data for each post on the site 
	
 -->
<?php 
include_once 'myfuncs.php';

errorReporting();

if (GetDBConnect()->select_db(GetDBName()))
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
		
	</head>
	<body>
		<header>
			<img src="sampleLogo.png" width="40" height="40" alt="LOGO">
			<h2 style="display: inline">All Post Data</h2>
		</header>
		<hr>
			<ul><?php  echo webpageTemplateString(); ?></ul>
		<hr>
		<table>
        	<thead>
        		<tr>
        			<td>Order</td>
        			<td>Mod Action</td>
        			<td>Title</td>
        			<td>By</td>
        			<td>Last Post</td>
        			<td>Date</td>
        			<td>Content</td>
        		</tr>
        	</thead>
        	<tbody>
        		<?php 
        		foreach (GetDBConnect()->query($sql) as $rows)
        		{
        		?>
        			<tr>
        				<td><?php echo $rows['postID']?></td>
        				<td><?php echo $rows['moderationAction']?></td>
        				<td><?php echo $rows['title']?></td>
        				<td><?php echo $rows['userID_PostBy']?></td>
        				<td><?php echo $rows['userID_LastPost']?></td>
        				<td><?php echo $rows['postDate']?></td>
        				<td><?php echo $rows['content']?></td>
        			</tr>
        		<?php 
        		}
        		?>
        	</tbody>
    	</table>
	</body>
</html>