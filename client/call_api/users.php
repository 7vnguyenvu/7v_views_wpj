<?php
$users_data = file_get_contents("http://localhost/7v_views_wpj/server/call_api_server/users_api.php");
$users_list = json_decode($users_data, true);
