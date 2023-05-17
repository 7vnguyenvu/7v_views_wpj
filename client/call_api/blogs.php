<?php
$blogs_data = file_get_contents("http://localhost/DO_AN_WEB/server/call_api_server/blogs_api.php");
$blogs_list = json_decode($blogs_data, true);
