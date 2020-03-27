<?php
/*
 *		Author: Charles Davis
 *		File: posthandler.php
 *		Date: Feb 27, 2020
 *
 *		Description:
 *          The handler for the user's input from blogpost.php
 *
 *      TODO:
 *          Fix text filter 
 *          Remove old debug code
 *
 */
?>
<?php 
include('myfuncs.php');

errorReporting();

$response = "";
$tableName = "post";
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
//            if(!checkProhibitedStrings($title)
//                && !checkProhibitedStrings($content))
//            {
               $sql = getPHSQL();
               if (GetDBConnect()->query($sql))
               {
                   $response = "Thank you for your post";
               }
               else
               {
                   $response = "Post not sent";
               }
//            }
//            else echo "<p><em>Post not sent!</em></p>    Your post contains prohibited words.";
       }
       dbClose();   
    }
}
else $response = "<p><em>Error!</em>  You need to be signed in to submit a post</p>";

include('createpostresponse.php');

/**
 * Returns the sql script for posthandler.php
 * @return string : sql script
 */
function getPHSQL()
{
    global $tableName, $userID, $title, $content;
    return "INSERT INTO $tableName (userID_PostBy, title, content)
            Values('$userID','$title','$content')";
}

function getResponcePH()
{
    global $response;
    return $response;
}
?>