<?php
$handle_like = "http://localhost/DO_AN_WEB/server/controling/handle_like.php";

$curr_blog = null;
foreach ($blogs_list as $blogs) {
    $curr_blog = $blogs['_id'] == $_GET['id'] ? $blogs : null;
    if ($curr_blog != null) {
        break;
    }
}

$amount_like = json_decode(file_get_contents("http://localhost/DO_AN_WEB/server/call_api_server/count.php?like&id=" . $curr_blog['_id'] . ""));
$amount_cmt = json_decode(file_get_contents("http://localhost/DO_AN_WEB/server/call_api_server/count.php?cmt&id=" . $curr_blog['_id'] . ""));

$user_of_blog = null;
foreach ($users_list as $utmp) {
    if ($curr_blog['user_id'] == $utmp['_id']) {
        $user_of_blog = $utmp;
        break;
    }
}

if ($account != null) {
    $like_active = false;
    foreach ($likes_list as $like) {
        if ($like['blog_id'] == $curr_blog['_id'] && $like['user_id'] == $user->_id) {
            $like_active = true;
            break;
        }
    }
}
?>

<div class="detail__container">
    <a onclick="history.back()" class="detail__back" style="--mt: 12px;">&lt;# Trở lại</a>
    <a href="./?page=blog" class="detail__back" style="--mt: 48px;">&lt;# Về Blogs</a>
    <div class="detail__content blog">
        <div class="topic-timecreated">
            <h4 class="topic">Thông tin bài viết</h4>
            <?php echo $account != null && $curr_blog['user_id'] == $user->_id ? '<a href="?page=edit_blog&id=' . $curr_blog['_id'] . '&user=' . $user->_id  . '">Chỉnh sửa <i class="fa-solid fa-pen-to-square"></i></a>' : '' ?>
        </div>
        <div class="header">
            <div class="header__user">
                <div class="user__image">
                    <img src="<?php echo $user_of_blog['avatar'] ?>" alt="">
                </div>
                <div class="user__about">
                    <h3><?php echo $user_of_blog['full_name'] ?></h3>
                    <p>● <?php echo Get_Time_Passed($curr_blog['created_at']) ?></p>
                </div>
            </div>

            <div class="header__action">
                <div class="like">
                    <?php
                    if ($account != null) {
                        $icon = $like_active ? "fa-solid fa-heart active" : "fa-regular fa-heart";
                        echo '
                            <form action="' . $handle_like . '" method="post">
                                <input type="hidden" name="blog_id" value="' . $curr_blog['_id'] . '">
                                <input type="hidden" name="user_id" value="' . $user->_id . '">
                                <button type="submit">
                                    <i class="' . $icon . '"></i>
                                </button>
                            </form>
                        ';
                    } else {
                        echo '
                            <button type="submit">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        ';
                    }
                    ?>
                    <p><?php echo $amount_like ?></p>
                </div>
                <div class="comment">
                    <i class="fa-regular fa-comment-dots"></i>
                    <p><?php echo $amount_cmt ?></p>
                </div>
            </div>
        </div>

        <?php
        if ($curr_blog['typical_image']  != '') {
            echo '
                <div class="image">
                    <img src="' . $curr_blog['typical_image'] . '" alt="">
                </div>
            ';
        } ?>

        <?php
        if ($curr_blog['title']  != '') {
            echo '
                <div class="title">
                    <h1>' . $curr_blog['title'] . '</h1>
                </div>
            ';
        } ?>
        <div class="main-content"><?php echo $curr_blog['content'] ?></div>
    </div>
    <h1 class="title_bulkhead">Bài viết khác</h1>
    <hr />
    <div class="other-blogs">
        <?php
        $count_item = 0;

        foreach ($blogs_list as $blogs) {
            if ($blogs['_id'] == $curr_blog['_id']) {
                continue;
            } else {
                if ($count_item < 12) {

                    $user_of_blog = null;
                    foreach ($users_list as $utmp) {
                        if ($blogs['user_id'] == $utmp['_id']) {
                            $user_of_blog = $utmp;
                            break;
                        }
                    }

                    $typical_image_tmp = $blogs['typical_image'] != '' ? $blogs['typical_image'] : $server_path . 'images/no-image.png';
                    $title_tmp = $blogs['title'] != '' ? $blogs['title'] : 'Bài viết không có tiêu đề!';

                    echo '
                    <div class="item">
                        <a href="?detail&page=blog&id=' . $blogs['_id'] . ' " class="image">
                            <img src="' . $typical_image_tmp . '" alt="">
                        </a>
                        <div class="text">
                            <a href="?detail&page=blog&id=' . $blogs['_id'] . ' " class="title">' . $title_tmp . '</a>
                            <p class="other">' . $user_of_blog['nick_name'] . ' ● ' . Get_Time_Passed($blogs['created_at']) . '</p>
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