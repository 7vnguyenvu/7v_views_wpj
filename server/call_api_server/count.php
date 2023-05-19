<?php
include_once "../configs/dbconfig.php";

$amount = 0;
if (isset($_GET['like'])) {
    $amount = mysqli_fetch_array(mysqli_query($connection, "select COUNT(BLOG_ID) as amount from likes where BLOG_ID = " . $_GET['id'] . ""))['amount'];
} elseif (isset($_GET['flw'])) {
    $amount = mysqli_fetch_array(mysqli_query($connection, "select COUNT(USER_REF_ID) as amount from follows where USER_REF_ID = " . $_GET['id'] . ""))['amount'];
} elseif (isset($_GET['cmt'])) {
    $amount = mysqli_fetch_array(mysqli_query($connection, "select COUNT(BLOG_ID) as amount from comments where BLOG_ID = " . $_GET['id'] . ""))['amount'];
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($amount);
