<?php

include_once "../configs/dbconfig.php";
$topics_array = mysqli_query($connection, "select * from topics");

$data = [];

while ($topic = mysqli_fetch_array($topics_array, 1)) {
    array_push($data, (object)[
        '_id' => $topic['_ID'],
        'topic_name' => $topic['TOPIC_NAME']
    ]);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
