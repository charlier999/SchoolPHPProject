<!-- 
    Author: Charles Davis
	File: registerhandler.php
	Date: January 21, 2020
	
	Description: 
    	An PHP form handler to process 
    	the user inputs for registration
    	from register.html
	
	TODO:
	   -Remove debug code
	   -Bring back any functions from myfuncs.php
	    that are only used in this file
-->

<?php 
//Requires
include('myfuncs.php');

errorReporting();

$response = "";

if (!isset($_POST['userSubmit']))
{
    die("Submission failed! No data received!");
}
else
{
    
    $firstName      = getUserFirstNameInput();
    $lastName       = getUserLastNameInput();
    $userName       = getUserNameInput();
    $userPassword   = getUserPasswordInput();
}
//Connects to mysqli  
if(checkRHAllEmpty())
{
    $sql = getRHsql();

    if ($result = GetDBConnect()->query($sql))
        include('registersuccess.html');
    else 
        include('registerfailure.php');
}
else include('registerfailure.php');
dbClose();


/**
 * Checks to see if any of the user input fields are empty
 * 
 * @return boolean : true = all full | false = a field is empty
 */
function checkRHAllEmpty() 
{
    global $firstName, $lastName, $userName, $userPassword;
    if (checkEmpty($firstName))
    {
        setResponceRH("First Name field can not be empty.");
        return false;
    }
    else if (checkEmpty($lastName))
    {
        setResponceRH("Last Name field can not be empty.");
        return false;
    }
    else if (checkEmpty($userName))
    {
        setResponce("Username field can not be empty.");
        return false;
    }
    else if (checkEmpty($userPassword))
    {
        setResponceRH("Password field can not be empty.");
        return false;
    }
    else return true;    
    
}

/**
 * Returns SQL Script to register users into the database for registerhandler.php
 * @return string : SQL Script
 */
function getRHsql()
{
    global $firstName,$lastName,$userName,$userPassword;
    $tableName = "users";
    // connects to the "users" table in mysqil
    
    return  "INSERT INTO $tableName
             (userFirstName, userLastName,
              userName, userPassword)
              VALUES('$firstName' , '$lastName',
                     '$userName','$userPassword')";

}

function getResponceRH()
{
    global $response;
    return $response;
}

function setResponceRH($input)
{
    global $response;
    $response = $input;
}

?>