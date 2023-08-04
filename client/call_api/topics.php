<?php
$topics_data = file_get_contents("http://localhost/7v_views_wpj/server/call_api_server/topics_api.php");
$topics_list = json_decode($topics_data, true);
