<?php
session_start();
include_once "../configs/dbconfig.php";

$uname = isset($_POST['username']) ? $_POST['username'] : null;
$upass = isset($_POST['password']) ? $_POST['password'] : null;

if ($uname && $upass) {
    try {
        $sql_getuser = "select * from accounts where USER_NAME = '$uname' and USER_PASS = '$upass'";
        $getquery = mysqli_query($connection, $sql_getuser);
    } catch (Exception $e) {
        header("Location: ../");
    }

    if ($getquery->num_rows == 0) {
        header("Location: ../");
    } else {
        $row = mysqli_fetch_array($getquery);

        $user = (object) [
            '_id' => $row['_ID'],
            'username' => $row['USER_NAME'],
            'password' => $row['USER_PASS'],
            'level' => $row['USER_LEVEL'],
            'lock' => $row['USER_LOCK']
        ];

        $_SESSION['user_logged'] = $user;
        header("Location: ../");
    }
}
