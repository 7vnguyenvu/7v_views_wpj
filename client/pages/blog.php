<?php
$user_filler = isset($_GET['user']) ? $_GET['user'] : null;

$new_list_blogs = $blogs_list;
$notify = null;
if ($user_filler) {
    $new_list_blogs = [];
    foreach ($blogs_list as $blog) {
        if ($blog['user_id'] == $user_filler) {
            array_push($new_list_blogs, $blog);
        }
    }
    if (count($new_list_blogs) == 0) {
        $new_list_blogs = $blogs_list;
        $notify = "Không có bài viết nào từ bạn!";
    }
}
?>

<div class="home">
    <div class="home__content">
        <?php
        if ($notify) {
            echo "
                <script>
                    alert('$notify');
                    location.href = './?page=blog';
                </script>
            ";
        }
        ?>
        <h1>Bài viết mới nhất</h1>
        <div class="home__content-hot">
            <?php
            $user_of_blog_new = null;
            foreach ($users_list as $utmp) {
                if ($utmp['_id'] == $new_list_blogs[0]['user_id']) {
                    $user_of_blog_new = $utmp;
                    break;
                }
            }
            ?>

            <div class="hotitem">
                <div class="text">
                    <div class="user">
                        <a href="?detail&page=profile&user=<?php echo $user_of_blog_new['nick_name'] ?>" class="user__image">
                            <img src="<?php echo $user_of_blog_new['avatar'] ?>" alt="">
                        </a>
                        <a href="?detail&page=profile&user=<?php echo $user_of_blog_new['nick_name'] ?>" class="user__about">
                            <h3><?php echo $user_of_blog_new['full_name'] ?></h3>
                            <p><?php echo $user_of_blog_new['nick_name'] ?></p>
                        </a>
                    </div>
                    <a href="?detail&page=blog&id=<?php echo $new_list_blogs[0]['_id'] ?>" class="title">
                        <?php echo trim($new_list_blogs[0]['title']) != '' ? $new_list_blogs[0]['title'] : 'Bài viết không có tiêu đề! <br />👉🏻 Vào xem ngay!' ?>
                    </a>
                    <p class="other">● <?php echo Get_Time_Passed($new_list_blogs[0]['created_at']) ?></p>
                </div>
                <a href="?detail&page=blog&id=<?php echo $new_list_blogs[0]['_id'] ?>" class="image">
                    <img src="<?php echo $new_list_blogs[0]['typical_image'] != '' ? $new_list_blogs[0]['typical_image'] : $server_path . 'images/no-image.png' ?>" alt="">
                </a>
            </div>
        </div>


        <div class="home__content-blog_items">
            <?php
            for ($i = 1; $i < count($new_list_blogs); $i++) {

                $user_of_blog_new = null;
                foreach ($users_list as $utmp) {
                    if ($utmp['_id'] == $new_list_blogs[$i]['user_id']) {
                        $user_of_blog_new = $utmp;
                        break;
                    }
                }

                $typical_image_tmp = $new_list_blogs[$i]['typical_image'] != '' ? $new_list_blogs[$i]['typical_image'] : $server_path . 'images/no-image.png';
                $title_tmp = $new_list_blogs[$i]['title'] != '' ? $new_list_blogs[$i]['title'] : 'Bài viết không có tiêu đề! <br />👉🏻 Vào xem thử!';

                echo '
                    <div class="blog_item">
                        <div class="text">
                            <div class="user">
                                <a href="?detail&page=profile&user=' . $user_of_blog_new['nick_name'] . '" class="user__image">
                                    <img src="' . $user_of_blog_new['avatar'] . '" alt="">
                                </a>
                                <a href="?detail&page=profile&user=' . $user_of_blog_new['nick_name'] . '" class="user__about">
                                    <h5>' . $user_of_blog_new['full_name'] . '</h5>
                                </a>
                            </div>
                            <a href="?detail&page=blog&id=' . $new_list_blogs[$i]['_id'] . '" class="title">' . $title_tmp . '</a>
                            <p class="other">● ' . Get_Time_Passed($new_list_blogs[$i]['created_at']) . '</p>
                        </div>
                        <a href="?detail&page=blog&id=' . $new_list_blogs[$i]['_id'] . '" class="image">
                            <img src="' . $typical_image_tmp . '" alt="">
                        </a>
                    </div>
                ';
            }
            ?>
        </div>

    </div>

    <div class="home__action">

        <?php
        if ($account != null) {
            echo '
                <h2>Tùy chọn</h2>
                <div class="home__action-select">
                    <a href="?page=add_blog">
                    <i class="fa-solid fa-pen" style="margin-right: 8px;"></i>Viết Blog
                    </a>
                    <a href="?page=blog&user=' . $user->_id . '">
                    <i class="fa-solid fa-paperclip" style="margin-right: 8px;"></i>Bài viết của tôi
                    </a>
                </div>
            ';
        }
        ?>

        <h2>Người dùng mới</h2>

        <div class="home__action-select">
            <?php
            $count_load_new_user = 0;
            if ($count_load_new_user < 5) {
                foreach (array_reverse($users_list) as $utmp) {
                    if ($account != null && $utmp['_id'] == $user->_id) {
                        continue;
                    }
                    echo '
                        <a href="?detail&page=profile&user=' . $utmp['nick_name'] . '" class="user">
                            <div class="user__image">
                                <img src="' . $utmp['avatar'] . '" alt="avt">
                            </div>
                            <p class="user__about">' . $utmp['full_name'] . '</p>
                        </a>
                    ';
                    $count_load_new_user++;
                }
            }
            ?>
        </div>
    </div>

</div>

<script>
    const Handle_OnDel = (e, id) => {
        if (confirm(`Xác nhận xóa dữ liệu ${id}`) == false)
            e.preventDefault();
    }
</script>