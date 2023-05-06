<?php

session_start();
unset($_SESSION['user_logged']);

header("Location: ../");
