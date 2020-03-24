<!-- 
	Author: Charles Davis
	File: viewposts.php
	Date: Mar 24, 2020
	
	Description:
	
 -->
<?php
include('myfuncs.php');

echo linkMainMenuString();
echo linkLoginPageString();

if (GetDBConnect()->select_db(GetDBName()))
{
    startVP();
}

function startVP()
{
    echo "<p>Successfully selected the " . GetDBName()
    . " database!" .  "</p>" ;
    
    $tableName = "posts";
    $sql = getVPsql();
    
    if ($result = GetDBConnect()->query($sql))
    {
        echo "<h3> Posts </h3>";
        $numberRows = $result->num_rows;
        if ($numberRows > 0)
        {
            echo html_tableVP(getAllPostsArray($result));
        }
        else 
        {
            echo "<p> There have been no posts </p>";  
        }
    }
}

/**
 * Creates the SQL Script for listing the posts in the database
 * @return string : SQL Script
 */
function getVPsql()
{
    return "SELECT title, userID_PostBy, postDate, content 
            FROM posts";
}

/**
 * Creates a SQL Script for geting 
 * @return string
 */
function getVPsqlUsers($input)
{
    return "SELECT userID, userName 
            FROM users
            Where userID='$input'";
}

function convertuserIDtoUserName($input)
{
    $sql = getVPsqlUsers($input);
    if ($result = GetDBConnect()->query($sql))
    {
        $numberRows = $result->num_rows;
        if($numberRows == 1)
        {
            
        }
    }
}

/**
 * Creates an array from the sql of the posts table
 * @param int $result
 * @return array[][] : 
 */
function getAllPostsArray($result)
{
    $posts = array();
    $index = 0;
    
    echo "<p>There are $result->num_rows posts</p>";
    while ($row = $result->fetch_assoc())
    {
        $posts[$index] = array($row['title'],
                               $row['userID_PostBy'],
                               $row['postDate'],
                               $row['content']
                               );
        $index++;
    }
    return $posts;
}

?>