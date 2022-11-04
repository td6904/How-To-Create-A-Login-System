<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
    $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/",  $username)) {
    $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
    $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
//This works ////////////////////////////////////////////////////////////////////////////
function createUser($pdo, $name, $email, $username, $pwd) {
    $query = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) 
                        VALUES (:usersName, :usersEmail, :usersUid, :usersPwd)";
    $statement = $pdo->prepare($query);

    $statement->bindValue(":usersName", $name, \PDO::PARAM_STR);
    $statement->bindValue(":usersEmail", $email, \PDO::PARAM_STR);
    $statement->bindValue(":usersUid", $username, \PDO::PARAM_STR);
    $statement->bindValue(":usersPwd", password_hash($pwd, PASSWORD_DEFAULT), \PDO::PARAM_STR);
                                    //Password hash works^^^
    $statement->execute();
/////////////////////////////////////////////////////////////////////////////
     header("loaction: ../signup.php?error=none");
 }

 //Not sure about this v v v v v checking if email and username already used.

/*function uidExists($pdo, $username, $email) {
   $query = "SELECT * FROM users WHERE (usersUid = :usersUid) OR (usersEmail = :usersEmail)";
   $statement = $pdo->query($query);
   if (!query($statement, $query)){
    header("location: ../signup.php?error=queryfailed");
    exit();
   }
    $uId = $statement->fetchAll(PDO::FETCH_ASSOC);
}*/
//??? mORE CODE HERE?? TIME STAMP 1h16


 /////////////////LOGIN//////////////////////////

 function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
    $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($pdo, $username, $pwd){
    $uidExists = uidExists($pdo, $username, $username);

    if ($uidExists === false){
    header("location: ../login.php?error=wronglogin");
    exit();
    }


$pwdHashed = $uidExists["usersPwd"];
$checkPwd = password_verify($pwd, $pwdHashed);

if ($checkPwd === false){
    header("location: ../login.php?error=wronglogin");
    exit();
}
else if ($checkPwd === true){
    session_start();
    $_SESSION['userid'] = $uidExists['usersId'];
    $_SESSION['useruid'] = $uidExists['usersUid'];
    header("location: ../index.php");
    exit();
}
}


