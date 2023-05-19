<?php

include_once "../configs/dbconfig.php";
$follows_array = mysqli_query($connection, "select * from follows");

$data = [];

while ($follow = mysqli_fetch_array($follows_array, 1)) {
    array_push($data, (object)[
        '_id' => $follow['_ID'],
        'user_ref_id' => $follow['USER_REF_ID'],
        'user_id' => $follow['USER_ID'],
        'created_at' => $follow['CREATED_AT']
    ]);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
