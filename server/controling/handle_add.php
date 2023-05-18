<?php
include_once "../configs/dbconfig.php";

$path_of_image_container = "http://localhost/DO_AN_WEB/server/";

if (isset($_POST['add_news'])) {

    $get_new_id = mysqli_query($connection, "select max(_id) + 1 as next_id from news");
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $news_image__path = "uploads/news_imgs/";
    $news_image__path = $news_image__path . uniqid() . "__" . basename($_FILES['typical_image']['name']);
    move_uploaded_file($_FILES['typical_image']['tmp_name'], "../" . $news_image__path);

    $news_tmp = (object) [
        '_id' => mysqli_fetch_array($get_new_id, 1)['next_id'],
        'topic_id' => trim($_POST['topic_id']),
        'title' => trim($_POST['title']),
        'sapo' => trim($_POST['sapo']),
        'content' => trim($_POST['content']),
        'typical_image' => trim($path_of_image_container . $news_image__path),
        'note_image' => trim($_POST['note_image']),
        'user_id' => trim($_POST['user_id']),
        'created_at' => (new DateTime())->format('Y-m-d h:i:s'),
        'updated_at' => (new DateTime())->format('Y-m-d h:i:s'),
    ];

    $sql_postnews = "insert into news values (
        $news_tmp->_id,
        $news_tmp->topic_id,
        '$news_tmp->title',
        '$news_tmp->sapo',
        '$news_tmp->content',
        '$news_tmp->typical_image',
        '$news_tmp->note_image',
        $news_tmp->user_id,
        '$news_tmp->created_at',
        '$news_tmp->updated_at'
        )";


    mysqli_query($connection, $sql_postnews);
    header("Location: ../");
} elseif (isset($_POST['add_topic'])) {

    $get_new_id = mysqli_query($connection, "select max(_id) + 1 as next_id from topics");

    $topic_tmp = (object) [
        '_id' => mysqli_fetch_array($get_new_id, 1)['next_id'],
        'topic_name' => trim($_POST['topic_name']),
    ];

    $sql_posttopics = "insert into topics values ($topic_tmp->_id,'$topic_tmp->topic_name')";

    mysqli_query($connection, $sql_posttopics);
    header("Location: ../");
} elseif (isset($_POST['add_blog'])) {

    $get_new_id = mysqli_query($connection, "select max(_id) + 1 as next_id from blogs");
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $blog_image__path = "uploads/blog_imgs/";
    if (isset($_FILES['typical_image']['name']) && $_FILES['typical_image']['name'] != "") {
        $blog_image__path = $blog_image__path . uniqid() . "__" . basename($_FILES['typical_image']['name']);
        move_uploaded_file($_FILES['typical_image']['tmp_name'], "../" . $blog_image__path);
    } else {
        $blog_image__path = "http://localhost/DO_AN_WEB/server/images/no-image.png";
    }

    $blogs_tmp = (object) [
        '_id' => mysqli_fetch_array($get_new_id, 1)['next_id'],
        'user_id' => trim($_POST['user_id']),
        'title' => trim($_POST['title']),
        'content' => trim($_POST['content']),
        'typical_image' => trim($path_of_image_container . $blog_image__path),
        'created_at' => (new DateTime())->format('Y-m-d h:i:s'),
        'updated_at' => (new DateTime())->format('Y-m-d h:i:s'),
    ];

    $sql_postblog = "insert into blogs values (
        $blogs_tmp->_id,
        $blogs_tmp->user_id,
        '$blogs_tmp->title',
        '$blogs_tmp->content',
        '$blogs_tmp->typical_image',
        '$blogs_tmp->created_at',
        '$blogs_tmp->updated_at'
        )";

    mysqli_query($connection, $sql_postblog);

    if (isset($_POST['formclient'])) {
        header("Location: http://localhost/DO_AN_WEB/client/?page=blog");
    } else {
        header("Location: ../?page=blog ");
    }
} elseif (isset($_POST['add_account'])) {

    $name_of_user = isset($_POST['name_of_user']) ? trim($_POST['name_of_user']) : null;
    $uname = isset($_POST['username']) ? trim($_POST['username']) : null;
    $upass = isset($_POST['password']) ? trim($_POST['password']) : null;
    $urepass = isset($_POST['re-password']) ? trim($_POST['re-password']) : null;


    if ($name_of_user && $uname && $upass && $urepass) {
        try {
            $next_account_id = mysqli_fetch_array(mysqli_query($connection, "select max(_ID) + 1 as curr_id from accounts"))['curr_id'];
            $default_level = 4;
            $default_lock = 0;

            $new_user_id = mysqli_fetch_array(mysqli_query($connection, "select max(_ID) + 1 as curr_id from accounts"))['curr_id'];
            $nickname_user = remove_vncode_and_spaces($name_of_user);


            $sql_postaccount = "insert into accounts values ($next_account_id,'$uname','$urepass',$default_level, $default_lock)";

            $sql_postuser = "insert into users values ($new_user_id, $next_account_id, '', '$name_of_user', '$name_of_user', '@$nickname_user', '', '', 'http://localhost/DO_AN_WEB/server/images/no-image-user.png', 'http://localhost/DO_AN_WEB/server/images/no-image-cover.png', 0, 0, '', '', '', '')";

            mysqli_query($connection, $sql_postaccount);
            mysqli_query($connection, $sql_postuser);

            header("Location: ../?page=blog ");
        } catch (Exception $e) {
            header("Location: ../?page=blog ");
        }
    }

    header("Location: ../?page=blog ");
}



function remove_vncode_and_spaces($str)
{
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );

    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    return strtolower(preg_replace('/\s+/', '', $str));
}
