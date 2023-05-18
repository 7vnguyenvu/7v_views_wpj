<?php
$accounts_data = file_get_contents("http://localhost/DO_AN_WEB/server/call_api_server/accounts_api.php");
$accounts_list = json_decode($accounts_data, true);
