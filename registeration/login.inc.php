<?php

if(isset($_POST["submit"])) {

    $usersEmail = $_POST["email"];
    $usersPwd = $_POST["password"];
    
    require_once '../lib.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($usersEmail, $usersPwd) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $usersEmail, $usersPwd);
}

else {
    header("location: ../index.php");
    exit();
}