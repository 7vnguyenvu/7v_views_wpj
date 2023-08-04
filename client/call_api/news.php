<?php
$news_data = file_get_contents("http://localhost/7v_views_wpj/server/call_api_server/news_api.php");
$news_list = json_decode($news_data, true);
