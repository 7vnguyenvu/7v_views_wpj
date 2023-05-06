<?php

include_once "../configs/dbconfig.php";

$uname = isset($_POST['username']) ? $_POST['username'] : null;
$upass = isset($_POST['password']) ? $_POST['password'] : null;
$urepass = isset($_POST['re-password']) ? $_POST['re-password'] : null;


if ($uname && $upass && $urepass) {
    try {
        $max_id = mysqli_query($connection, "select max(_ID) + 1 as curr_id from accounts");
        $next_id = mysqli_fetch_array($max_id)['curr_id'];
        $default_level = 4;
        $default_lock = 0;

        $sql_postuser = "insert into accounts values ($next_id,'$uname','$urepass',$default_level, $default_lock)";
        mysqli_query($connection, $sql_postuser);

        $user = (object) [
            '_id' => $next_id,
            'username' => $uname,
            'password' => $urepass,
            'level' => $default_level,
            'lock' => $default_lock
        ];

        session_start();
        $_SESSION['user_logged'] = $user;
        header("Location: ../");
    } catch (Exception $e) {
        header("Location: ../");
    }
}
