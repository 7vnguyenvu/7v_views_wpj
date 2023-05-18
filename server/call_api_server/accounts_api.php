<?php

include_once "../configs/dbconfig.php";
$accounts_array = mysqli_query($connection, "select * from accounts");

$data = [];

while ($acc = mysqli_fetch_array($accounts_array, 1)) {
    array_push($data, (object)[
        '_id' => $acc['_ID'],
        'user_name' => $acc['USER_NAME'],
        'user_pass' => $acc['USER_PASS'],
        'user_level' => $acc['USER_LEVEL'],
        'user_lock' => $acc['USER_LOCK']
    ]);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
