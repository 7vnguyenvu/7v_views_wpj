<?php
$follows_data = file_get_contents("http://localhost/DO_AN_WEB/server/call_api_server/follows_api.php");
$follows_list = json_decode($follows_data, true);
