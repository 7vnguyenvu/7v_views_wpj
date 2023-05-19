<?php


session_start();
unset($_SESSION['user_logged']);

// $location = isset($_GET['formclient']) ? "http://localhost/DO_AN_WEB/client/" : "../";
// header("Location: $location");
echo '
    <script>
        history.back()
    </script>
';
