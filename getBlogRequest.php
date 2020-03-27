<!DOCTYPE html>
<!-- 
	Author: Charles Davis
	File: getBlogRequest.php
	Date: Mar 26, 2020
	
	Description:
	   Allows the user to view the content on the post
 -->
<?php 
include_once 'myfuncs.php';
$id = $_GET['postID'];

$sql = "SELECT *
        FROM posts
        WHERE postID= $id";
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Put Title Here</title>
		
	</head>
	<body>
		<header>
			<img src="sampleLogo.png" width="40" height="40" alt="LOGO">
			<h2 style="display: inline">Put Page Topic Here</h2>
		</header>
		<hr>
			<ul><?php  echo webpageTemplateString(); ?></ul>
		<hr>
		<table>
			<thead>
				<tr>
					<td>Title</td>
					<td>By</td>
					<td>Date</td>
				</tr>
			</thead>
			<tbody>
			    <?php 
        		foreach (GetDBConnect()->query($sql) as $rows)
        		{
        		?>
        			<tr>
        				<td><b><?php echo "<a href='getBlogRequest.php?postID=" . $rows['postID'] . ">"
	                                    . $rows['title']. "</a>";?></b></td>
        				<td><?php echo $rows['userID_PostBy']?></td>
        				<td><?php echo $rows['postDate']?></td>
        			</tr>
        		<?php 
        		}
        		?>
			</tbody>
		</table>
		<form>
			<br>
			<textarea name="content" rows="10" cols="50" readonly 
				value=<?php $rows['content']?>></textarea>
		</form>
	</body>
</html>