<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: advancedSearchHandler.php
	Date: Apr 12, 2020
	
	Description:
	The page and handler for advanced search 
 -->
<?php 
include('myfuncs.php');

errorReporting();

if($_GET['value'] == "false")
// This is done for the first load into the page
{
    if (!isset($_POST['userSubmit']))
    {
        die("<p><em>ERROR!</em> Submission failed!
             No data received!</p>");
    }
}

$request = trim($_POST['searchRequest']); // The content in the adv_search bar

if (GetDBConnect()->select_db(GetDBName())) // Connect to DB
{
    if(!checkEmpty($request))
    {
        if($_POST['radioButtons'] == "Posts") // If RadButton Posts is selected
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
        else if($_POST['radioButtons'] == "Users") // If RadButton Users is selected
        {
            $sql = "SELECT * FROM users
                    WHERE userName
                    LIKE '%$request%'";
            
            if ($result = GetDBConnect()->query($sql)) // Excecute query
            {
                $numberRows = $result->num_rows; // Get row count
            }
        }
        else $numberRows = -2;
    }
    else if($_GET['value'] == false) $numberRows = -1;
    else if($_GET['value'] == true) $numberRows = -2;
    
}
?>
 
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Advanced Search</title>
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
    	   /*Advanced Seach Form*/
    	   #L_Search{}
    	   #I_SearchReq{}
    	   #L_By{}
    	   #I_RB_Users{}
    	   #L_Users{}
    	   #I_RB_Posts{}
    	   #L_Posts{}
    	   #S_Submit{}
    	   
    	   /*Results Table*/
    	   #TH_Title{}
    	   #TH_By{}
    	   #TH_Date{}
    	   #TD_Title{}
    	   #TD_By{}
    	   #TD_Date{}
    	       /*Moderation Msg*/
    	       #ModMsg{}
    	       /*Error Msg*/
    	       #P_ErrorMsg{}
		</style>
	</head>
	<body>
		<header>
			<img id='IMG_Logo' src="sampleLogo.png" width="40" height="40" alt="LOGO">
			<h2 id="TopPageName">Advanced Search</h2>
		</header>
		<hr>
			<ul><?php  echo webpageTemplateString(); ?></ul>
		<hr>
		<form action="advancedSearchHandler.php?value=false" method="post">
			<label id='L_Search' >Search</label>
			<input id='I_SearchReq' type='text' name='searchRequest' maxlength='50' size='15'>
			<br>
			<label id='L_By' >By</label>
			<br>
			<input id='I_RB_Users' type='radio' name='radioButtons' id='bottonUsers' value='Users'>
			<label id='L_Users' for="bottonUsers">Users</label><br>
			<input id='I_RB_Posts' type='radio' name='radioButtons' id='bottonPosts' value='Posts'>
			<label id='L_Posts' for="bottonPosts">Posts</label><br>
			<input id='S_Submit' type="submit" name="userSubmit">
		</form>
		<hr>
		<?php 
		if($numberRows > 0)
		{
		    if($_POST['radioButtons'] == "Posts")
		    {
		        foreach (GetDBConnect()->query($sql) as $rows) // for each row inside of the query result
		        {
		            if($rows['moderationAction'] == 0) // if there has been no moderation action
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
                			<tr>
                				<td id='TD_Title'><b><a href="getBlogRequest.php?postID=' 
                				    <?php echo $rows['postID'] ?> '"> 
                				    <?php echo $rows['title']?> </a></b></td>
                				<td id='TD_By'><?php echo userIDtoUserName($rows['userID_PostBy'])?></td>
                				<td id='TD_Date'><?php echo $rows['postDate']?></td>
                			</tr>
                    	</tbody>
                	</table>
            		<?php
    		        }
        		    else if($rows['moderationAction'] == 1) // If post was removed by the user
        		        echo "<p id='ModMsg'>Post removed by User<p>";
        		    else if($rows['moderationAction'] == 2) // If post was removed by moderators
        		        echo "<p id='ModMsg'>Removed by Moderators<p>";
		        }
		    }
		    else if($_POST['radioButtons'] == "Users")
		    {
		        echo "Users";
		        foreach (GetDBConnect()->query($sql) as $rows) // for each row inside of the query result
		        {
		        ?>
            		<table>
                    	<thead>
                    		<tr>
                    			<td id='TH_UserName'></td>
                    		</tr>
                    	</thead>
                    	<tbody>
                			<tr>
                				<td id='TD_UserName'><?php echo $rows['userName']?></td>
                			</tr>
                    	</tbody>
                	</table>
            	<?php
		        }
		    }
		}
		else if($numberRows == 0)
		    echo "<p id='P_ErrorMsg'>0 Results for your search</p>";
		else if($numberRows == -1)
		    echo "<p id='P_ErrorMsg'>Your search request can not be empty</p>";
		else if($numberRows == -2)
		    echo "<p id='P_ErrorMsg'>Unused Echo</p>";
		else echo "<p id='P_ErrorMsg'>Unknown Error has occured<p>";
		?>
	</body>
</html>