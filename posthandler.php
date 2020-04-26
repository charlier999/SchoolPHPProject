<?php
/*
 *      Project: Milestone
 *		Author: Charles Davis
 *		File: posthandler.php
 *		Date: Feb 27, 2020
 *
 *		Description:
 *          The handler for the user's input from blogpost.php
 */
?>
<?php 
include('myfuncs.php');

errorReporting();

$response = "";
$userID = getUserID();

if (!isset($_POST['submit']))
{
    die("<p><em>ERROR!</em> Submission failed! 
         No data received!</p>");
}
else
{
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
}

//Selecting database
if(checkUserSignedIn())
{
    if (GetDBConnect())
    {
       if(!checkEmpty($title, "title") 
           && !checkEmpty($content, "content"))   
       {
           $sql = "INSERT INTO posts (userID_PostBy, title, content)
                    Values('$userID','$title','$content')";
           if ($result = GetDBConnect()->query($sql))
           {
               $response = "<p id='P_Res'>Thank you for your post<p>";
           }
           else
           {
               $response = "<p id='P_Res'>Post not sent<p>";
           }
       }
       dbClose();   
    }
}
else $response = "<p id='P_Res'>Error! You need to be signed in to submit a post</p>";

include('createpostresponse.php');

function getResponcePH()
{
    global $response;
    return $response;
}
?>