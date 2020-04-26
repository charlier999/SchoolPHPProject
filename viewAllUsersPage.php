<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: viewAllUsersPage.php
	Date: Mar 26, 2020
	
	Description:
	Admin Debug Page: Shows all data for each user on the site 
 -->
<?php 
include_once 'myfuncs.php';

errorReporting();

if (GetDBConnect()->select_db(GetDBName())) // Checks to see if the DB is connected
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
    	   #TH_UID
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TH_UN
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TH_ML
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TH_FN
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   #TH_LN
    	   {
    	       font-size: 125%;
    	       font-weight: bold;
    	   }
    	   
    	   #TD_UID
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   #TD_UN
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   #TD_ML
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   #TD_FN
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   #TD_LN
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   
        </style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>All User Data</h2>
		</header>
		<hr>
		<?php echo webpageTemplateString(); ?>
		<hr>
		<table>
			<thead>
				<tr>
					<td id='TH_UID'>User ID  |</td>
					<td id='TH_UN'>  Username  |</td>
					<td id='TH_ML'>  Moderation Level  |</td>
					<td id='TH_FN'>  First Name  |</td>
					<td id='TH_LN'>  Last Name</td>
				</tr>
			</thead>
			<tbody>
				<?php 
			    foreach (GetDBConnect()->query($sql) as $rows) // Execute querry
			    {
				?>
					<tr>
						<td id='TD_UID'><?php echo $rows['userID']?></td>
						<td id='TD_UN'><?php echo $rows['userName']?></td>
						<td id='TD_ML'><?php echo $rows['userModLevel']?></td>
						<td id='TD_FN'><?php echo $rows['userFirstName']?></td>
						<td id='TD_LN'><?php echo $rows['userLastName']?></td>
					</tr>
				<?php 
			    }
				?>
			</tbody>
		</table>
	</body>
</html>