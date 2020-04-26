<!DOCTYPE html>

<!-- 
    Project: Milestone
	Author: Charles Davis
	Date: 2/20/2020
	File: wami.php
	
	Description:
	   User's settings
 -->
<?php 
include('myfuncs.php');

errorReporting();

$response = "";

if (GetDBConnect()->select_db(GetDBName())) // Connect to DB
{
    $sql = "SELECT * FROM posts
            WHERE userID_PostBy= ". getUserID() ."";
    
    if ($result = GetDBConnect()->query($sql)) // Excecute query
    {
        $numberRows = $result->num_rows; // Get row count
    }
}
?>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Login Response</title>
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
    	   #H3_TableHeader
    	   {
    	       font-size:150%;
    	   }
    	   #TH_Title
    	   {
    	       font-size:120%;
    	       font-weight: bold;
    	   }
    	   #TD_Title{}
    	   #TH_By
    	   {
    	       font-size:120%;
    	       font-weight: bold;
    	   }
    	   #TD_By{}
    	   #TH_Date
    	   {
    	       font-size:120%;
    	       font-weight: bold;
    	   }
    	   #TD_Date{}
    	   #H3_NoPosts
    	   {
    	       font-size:150%;
    	   }
        </style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>Posts</h2>
		</header>
		<hr>
		<?php echo webpageTemplateString();?>
		<hr>
		<h3 id='H3_TableHeader'>Your Posts</h3>
		<?php         		
		if($numberRows != 0)
        {
        ?>
    		<table>
            	<thead>
            		<tr>
            			<td id='TH_Title'>Title</td>
            			<td id='TH_Date'>Date</td>
            		</tr>
            	</thead>
            	<tbody>
            		<?php 
            		foreach (GetDBConnect()->query($sql) as $rows) // Excecute query
            		{
            		    if($rows['moderationAction'] == 0)
            		    {
                		?>
                			<tr>
                				<td id='TD_Title'><b><a href="getBlogRequest.php?postID='
                				    <?php echo $rows['postID'] ?> '"> 
                				    <?php echo $rows['title']?> </a></b></td>
                				<td id='TD_Date'><?php echo $rows['postDate']?></td>
                			</tr>
                		<?php 
                		}
            		}
            		?>
            	</tbody>
        	</table>
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