<?php
include_once "../configs/dbconfig.php";

date_default_timezone_set('Asia/Ho_Chi_Minh');

$get_new_id = mysqli_fetch_array(mysqli_query($connection, "select max(_ID) + 1 as curr_id from likes"))['curr_id'];
$blog_id = $_POST['blog_id'];
$user_id = $_POST['user_id'];
$created_at = (new DateTime())->format('Y-m-d h:i:s');

$sql_getuser = "select * from likes where BLOG_ID = $blog_id and USER_ID  = $user_id";
$getquery = mysqli_query($connection, $sql_getuser);

$sql_like = "";
if ($getquery->num_rows == 0) {
    $sql_like = "insert into likes values ($get_new_id, $blog_id, $user_id, '$created_at')";
} else {
    $sql_like = "delete from likes where BLOG_ID = $blog_id and USER_ID  = $user_id";
}


mysqli_query($connection, $sql_like);
header("Location: http://localhost/DO_AN_WEB/client/?detail&page=blog&id=$blog_id");
