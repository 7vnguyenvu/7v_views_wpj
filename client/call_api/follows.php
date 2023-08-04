<?php
$follows_data = file_get_contents("http://localhost/7v_views_wpj/server/call_api_server/follows_api.php");
$follows_list = json_decode($follows_data, true);
