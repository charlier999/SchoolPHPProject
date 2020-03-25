<?php
/*
*		Author: Charles Davis
*		File: myfuncs.php
*		Date: Feb 18, 2020
*
*		Description:
*
*
*
*/

include('session.php');

// Global variables and constants
define('HOST_NAME', "localhost");
define('USER_NAME', "root");
define('PASSWORD', "root");
define('EMPTY_STRING', "");

$dbName     = "milestonedb";

$dbConnect = new mysqli(HOST_NAME, USER_NAME, PASSWORD, $dbName);

// Connects to the mysquli data base

if(!$dbConnect)
// if the program can't access mysqli, it will output an error.
{
    echo "<p><em>Connection error:</em> "
        . $dbConnect->error()
        . "</p>";
}

// Can be used for all files -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- 

/**
 * checks the users input fields
 * for empty fields and notify the user that
 * empty fields must be filled.
 * @param $inputA : (String Varable) The string field 
 * @param $inputB : (String) The name of the field
 * @return boolean : if empty then true 
 */
function checkEmpty($inputA, string $inputB)
{
    if ($inputA == NULL || $inputA == EMPTY_STRING)
    // If the user doesn't enter anything into the username fourm,
    // the program will issue the error message.
    {
        echo "<p><em>ERROR!</em> $inputB feild is empty</p>";
        return true;
    }
    else
    {
        return false;
    }
}

/**
 * @param common error reporting methods
 * that most programs have.
 */
function errorReporting()
{
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

/**
 * Logs the user out of their accout
 * also closes the session
 */
function userLogOut()
{
    closeSession(false);
    echo "you have been logged out";
    echo linkLoginPageString();
    echo linkMainMenuString();
}

// loginhandler.php only -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=-

/**
 * @param retreves user input for last name
 * from HTML form
 */
function getUserLastNameInput()
{
    return trim($_POST['userLastName']);
}

/**
 * @param retreves user input for first name
 * from HTML form
 */
function getUserFirstNameInput()
{
    return trim($_POST['userFirstName']);
}

/**
 * @param retreves user input for password
 * from HTML form
 */
function getUserPasswordInput()
{
    return trim($_POST['userPassword']);
}

/**
 * @param retreves user input for username
 * from HTML form
 */
function getUserNameInput()
{
    return trim($_POST['userName']);
}

/**
 * Displays the login message based on the input
 * -1: Admin -=-
 * 0 : Failure -=-
 * 1 : Success -=-
 * 2 : Multi Users
 * @param int $input
 */
function displayLoginMessage(int $input, bool $links)
{
    if ($input == 1)
    {
        echo "Login <em>Successful!</em>";
        if ($links)
        {
            echo linkMainMenuString();
            echo linkCreatePostPageString();
            echo linkUserInfoPageString();
        }
    }
    else if ($input == -1)
    {
        echo "Login <em>Successful Admin!</em>";
        if ($links)
        {
            echo linkMainMenuString();
            echo linkCreatePostPageString();
            echo linkUserInfoPageString();
            echo linkAdminControlPageString();
        }
    }
    else if ($input == 0)
    {
        echo "Login Failed!";
        if ($links)
        {
            echo linkLoginPageString();
            echo linkMainMenuString();
        }
    }
    else if ($input == 2)
    {
        echo "<p><em>Their are multiple users
                with the same login and
                password</em></p>";
        if ($links)
        {
            echo linkLoginPageString();
            echo linkMainMenuString();
        }
    }
}


// viewposts.php only -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=-

/**
 * Creates a html table from the array inputed
 * Use for only viewposts.php
 * @param array $data
 * @return string
 */
function html_tableVP($data = array())
{
    $rows = array();
    foreach ($data as $row)
    {
        $cells = array();
        foreach ($row as $cell)
        {
            $cells[] = "<td>{$cell}</td>";
        }
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
    return "<table class='hci-table'>
            <th>Title  .</th>
            <th>User   .</th>
            <th>Post Date  .</th>
            <th>Content  .</th>"
            . implode('', $rows) . "</table>";
}

// posthandler.php only -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=-

/**
 * Checks the inputed string for prohibited strings. If it finds a prohibited string, it will return true. 
 * @param string $input 
 * @return boolean
 */
function checkProhibitedStrings(string $input)
{
    $file_array = file('prohibitedWords.txt',FILE_IGNORE_NEW_LINES);
    $output = false;
    
    for($x = 0; $x <= sizeof($file_array); $x++)
    {
        if(!strpos($input, $file_array[$x]))
            $output = true;
        else
            $output = false;
    }
    return $output;
}

// adminHandler.php only -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=-

/**
 * Creates a html table from the array inputed
 * Use for only adminHandler.php
 * @param array $data
 * @return string
 */
function html_tableAH($data = array())
{
    $rows = array();
    foreach ($data as $row)
    {
        $cells = array();
        foreach ($row as $cell)
        {
            $cells[] = "<td>{$cell}</td>";
        }
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
    return "<table class='hci-table'> 
            <th>userID  .</th>
            <th>userName  .</th>
            <th>userModLevel  .</th>
            <th>userFirstName  .</th>
            <th>userLastName  </th>" 
            . implode('', $rows) . "</table>";
}


// HTML links-=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=-


/**
 * Returns a string of HTML for a link to the main menu
 */
function linkMainMenuString()
{
    return "<li style='display:inline'><a href='index.html'>Main Menu</a></li>";
}

/**
 * Returns a string of HTML for a link to the login screen
 * @return string : html script
 */
function linkLoginPageString()
{
    return "<li style='display:inline'><a href='login.html'>Login</a></li>";
}

/**
 * Returns a string of HTML for a link to the create blog post page
 * @return string : html script
 */
function linkCreatePostPageString()
{
    return "<li style='display:inline'><a href='blogpost.php'>Create Blog Post</a></li>";
}

/**
 * Returns a string of HTML for a link to the admin menu
 * @return string : html script
 */
function linkAdminControlPageString()
{
    return "<li style='display:inline'><a href='adminAccess.html'>Admin</a></li>";
}

/**
 * Returns a string of HTML for a link to the user info page
 * @return string : html script
 */
function linkUserInfoPageString()
{
    return "<li style='display:inline'><a href='wami.php'>Your Info</a></li>";
}

// Database Functions-=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=-

/**
 * @param Close mysqli database
 */
function dbClose() 
{
    global $dbConnect;
    echo "<br>Database ". "milestonedb" . " Closing";
    $dbConnect->close();
}

/**
 * Retruns $dbConnect
 * @return $dbConnect 
 */
function GetDBConnect()
{
    global $dbConnect;
    return $dbConnect;
}

/**
 * Returns the name of the database
 * @return string
 */
function GetDBName()
{
    global $dbName;
    return $dbName;
}

// Session Functions -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=-

/**
 * @param sets the session's userID to the
 * inputed userID
 */
function setUserID($id)
{
    $_SESSION['userID'] = $id;
}

/**
 * @param returns the userID from the session.
 * @return $_SESSION'userID'
 */
function getUserID()
{
    return $_SESSION['userID'];
}

/**
 * Closes the session. Will display closing message if inputed true
 * @param bool $input
 */
function closeSession(bool $input)
{
    if(session_destroy()) // if the session is destroyed
    {
        if($input) // if the print setting is true
        {
            echo "Session Closed";
        }
    }
}

/**
 * Checks to see if the user is signed in
 * @return boolean : true = signed in | false = not signed in
 */
function checkUserSignedIn()
{
    if(getUserID() >0)
        return true;
    else 
        return false;
}





?>