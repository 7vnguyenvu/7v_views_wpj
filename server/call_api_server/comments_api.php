<?php

include_once "../configs/dbconfig.php";
$comments_array = mysqli_query($connection, "select * from comments");

$data = [];

while ($comment = mysqli_fetch_array($comments_array, 1)) {
    array_push($data, (object)[
        '_id' => $comment['_ID'],
        'blog_id' => $comment['BLOG_ID'],
        'user_id' => $comment['USER_ID'],
        'content' => $comment['CONTENT'],
        'created_at' => $comment['CREATED_AT'],
        'updated_at' => $comment['UPDATED_AT']
    ]);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
