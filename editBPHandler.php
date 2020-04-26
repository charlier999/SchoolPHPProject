<!DOCTYPE html>
<!-- 
    Project: Milestone
	Author: Charles Davis
	File: editBPHandler.php
	Date: Apr 3, 2020
	
	Description:
	Handles the input from editBlogPost form and applies the edit to the DB
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
    $title = (string)trim($_POST['title']);
    $content = (string)trim($_POST['content']);
    $id = (string)$_POST['postID'];
}

//Selecting database
if(checkUserSignedIn())
{
    if (GetDBConnect())
    {
        if(!checkEmpty($title, "title"))
        {
            if(!checkEmpty($content, "content"))
            {
                $sql = "UPDATE posts
                        SET title ='" . $title 
                        . "' , content='" . $content . 
                        "' WHERE postID='" . $id . "'";
                if ($result = GetDBConnect()->query($sql))
                    $response = "<p id='P_Res'>Thank you for your Edit</p>";
                else
                    $response = "<p id='P_Res'>Edit not sent " . GetDBConnect()->error . "</p>";
            }
        }
        dbClose();
    }
}
else $response = "<p id='P_Res'>Error! You need to be signed in to Edit a post</p>";
function getResponceEPH()
{
    global $response;
    return $response;
}
include('editBPresponse.php');
?>
