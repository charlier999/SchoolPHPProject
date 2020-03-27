<!DOCTYPE html>
<!-- 
	Author: Charles Davis
	File: viewAllUsersPage.php
	Date: Mar 26, 2020
	
	Description:
	
 -->
<?php 
include_once 'myfuncs.php';

errorReporting();

if (GetDBConnect()->select_db(GetDBName()))
{
    $sql = "SELECT *
            FROM users
            ORDER BY userID";
}
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>All Users</title>
		
	</head>
	<body>
		<header>
			<img src="sampleLogo.png" width="40" height="40" alt="LOGO">
			<h2 style="display: inline">All User Data</h2>
		</header>
		<hr>
			<ul>
    			<?php 
                   echo webpageTemplateString(); 
    			?>
			</ul>
		<hr>
		<table>
			<thead>
				<tr>
					<td>User ID</td>
					<td>username</td>
					<td>Moderation Level</td>
					<td>First Name</td>
					<td>Last Name</td>
				</tr>
			</thead>
			<tbody>
				<?php 
			    foreach (GetDBConnect()->query($sql) as $rows)
			    {
				?>
					<tr>
						<td><?php echo $rows['userID']?></td>
						<td><?php echo $rows['userName']?></td>
						<td><?php echo $rows['userModLevel']?></td>
						<td><?php echo $rows['userFirstName']?></td>
						<td><?php echo $rows['userLastName']?></td>
					</tr>
				<?php 
			    }
				?>
			</tbody>
		</table>
	</body>
</html>