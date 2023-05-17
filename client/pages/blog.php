<?php
include_once "./configs/dbconfig.php";

$get_blogs = mysqli_query($connection, "select * from blogs order by _ID desc");
$get_users = mysqli_query($connection, "select * from users, accounts where users.ACCOUNTS_ID = accounts._ID");
$get_accounts = mysqli_query($connection, "select * from accounts where USER_LOCK = 0");
$get_accounts_locked = mysqli_query($connection, "select * from accounts where USER_LOCK = 1");
?>
<?php
include "./call_api/blogs.php";
?>

<div class="home">
    <div class="home__content">
        <h1>Bài viết mới nhất</h1>
        <hr />
        <div class="home__content-hot">
            <?php
            $user_of_blog_new = null;
            foreach ($users_list as $utmp) {
                if ($utmp['_id'] == $blogs_list[0]['user_id']) {
                    $user_of_blog_new = $utmp;
                    break;
                }
            }
            ?>
            <div class="hotitem">
                <div class="text">
                    <div class="user">
                        <div class="user__image">
                            <img src="<?php echo $user_of_blog_new['avatar'] ?>" alt="">
                        </div>
                        <div class="user__about">
                            <h3><?php echo $user_of_blog_new['full_name'] ?></h3>
                            <p><?php echo $user_of_blog_new['nick_name'] ?></p>
                        </div>
                    </div>
                    <a href="?detail&page=blog&id=<?php echo $blogs_list[0]['_id'] ?>" class="title"><?php echo $blogs_list[0]['title'] ?></a>
                    <p class="other">| <?php echo $blogs_list[0]['created_at'] ?></p>
                </div>
                <a href="?detail&page=blog&id=<?php echo $blogs_list[0]['_id'] ?>" class="image">
                    <img src="<?php echo $blogs_list[0]['typical_image'] ?>" alt="">
                </a>
            </div>
        </div>


        <div class="home__content-blog_items">
            <?php
            for ($i = 1; $i < count($blogs_list); $i++) {

                $user_of_blog_new = null;
                foreach ($users_list as $utmp) {
                    if ($utmp['_id'] == $blogs_list[$i]['user_id']) {
                        $user_of_blog_new = $utmp;
                        break;
                    }
                }

                echo '                    
                    <div class="blog_item">
                        <div class="text">
                            <div class="user">
                                <div class="user__image">
                                    <img src="' . $user_of_blog_new['avatar'] . '" alt="">
                                </div>
                                <div class="user__about">
                                    <h5>' . $user_of_blog_new['full_name'] . '</h5>
                                </div>
                            </div>
                            <a href="?detail&page=blog&id=' . $blogs_list[$i]['_id'] . '" class="title">' . $blogs_list[$i]['title'] . '</a>
                            <p class="other">| ' . $blogs_list[$i]['created_at'] . '</p>
                        </div>
                        <a href="?detail&page=blog&id=' . $blogs_list[$i]['_id'] . '" class="image">
                            <img src="' . $blogs_list[$i]['typical_image'] . '" alt="">
                        </a>
                    </div>
                ';
            }
            ?>
        </div>

    </div>

    <div class="home__action">
        <h2>Tùy chọn</h2>
        <div class="home__action-select">
            <a href="?user&' . $user_tmp['NICK_NAME'] . '">
                Viết Blog
            </a>
        </div>

        <h2>Người dùng nổi bật</h2>

        <div class="home__action-select">
            <?php
            // while ($user_tmp = mysqli_fetch_array($get_users, 1)) {
            //     echo '
            //         <a href="?user&' . $user_tmp['NICK_NAME'] . '">
            //             ' . $user_tmp['FULL_NAME'] . '
            //         </a>
            //     ';
            // }
            ?>
        </div>
    </div>

</div>

<script>
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

<script>
    const Handle_OnDel = (e, id) => {
        if (confirm(`Xác nhận xóa dữ liệu ${id}`) == false)
            e.preventDefault();
    }
</script>