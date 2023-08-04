<?php
$blogs_data = file_get_contents("http://localhost/7v_views_wpj/server/call_api_server/blogs_api.php");
$blogs_list = json_decode($blogs_data, true);
