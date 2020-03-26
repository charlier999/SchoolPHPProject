<!DOCTYPE html>
<!-- 
	Author: Charles Davis
	File: viewposts.php
	Date: Mar 24, 2020
	
	Description:
	
 -->
<?php
include('myfuncs.php');

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
		<title>Logged In Home</title>
		
	</head>
	<body>
		<header>
			<img src="sampleLogo.png" width="40" height="40" alt="LOGO">
			<h2 style="display: inline">Home</h2>
		</header>
		<hr>
			<ul>
                <li style='display:inline'><a href='wami.php'>Settings</a></li>
                <li style='display:inline'><a href='logout.php'>Logout</a></li>
			</ul>
		<hr>
		<table>
        	<thead>
        		<tr>
        			<td>Order</td>
        			<td>Title</td>
        			<td>By</td>
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
        				<td><?php echo $rows['title']?></td>
        				<td><?php echo $rows['userID_PostBy']?></td>
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