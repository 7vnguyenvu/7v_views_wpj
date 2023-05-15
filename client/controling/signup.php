<?php

include_once "../configs/dbconfig.php";

$name_of_user = isset($_POST['name_of_user']) ? trim($_POST['name_of_user']) : null;
$uname = isset($_POST['username']) ? trim($_POST['username']) : null;
$upass = isset($_POST['password']) ? trim($_POST['password']) : null;
$urepass = isset($_POST['re-password']) ? trim($_POST['re-password']) : null;


if ($name_of_user && $uname && $upass && $urepass) {
    try {
        $next_account_id = mysqli_fetch_array(mysqli_query($connection, "select max(_ID) + 1 as curr_id from accounts"))['curr_id'];
        $default_level = 4;
        $default_lock = 0;

        $new_user_id = mysqli_fetch_array(mysqli_query($connection, "select max(_ID) + 1 as curr_id from accounts"))['curr_id'];
        $nickname_user = remove_vncode_and_spaces($name_of_user);

        $sql_postaccount = "insert into accounts values ($next_account_id,'$uname','$urepass',$default_level, $default_lock)";
        mysqli_query($connection, $sql_postaccount);

        $sql_postuser = "insert into users values ($new_user_id, $next_account_id, '', '$name_of_user', '$name_of_user', '@$nickname_user', '', '', '', '', 0, 0, '', '', '', '')";

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
header("Location: ../");

function remove_vncode_and_spaces($str)
{
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );

    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    return strtolower(preg_replace('/\s+/', '', $str));
}
