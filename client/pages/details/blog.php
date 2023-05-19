<?php
include "./call_api/blogs.php";
include "./call_api/users.php";
include "./call_api/likes.php";
include "./call_api/comments.php";

$handle_like = "http://localhost/DO_AN_WEB/server/controling/handle_like.php";

$curr_bolg = null;
foreach ($blogs_list as $blogs) {
    $curr_bolg = $blogs['_id'] == $_GET['id'] ? $blogs : null;
    if ($curr_bolg != null) {
        break;
    }
}

$user_of_blog = null;
foreach ($users_list as $utmp) {
    if ($curr_bolg['user_id'] == $utmp['_id']) {
        $user_of_blog = $utmp;
        break;
    }
}

$amount_like = 0;
foreach ($likes_list as $like) {
    if ($like['blog_id'] == $curr_bolg['_id']) {
        $amount_like++;
    }
}
$like_active = false;
foreach ($likes_list as $like) {
    if ($like['blog_id'] == $curr_bolg['_id'] && $like['user_id'] == $user->_id) {
        $like_active = true;
        break;
    }
}

$amount_cmt = 0;
foreach ($comments_list as $comment) {
    if ($comment['blog_id'] == $curr_bolg['_id']) {
        $amount_cmt++;
    }
}
?>

<div class="detail__container">
    <a href="./?page=blog" class="detail__back">&lt;# Trở lại</a>
    <div class="detail__content blog">
        <div class="topic-timecreated">
            <h4 class="topic">Thông tin bài viết</h4>
            <?php echo $curr_bolg['user_id'] == $user->_id ? '<a href="?page=edit_blog&id=' . $curr_bolg['_id'] . '">Chỉnh sửa <i class="fa-solid fa-pen-to-square"></i></a>' : '' ?>
        </div>
        <div class="header">
            <div class="header__user">
                <div class="user__image">
                    <img src="<?php echo $user_of_blog['avatar'] ?>" alt="">
                </div>
                <div class="user__about">
                    <h3><?php echo $user_of_blog['full_name'] ?></h3>
                    <p><?php echo $curr_bolg['created_at'] ?></p>
                </div>
            </div>

            <?php
            if ($account != null) {

                $icon = $like_active ? "fa-solid fa-heart active" : "fa-regular fa-heart";

                echo '
                <div class="header__action">
                    <div class="like">
                        <form action="' . $handle_like . '" method="post">
                            <input type="hidden" name="blog_id" value="' . $curr_bolg['_id'] . '">
                            <input type="hidden" name="user_id" value="' . $user->_id . '">
                            <button type="submit">
                                <i class="' . $icon . '"></i>
                            </button>
                        </form>
                        <p>' . $amount_like . '</p>
                    </div>
                    <div class="comment">
                        <i class="fa-regular fa-comment-dots"></i>
                        <p>' . $amount_cmt . '</p>
                    </div>
                </div>
            ';
            }
            ?>

        </div>

        <div class="image">
            <img src="<?php echo $curr_bolg['typical_image'] ?>" alt="">
        </div>
        <div class="title">
            <h1><?php echo $curr_bolg['title'] ?></h1>
        </div>
        <div class="main-content"><?php echo $curr_bolg['content'] ?></div>
    </div>
    <h1 class="title_bulkhead">Bài viết khác</h1>
    <hr />
    <div class="other-blogs">
        <?php
        $count_item = 0;

        foreach ($blogs_list as $blogs) {
            if ($blogs['_id'] == $curr_bolg['_id']) {
                continue;
            } else {
                if ($count_item < 4) {

                    $user_of_blog = null;
                    foreach ($users_list as $utmp) {
                        if ($blogs['user_id'] == $utmp['_id']) {
                            $user_of_blog = $utmp;
                            break;
                        }
                    }

                    echo '
                    <div class="item">
                        <a href="?detail&page=blog&id=' . $blogs['_id'] . ' " class="image">
                            <img src="' . $blogs['typical_image'] . '" alt="">
                        </a>
                        <div class="text">
                            <a href="?detail&page=blog&id=' . $blogs['_id'] . ' " class="title">' . $blogs['title'] . '</a>
                            <p class="other">| ' . $blogs['created_at'] . '</p>
                        </div>
                    </div>
                ';

                    $count_item++;
                } else {
                    break;
                }
            }
        }
        ?>
    </div>
</div>