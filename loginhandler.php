<?php
/*
*		Author: Charles Davis
*		File: loginhandler.php
*		Date: Feb 6, 2020
*
*		Description:
*
*
*
*/
?>
<?php 
//requires
include('myfuncs.php');

errorReporting();

$adminCheck = false;
$responce = "";

if (!isset($_POST['userSubmit']))
{
    die("<p><em>ERROR!</em> Submission failed! 
         No data received!</p>");
}
else
{
    $userName     = getUserNameInput();
    $userPassword = getUserPasswordInput();
}

//Selecting database
if (GetDBConnect()->select_db(GetDBName())) 
{
    if(!checkEmpty($userName,"Username") 
        && !checkEmpty($userPassword, "Password"))
    {
        $sql = tableLHConnect($userName, $userPassword);
        loginLHCheck($sql);
    }           
}
dbClose();


/**
 * @param connects the program to the mysqil 
 * table for users and returns $sql
 * @return int from mysqli 
 */
function tableLHConnect($userName, $userPassword) 
{
    $tableName = "users";
    // connects to the "users" table in mysqil
        return "SELECT userID, userModLevel, userName, userPassword
                FROM $tableName
                WHERE userName='" . $userName .
                "' AND userPassword= '" . $userPassword . "' ";
}

/**
 * @param checks the users inputed data against
 * the servers listed data to see if the user
 * exists in the server and if the password 
 * is correct.
 */
function loginLHCheck($sql) 
{
    if ($result = GetDBConnect()->query($sql))
    {        
        $numberRows = $result->num_rows;
        if ($numberRows == 1)
        // if the username and password are assocated with
        // a user and the they are correct
        {
            $row = $result->fetch_assoc();
            setUserID(($row['userID']));
            setModLevel($row['userModLevel']);
            
            if(checkAdminAccess()) 
            {
                setResponce(displayLoginMessage(-1, false));
            }
            else 
            {
                setResponce(displayLoginMessage(1, false));
            }
            
            include('loginresponse.php');
        }
        // if the username and password are not assocated with
        // a user and/or are not correct
        else if ($numberRows == 0) 
            include('loginfailed.html');
    }
    else 
    {
        echo "<p><em>ERROR!</em> Submission failed! 
         No data received!</p>";
    }
}

/**
 * Returns the string that is outputed to loginresponse.php
 * @return string 
 */
function getResponce()
{
    global $responce;
    return $responce;
}
/**
 * Sets the variable $responce to the inputed string
 * @param string $input
 */
function setResponce(string $input)
{
    global $responce;
    $responce = $input;
}
/**
 * Returns the boolean of wether the user has admin access
 * @return boolean : 
 */
function getAdminCheck()
{
    global $adminCheck;
    return $adminCheck;
}
/**
 * Sets the boolean of wether the user has admin access
 * @param bool $input
 */
function setAdminCheck(bool $input)
{
    global $adminCheck;
    $adminCheck = $input;
}

function getUserNameLH()
{
    global $userName;
    return $userName;
}

?>