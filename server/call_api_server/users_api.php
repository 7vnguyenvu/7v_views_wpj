<?php

include "../configs/dbconfig.php";
$users = mysqli_query($connection, "select * from users");

$data = [];

while ($user = mysqli_fetch_array($users, 1)) {
    array_push($data, (object)[
        '_id' => $user['_ID'],
        'account_id' => $user['ACCOUNTS_ID'],
        'first_name' => $user['FIRST_NAME'],
        'last_name' => $user['LAST_NAME'],
        'full_name' => $user['FULL_NAME'],
        'nick_name' => $user['NICK_NAME'],
        'birth' => $user['BIRTH'],
        'avatar' => $user['AVATAR'],
        'cover_img' => $user['COVER_IMAGE'],
        'following' => $user['FOLLOWING'],
        'follower' => $user['FOLLOWER'],
        'face_url' => $user['FACEBOOK_URL'],
        'tiktok_url' => $user['TIKTOK_URL'],
        'youtube_url' => $user['YOUTUBE_URL'],
        'instagram_url' => $user['INSTAGRAM_URL']
    ]);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
