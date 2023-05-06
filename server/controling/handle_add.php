<?php
include_once "../configs/dbconfig.php";

if (isset($_POST['add_news'])) {

    $get_new_id = mysqli_query($connection, "select max(_id) + 1 as next_id from news");
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $news_image__path = "uploads/news_imgs/";
    $news_image__path = $news_image__path . basename($_FILES['typical_image']['name']);
    move_uploaded_file($_FILES['typical_image']['tmp_name'], "../" . $news_image__path);

    $news_tmp = (object) [
        '_id' => mysqli_fetch_array($get_new_id, 1)['next_id'],
        'topic_id' => trim($_POST['topic_id']),
        'title' => trim($_POST['title']),
        'sapo' => trim($_POST['sapo']),
        'content' => trim($_POST['content']),
        'typical_image' => trim($news_image__path),
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
}
