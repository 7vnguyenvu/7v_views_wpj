<?php


session_start();
unset($_SESSION['user_logged']);

// $location = isset($_GET['formclient']) ? "http://localhost/7v_views_wpj/client/" : "../";
// header("Location: $location");
echo '
    <script>
        history.back()
    </script>
';
