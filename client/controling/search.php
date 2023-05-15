<?php
// Kết nối đến CSDL
include_once "../configs/dbconfig.php";

// Xử lý tìm kiếm
if (isset($_GET['search_keyword'])) {
    $search_keyword = $_GET['search_keyword'];
    $query = "select * from news where TITLE like '%$search_keyword%' OR CONTENT LIKE '%$search_keyword%'";
    $result = mysqli_query($connection, $query);
}

// Hiển thị kết quả
if (isset($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<h2>' . $row['title'] . '</h2>';
        echo '<p>' . $row['content'] . '</p>';
    }
}



// include_once "../configs/dbconfig.php";
// if (isset($_GET['search__input'])) {

//     $search_keyword = $_GET['search__input'];
//     try {
//         $sql_getuser = "select * from news where TITLE like '%$search_keyword%' OR CONTENT LIKE '%$search_keyword%'";
//         $getquery = mysqli_query($connection, $sql_getuser);
//     } catch (Exception $e) {
//         header("Location: ../");
//     }
// }

// if (isset($getquery)) {
//     while ($row = mysqli_fetch_assoc($getquery)) {
//         echo '<script>console.log(' . $row['TITLE'] . ');</script>';
//         // echo '<p>' . $row['CONTENT'] . '</p>';
//     }
// }
