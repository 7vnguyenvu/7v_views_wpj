<?php

include_once "../configs/dbconfig.php";
$news_array = mysqli_query($connection, "select * from news order by _ID desc");

$data = [];

while ($news = mysqli_fetch_array($news_array, 1)) {
    array_push($data, (object)[
        '_id' => $news['_ID'],
        'topic_id' => $news['TOPIC_ID'],
        'title' => $news['TITLE'],
        'sapo' => $news['SAPO'],
        'content' => $news['CONTENT'],
        'typical_image' => $news['TYPICAL_IMAGE'],
        'note_image' => $news['NOTE_IMAGE'],
        'user_id' => $news['USER_ID'],
        'created_at' => $news['CREATED_AT'],
        'updated_at' => $news['UPDATED_AT']
    ]);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
