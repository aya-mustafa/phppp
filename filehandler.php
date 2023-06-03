
<?php

function getAllUser()
{
    try
    {
        $users = file("users.txt");
        return $users;
    }
    catch(Exception $e)
    {
        return false;
    }
}


function getNewId()
{
    $users = file("users.txt");
    if($users)
    {
        $lastUser = end($users);
        $userData = explode(":", $lastUser);
        $id = (int) $userData[0];
        return $id+1;
    }

    return 1;
}


function saveCurrentUser($userData)
{

    try
    {
        $fileobject = fopen("users.txt","a");
        if($fileobject)
        {
            fwrite($fileobject , $userData);
        }
    }
    catch(Exception $e)
    {
        return false;
    }
}