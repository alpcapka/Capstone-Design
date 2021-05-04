<?php

if (isset($_POST["submit"])) {
    
    $usersName = $_POST["usersUid"];
    $usersEmail = $_POST["usersEmail"];
    $usersPwd = $_POST["usersPwd"];
    $confirm_usersPwd = $_POST["confirm_usersPwd"];

    require_once '../lib.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($usersName, $usersEmail, $usersPwd, $confirm_usersPwd) !== false){
        header("location: ./Signup.php?error=emptyinput");
        exit();
    }

    if(invalidUid($usersName) !== false){
        header("location: ./Signup.php?error=invalidUid");
        exit();
    }

    if(invalidEmail($usersEmail) !== false){
        header("location: ./Signup.php?error=invalidEmail");
        exit();
    }

    if(pwdMatch($usersPwd, $confirm_usersPwd) !== false){
        header("location: ./Signup.php?error=pwdnotmatch");
        exit();
    }

    if(uidExists($conn, $usersName, $usersEmail) !== false){
        header("location: ./Signup.php?error=usernametaken");
        exit();
    }
    
    createUser($conn, $usersName, $usersEmail, $usersPwd);
    

}

else {
    header("location: ./Signup.php");
}