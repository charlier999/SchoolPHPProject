<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: searchHandler.php
	Date: Apr 9, 2020
	
	Description:
	Handles the basic search from the webpage
	search bar.
 -->
<?php 
include('myfuncs.php');

errorReporting();

$response = "";

if (!isset($_POST['submit']))
{
    die("<p><em>ERROR!</em> Submission failed!
         No data received!</p>");
}
else
{
    $request = trim($_POST['searchRequest']);
}

if (GetDBConnect()->select_db(GetDBName())) // Connect to DB
{
    if(!checkEmpty($request))
    {
        $sql = "SELECT * FROM posts 
                WHERE title 
                LIKE '%$request%'
                OR content LIKE '%$request%'";
        
        if ($result = GetDBConnect()->query($sql)) // Excecute query
        {
            $numberRows = $result->num_rows; // Get row count
        }
    }
    else $numberRows = -1;
        
}
?>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Search</title>
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
    	   #B_AS{}
    	   #P_Count{}
    	   /*Table*/
    	   #TH_Title{}
    	   #TD_Title
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   #TH_By{}
    	   #TD_By
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   #TH_Date{}
    	   #TD_Date
    	   {
    	       font-size: 100%;
    	       font-weight: normal;
    	   }
    	   #P_ModMsg{}
    	   #P_Response{}
    	   
    	</style>  
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="125" height="125" alt="LOGO">
			<h2 id='TopPageName'>Create Post</h2>
		</header>
		<hr>
		<?php  echo webpageTemplateString(); ?>
		<hr>

		<button id='B_AS'><a href="advancedSearchHandler.php?value='true'">Advanced Search</a></button>
		<?php 
		echo "<p id='P_Count'>Results for '$request'.</p>";
		if ($numberRows > 0) // if there is more then 0 rows
		{
        ?>
		<table>
        	<thead>
        		<tr>
        			<td id='TH_Title'>Title</td>
        			<td id='TH_By'>By</td>
        			<td id='TH_Date'>Date</td>
        		</tr>
        	</thead>
        	<tbody>
        	<?php foreach (GetDBConnect()->query($sql) as $rows) // for each row inside of the query result
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
    			<?php }}?>
        	</tbody>
    	</table>
		<?php
		}
		else if($numberRows == 0)
		    $response = "0 Results for your search";
		else
		    $response = "Your search request can not be empty.";
		echo "<p id='P_Response'>$response</p>";
		?>
	</body>
</html>







