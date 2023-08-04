<?php
session_start();
include_once "../configs/dbconfig.php";

// $location = isset($_POST['formclient']) ? "http://localhost/7v_views_wpj/client/" : "../";

$uname = isset($_POST['username']) ? $_POST['username'] : null;
$upass = isset($_POST['password']) ? md5($_POST['password']) : null;

if ($uname && $upass) {
    try {
        $sql_getuser = "select * from accounts where USER_NAME = '$uname' and USER_PASS = '$upass'";
        $getquery = mysqli_query($connection, $sql_getuser);
    } catch (Exception $e) {
        header("Location: $location");
    }

    if ($getquery->num_rows == 0) {
        echo '
            <script>
                alert("Tài khoản không tồn tại");
                history.back();
            </script>
        ';
    } else {
        $row = mysqli_fetch_array($getquery);

        if ($row['USER_LOCK'] != 0) {
            echo '
                <script>
                    alert("Tài khoản của bạn đã bị khóa!");
                    history.back();                    
                </script>
            ';
        } elseif (password_verify($upass, password_hash($row['USER_PASS'], PASSWORD_DEFAULT))) {
            $user_logged = (object) [
                '_id' => $row['_ID'],
                'username' => $row['USER_NAME'],
                'password' => $row['USER_PASS'],
                'level' => $row['USER_LEVEL'],
                'lock' => $row['USER_LOCK']
            ];

            $_SESSION['user_logged'] = $user_logged;
            echo '
                <script>
                    history.back()
                </script>
            ';
        } else {
            echo '
                <script>
                    alert("Tài khoản không hợp lệ");
                    history.back();
                </script>
            ';
        }
    }
}
