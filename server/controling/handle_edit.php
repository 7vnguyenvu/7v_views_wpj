<?php
include_once "../configs/dbconfig.php";

$path_of_image_container = "http://localhost/DO_AN_WEB/server/";

if (isset($_POST['edit_news'])) {

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $get_news_typical_image = mysqli_fetch_array(mysqli_query($connection, 'select * from news where _ID = ' . $_POST['_id'] . ''), 1)['TYPICAL_IMAGE'];

    $blog_tmp = (object) [
        '_id' => trim($_POST['_id']),
        'topic_id' => trim($_POST['topic_id']),
        'title' => trim($_POST['title']),
        'sapo' => trim($_POST['sapo']),
        'content' => trim($_POST['content']),
        'typical_image' => trim($get_news_typical_image),
        'note_image' => trim($_POST['note_image']),
        'user_id' => trim($_POST['user_id']),
        'created_at' => trim($_POST['created_at']),
        'updated_at' => (new DateTime())->format('Y-m-d h:i:s'),
    ];

    $sql_editblog = "update news set
        TOPIC_ID = '$blog_tmp->topic_id',
        TITLE = '$blog_tmp->title',
        SAPO = '$blog_tmp->sapo',
        CONTENT = '$blog_tmp->content',
        TYPICAL_IMAGE = '$blog_tmp->typical_image',
        NOTE_IMAGE = '$blog_tmp->note_image',
        USER_ID = '$blog_tmp->user_id',
        CREATED_AT = '$blog_tmp->created_at',
        UPDATED_AT = '$blog_tmp->updated_at'
        where _ID = $blog_tmp->_id";

    mysqli_query($connection, $sql_editblog);
    header("Location: ../");
} elseif (isset($_POST['edit_topic'])) {

    $topic_tmp = (object) [
        '_id' => trim($_POST['_id']),
        'topic_name' => trim($_POST['topic_name']),
    ];

    $sql_edittopics = "update topics set TOPIC_NAME = '$topic_tmp->topic_name' where _ID = $topic_tmp->_id";

    mysqli_query($connection, $sql_edittopics);
    header("Location: ../");
} elseif (isset($_POST['edit_blog'])) {

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    // XÓA ẢNH CŨ
    $get_typical_img = mysqli_fetch_array(mysqli_query($connection, 'select * from blogs where _ID = ' . $_POST['_id'] . ''))['TYPICAL_IMAGE'];
    unlink('../' . $get_typical_img);

    $blog_image__path = "uploads/blog_imgs/";
    if (isset($_FILES['typical_image']['name']) && $_FILES['typical_image']['name'] != "") {
        // THAY ẢNH MỚI
        $blog_image__path = $blog_image__path . uniqid() . "__" . basename($_FILES['typical_image']['name']);
        move_uploaded_file($_FILES['typical_image']['tmp_name'], "../" . $blog_image__path);
    } else {
        $blog_image__path = "images/no-image.png";
    }

    $blog_tmp = (object) [
        '_id' => trim($_POST['_id']),
        'title' => trim($_POST['title']),
        'content' => trim($_POST['content']),
        'typical_image' => trim($path_of_image_container . $blog_image__path),
        'user_id' => trim($_POST['user_id']),
        'created_at' => trim($_POST['created_at']),
        'updated_at' => (new DateTime())->format('Y-m-d h:i:s'),
    ];

    $sql_editblog = "update blogs set
        TITLE = '$blog_tmp->title',
        CONTENT = '$blog_tmp->content',
        TYPICAL_IMAGE = '$blog_tmp->typical_image',
        USER_ID = '$blog_tmp->user_id',
        CREATED_AT = '$blog_tmp->created_at',
        UPDATED_AT = '$blog_tmp->updated_at'
        where _ID = $blog_tmp->_id";

    mysqli_query($connection, $sql_editblog);


    if (isset($_POST['formclient'])) {
        header("Location: http://localhost/DO_AN_WEB/client/?page=blog");
    } else {
        header("Location: ../?page=blog ");
    }
} elseif (isset($_POST['change_password'])) {

    $uname = isset($_POST['username']) ? trim($_POST['username']) : null;
    $oldpass = isset($_POST['old-password']) ? trim($_POST['old-password']) : null;
    $newpass = isset($_POST['new-password']) ? trim($_POST['new-password']) : null;
    $urepass = isset($_POST['re-password']) ? trim($_POST['re-password']) : null;

    $get_acc = mysqli_fetch_array(mysqli_query($connection, "select * from accounts where _ID = " . $_POST['_id'] . " and USER_PASS = '$oldpass'"));

    if ($uname && $oldpass && $newpass && $urepass) {

        $sql_changepass = "update accounts set
        USER_PASS = '$urepass'
        where _ID = " . $get_acc['_ID'] . "";

        mysqli_query($connection, $sql_changepass);

        header("Location: ../?page=blog ");
    }
}
