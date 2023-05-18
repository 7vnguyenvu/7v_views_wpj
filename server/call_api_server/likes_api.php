<?php

include_once "../configs/dbconfig.php";
$likes_array = mysqli_query($connection, "select * from likes");

$data = [];

while ($like = mysqli_fetch_array($likes_array, 1)) {
    array_push($data, (object)[
        '_id' => $like['_ID'],
        'blog_id' => $like['BLOG_ID'],
        'user_id' => $like['USER_ID'],
        'created_at' => $like['CREATED_AT']
    ]);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
