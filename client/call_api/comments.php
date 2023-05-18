<?php
$comments_data = file_get_contents("http://localhost/DO_AN_WEB/server/call_api_server/comments_api.php");
$comments_list = json_decode($comments_data, true);
