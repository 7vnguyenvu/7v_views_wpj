<?php
include_once "../configs/dbconfig.php";

date_default_timezone_set('Asia/Ho_Chi_Minh');

$get_new_id = mysqli_fetch_array(mysqli_query($connection, "select max(_ID) + 1 as curr_id from follows"))['curr_id'];
$get_new_id = $get_new_id != "" ? $get_new_id : 1;
$user_red_id = $_POST['user_red_id'];
$user_id = $_POST['user_id'];
$created_at = (new DateTime())->format('Y-m-d H:i:s');

$sql_getuser = "select * from follows where USER_REF_ID = $user_red_id and USER_ID  = $user_id";
$getquery = mysqli_query($connection, $sql_getuser);

$sql_follow = "";
if ($getquery->num_rows == 0) {
    $sql_follow = "insert into follows values ($get_new_id, $user_red_id, $user_id, '$created_at')";
} else {
    $sql_follow = "delete from follows where USER_REF_ID = $user_red_id and USER_ID  = $user_id";
}

mysqli_query($connection, $sql_follow);
// header("Location: http://localhost/DO_AN_WEB/client/?page=explore");
echo '
    <script>
        history.back()
    </script>
';
