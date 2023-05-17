<?php

include_once "../configs/dbconfig.php";
$blogs_array = mysqli_query($connection, "select * from blogs order by _ID desc");

$data = [];

while ($blog = mysqli_fetch_array($blogs_array, 1)) {
    array_push($data, (object)[
        '_id' => $blog['_ID'],
        'user_id' => $blog['USER_ID'],
        'title' => $blog['TITLE'],
        'content' => $blog['CONTENT'],
        'typical_image' => $blog['TYPICAL_IMAGE'],
        'created_at' => $blog['CREATED_AT'],
        'updated_at' => $blog['UPDATED_AT']
    ]);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
