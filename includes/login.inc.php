<?php
if (isset($_POST['submit'])) {

    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];

    require 'dbh.inc.php';
    require 'controller.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($pdo, $username, $pwd);

    }
    else {
        header("location: ../login.php");
    exit();
    
}