<?php
/*
*		Author: Charles Davis
*		File: adminHandler.php
*		Date: Feb 11, 2020
*
*		Description:
*
*
*
*/

include('myfuncs.php');

errorReporting();

// Connects to the mysquli data base

if (GetDBConnect()->select_db(GetDBName()))
{
    listAHUsers();
}
dbClose();

/**
 * Lists out all of the users that are in the database 
 * Displays : userID, userName, userFirstName, userLastName, userModLevel
 */
function listAHUsers() 
{
    echo "<p>Successfully selected the " . GetDBName()
    . " database!" .  "</p>" ;
    
    $sql = getAHsql();
    
    if ($result = GetDBConnect()->query($sql))
    {        
        echo "<h3>Users<h3>";
        $numberRows = $result->num_rows;
        if ($numberRows > 0)
        // if there are users in the table
        {
            echo html_tableAH(gtAllUsersArray($result));
        }
        else
        // if there are no users in the table
        {
            echo "<p> No users are registered in table
                    <strong> " . $tableName . "</strong></p>";
        }
    }
    else
    {
        echo "False";
    }
}

/**
 * Origianl display all users
 * Depresiated
 */
function displayAllUsersString()
{
    global $result;
    $rowNumber = 0;
    while($row = $result->fetch_assoc())
    {
        $rowNumber++;
        echo "<b>" . $rowNumber . "</b> "
                   . "User ID: " . $row['userID'] . " "
                   . $row['userFirstName']. " "
                   . $row['userLastName']. " "
                   . $row['userName']. " "
                   . "Mod Level:" . $row['userModLevel']. " "
                   ."<br>";
    }
}


/**
 * Gets all users in the database as an array 
 * @return $users : array
 */
function gtAllUsersArray($result)
{
    $users = array();
    $index = 0;
    
    echo "<p>$result->num_rows are registered</p>";
    while ($row = $result->fetch_assoc())
    {
        $users[$index] = array($row['userID'], 
                               $row['userName'], 
                               $row['userModLevel'], 
                               $row['userFirstName'],
                               $row['userLastName']);
        $index++;
    }
    return $users;
}


/**
 * Creates the SQL Script for listing all of the user in the database
 * @return string : SQL Script
 */
function getAHsql() 
{
    return "SELECT userID, userModLevel, userName, userFirstName, userLastName 
            FROM users";
}
    
?>