<?php

function emptyInputSignup($usersName, $usersEmail, $usersPwd, $confirm_usersPwd){
    $result;

    if(empty($usersName) || empty($usersEmail) || empty($usersPwd) || empty($confirm_usersPwd)){
        $result = true;
    }

    else{
        $result = false;
    }

    return $result;
}


function invalidUid($usersName){
    $result;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $usersName)){
        $result = true;
    }

    else{
        $result = false;
    }

    return $result;
}

function invalidEmail($usersEmail){
    $result;

    if (!filter_var($usersEmail, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }

    else{
        $result = false;
    }

    return $result;
}

function pwdMatch($usersPwd, $confirm_usersPwd){
    $result;

    if ($usersPwd !== $confirm_usersPwd){
        $result = true;
    }

    else{
        $result = false;
    }

    return $result;
}

function uidExists($conn, $usersName, $usersEmail){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./Signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $usersName, $usersEmail);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }

    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $usersName, $usersEmail, $usersPwd){
    $sql = "INSERT INTO users (usersUid, usersEmail, usersPwd, created) VALUES (?, ?, ?, NOW());";
    $stmt = mysqli_stmt_init($conn);
    $mqq = mq("alter table users auto_increment = 1"); // 삭제해도 순번대로 다시 idx값 재설정
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./Signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($usersPwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $usersName, $usersEmail, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ./Signup.php?error=none");
}

function emptyInputLogin($usersEmail, $usersPwd){
    $result;

    if(empty($usersEmail) || empty($usersPwd)){
        $result = true;
    }

    else{
        $result = false;
    }

    return $result;
}

function loginUser($conn, $usersEmail, $usersPwd){
    $uidExists = uidExists($conn, $usersEmail, $usersEmail);

    if($uidExists === false) {
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($usersPwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersUid"];
        $_SESSION["useremail"] = $uidExists["usersEmail"];
        $_SESSION["role"] = $uidExists["role"];
        header("location: ../main.php");
        exit();
    }
}