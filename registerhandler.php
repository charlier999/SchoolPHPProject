<?php
// <!-- 
//     Author: Charles Davis
// 	File: registerhandler.php
// 	Date: January 21, 2020
	
// 	Description: 
// 	An PHP form handler to process 
// 	the user inputs for registration
// 	from register.html
// -->
?>
<?php 
//Requires
include('myfuncs.php');

errorReporting();

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
    {
        echo "<p>You are now registered!</p>";
        echo mainMenuLinkString();
    }
    else 
    {
        echo "<p><em>ERROR!</em> "   . 
             GetDBConnect()->error() . 
             " You are not registered!</p>";
             echo linkMainMenuString();
             echo linkLoginPageString();
    }
}
dbClose();


/**
 * Checks to see if any of the user input fields are empty
 * 
 * @return boolean : true = all full | false = a field is empty
 */
function checkRHAllEmpty() 
{
    global $firstName, $lastName, $userName, $userPassword;
    if (!checkEmpty($firstName, "First Name")
        && !checkEmpty($lastName, "Last Name")
        && !checkEmpty($userName, "Username")
        && !checkEmpty($userPassword, "Password")
        )
    {
        return true;
    }
    else 
    {
        return false;    
    }
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

?>