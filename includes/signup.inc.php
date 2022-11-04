<?php

//This page should only be accessed by hitting submit button! Can't just access via URL.

if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['uid'];
        $pwd = $_POST['pwd'];
        $pwdRepeat = $_POST['pwdrepeat'];

        require 'dbh.inc.php';
        require 'controller.inc.php';

        if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if (invalidUid($username) !== false) {
            header("location: ../signup.php?error=invaliduid");
            exit();
        }
        if (invalidEmail($email) !== false) {
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        if (pwdMatch($pwd, $pwdRepeat) !== false) {
            header("location: ../signup.php?error=pwdmismatch");
            exit();
        }
       /* if (uidExists($pdo, $username, $email) !== false) {
            header("location: ../signup.php?error=usernameused");
            exit();
        }*/

        createUser($pdo, $name, $email, $username, $pwd);

}
else {
    header("location: ../signup.php");
    exit();
}