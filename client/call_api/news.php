<?php
$news_data = file_get_contents("http://localhost/DO_AN_WEB/server/call_api_server/news_api.php");
$news_list = json_decode($news_data, true);
