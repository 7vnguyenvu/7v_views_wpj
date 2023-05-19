<?php
include_once "../configs/dbconfig.php";

if (isset($_GET['del_news'])) {
    $get_typical_img = mysqli_fetch_array(mysqli_query($connection, 'select * from news where _ID = ' . $_GET['id'] . ''))['TYPICAL_IMAGE'];
    $sql_delnews = 'delete from news where _ID = ' . $_GET['id'] . '';
    unlink('../' . $get_typical_img);
    mysqli_query($connection, $sql_delnews);
    header("Location: ../");
} elseif (isset($_GET['del_topic'])) {
    $sql_deltopic = 'delete from topics where _ID = ' . $_GET['id'] . '';
    mysqli_query($connection, $sql_deltopic);
    header("Location: ../");
} elseif (isset($_GET['del_blog'])) {
    $get_typical_img = mysqli_fetch_array(mysqli_query($connection, 'select * from blogs where _ID = ' . $_GET['id'] . ''))['TYPICAL_IMAGE'];
    $sql_delblog = 'delete from blogs where _ID = ' . $_GET['id'] . '';
    unlink('../' . $get_typical_img);
    mysqli_query($connection, $sql_delblog);
    if (isset($_POST['formclient'])) {
        header("Location: http://localhost/DO_AN_WEB/client/?page=blog");
    } else {
        header("Location: ../?page=blog ");
    }
} elseif (isset($_GET['del_account'])) {
    // XÓA TÀI KHOẢN -> VỚI HÌNH THỨC KHÓA
    $sql_lock = "update accounts set USER_LOCK = 1 where _ID = " . $_GET['id'] . "";

    mysqli_query($connection, $sql_lock);
    header("Location: ../?page=blog");
} elseif (isset($_GET['des_account'])) {
    // XÓA NGƯỜI DÙNG
    $get_user_of_account = mysqli_fetch_array(mysqli_query($connection, 'select * from users where ACCOUNTS_ID = ' . $_GET['id'] . ''));
    $get_avatar_img = $get_user_of_account['AVATAR'];
    $get_cover_img = $get_user_of_account['COVER_IMAGE'];
    $sql_deluser = 'delete from users where _ID = ' . $get_user_of_account['_ID'] . '';
    unlink('../' . $get_avatar_img);
    unlink('../' . $get_cover_img);
    mysqli_query($connection, $sql_deluser);

    // XÓA TÀI KHOẢN VĨNH VIỄN
    $sql_delaccount = "delete from accounts where _ID = " . $_GET['id'] . "";

    mysqli_query($connection, $sql_delaccount);
    header("Location: ../?page=blog");
} elseif (isset($_GET['unlock'])) {
    // TRẢ LẠI TÀI KHOẢN ĐÃ XÓA -> VỚI HÌNH THỨC MỞ KHÓA
    $sql_unlock = "update accounts set USER_LOCK = 0 where _ID = " . $_GET['id'] . "";

    mysqli_query($connection, $sql_unlock);
    header("Location: ../?page=blog");
}
