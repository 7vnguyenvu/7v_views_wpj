<?php
$likes_data = file_get_contents("http://localhost/DO_AN_WEB/server/call_api_server/likes_api.php");
$likes_list = json_decode($likes_data, true);
