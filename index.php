<?php
include 'filehandler.php';

$error = [];
$oldData= [];
$firstName  =   $_POST["firstName"];
$lastName   =   $_POST["lastName"];
$address    =   $_POST["address"];
$userName   =   $_POST["username"];
$password   =   $_POST["password"];
$department =   $_POST["department"];
if(isset($firstName) and  !empty($firstName))
{
    $oldData["firstName"]= $firstName;
}
else
{
    $error["firstName"] = "name is required";
}
if(isset($lastName) and  !empty($lastName))
{
    $oldData["lastName"]= $lastName;
}
else
{
    $error["lastName"] = "name is required";
}
if(isset($address) and  !empty($address))
{
    $oldData["address"]= $address;
}
else
{
    $error["address"] = "address is required";
}
if(isset($userName) and  !empty($userName))
{
    $oldData["userName"]= $userName;
}
else
{
    $error["name"] = "name is required";
}
if(isset($password) and  !empty($password))
{
    $oldData["password"]= $password;
}
else
{
    $error["password"] = "password is required";
}
if(count($error))
{
    $string_errors = json_encode($error);
    $url = "Location:register.php?errors={$string_errors}";
    header($url);
    if(count($oldData))
    {
        $oldData_string = json_encode($oldData);
        $url = "&old=={$oldData_string}";
    }
}
else
{
    
    $id = getNewId();
    $userData = "{$id} : {$firstName} : {$lastName} : {$address} : {$userName} :{$password} : {$department}\n";

    $saved = saveCurrentUser($userData);
    header("Location:displayUsers.php");
    
}


?>

