<?php
/*
 *      Project: Milestone
*		Author: Charles Davis
*		File: myfuncs.php
*		Date: Feb 18, 2020
*
*		Description:
*       A general PHP function libary for background proccesses
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
function checkEmpty($inputA)
{
    if ($inputA == NULL || $inputA == EMPTY_STRING)
    // If the user doesn't enter anything into a fourm,
    {
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
    closeSession();
}

/**
 * The basic web links to the different pages
 * @return string
 */
function webpageTemplateString()
{
    if(!checkUserSignedIn())
    {
        return "<h3 id='NavBar'><a href='login.php'>Login</a> | " . 
                        "<a href='register.html'>Register</a> | " .
                               "<a href='index.html'>Home</a></h3>";
    }
    else
    {
        if (checkAdminAccess())
            return "<h3 id='NavBar'>" . searchBarString() . "<a href='blogpost.php'>Create Blog Post</a> | " .
                                            "<a href='wami.php'>My Posts</a> | " .
                                       "<a href='indexLoggedIn.php'>Home</a> | " .
                                            "<a href='logout.php'>Logout</a> | " .
                               "<a href='adminSettings.php'>Admin Settings</a>";
        else
            return "<h3 id='NavBar'>" . searchBarString() . "<a href='blogpost.php'>Create Blog Post</a> | " .
                                             "<a href='wami.php'>My Posts</a> | " .
                                        "<a href='indexLoggedIn.php'>Home</a> | " .
                                               "<a href='logout.php'>Logout</a>";
    }
}

/**
 * Returns the html script for the search bar
 * @return string
 */
function searchBarString()
{
    return "<form id='SeachForm' action='searchHandler.php' method='post' style='display: inline;'>
			    <input id='SeachB' type='submit' name='submit'  value='Search'>
                <input id='SeachTB' type='text' name='searchRequest' maxlength='50' size='15'>
		    </form>";   
    //style='display:inline; float:right';
    //style='display:inline'
}

/**
 * Returns the username from the inputed ID number
 * @param $IDNumber : The users ID Number
 * @return $userName : String | the users username
 */
function userIDtoUserName($IDNumber)
{
    $temp = strval($IDNumber);
    if (GetDBConnect()->select_db(GetDBName()))
    {
        $sql = "SELECT userID, userName
            FROM users
            WHERE userID='$temp'";
        if ($result = GetDBConnect()->query($sql))
        { 
            $row = $result->fetch_assoc();
            $userName = $row['userName'];
            return $userName;
        }
        else 
            return "Error: user not found";
    }
    else 
        return "DB Error";
}

/**
 * Returns the interpreated date from an int
 * @param $dateInt : int of date
 * @return string : Month-Day-Year
 */
function dateIntToString(int $dateInt)
{
    return date("M-j-Y", $dateInt);
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
function displayLoginMessage(int $input)
{
    $output = "";
    if ($input == 1) $output = "Login <em>Successful!</em>";
    else if ($input == -1) $output = "Login <em>Successful!</em>";
    else if ($input == 0) $output = "Login Failed!";
    else if ($input == 2) $output = "<p><em>Their are multiple users
                                with the same login and
                                password</em></p>";
    else $output = "$input is not a valid input for this method";
    return $output;
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


// Database Functions-=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=- -=-

/**
 * @param Close mysqli database
 */
function dbClose() 
{
    global $dbConnect;
//     echo "<br>Database ". "milestonedb" . " Closing";
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
 * Sets the session varable username to the inputed value
 * @param $username 
 */
function setTempUsername($username)
{
    $_SESSION['username'] = $username;
}

/**
 * Gets the session varable username value
 * @return string : username
 */ 
function getTempUsername()
{
    return $_SESSION['username'];
}

/**
 * Closes the session. Will display closing message if inputed true
 * @param bool $input
 */
function closeSession()
{
   session_destroy();
}

/**
 * Checks to see if the user is signed in
 * @return boolean : true = signed in | false = not signed in
 */
function checkUserSignedIn()
{
    if(getUserID() > 0)
        return true;
    else 
        return false;
}

/**
 * Gets the modlevel of the logged in user
 * @return int : user moderation level
 */
function getModLevel()
{
    return $_SESSION['modLevel'];
}

/**
 * Sets the modlevel of the current logged in user
 * @param int $input
 */
function setModLevel(int $input)
{
    $_SESSION['modLevel'] = $input;
}

/**
 * Checks to see if the user has permitions 
 * @return boolean
 */
function checkAdminAccess()
{
    if (getModLevel() == 3) return true;
    else return false;
}



?>