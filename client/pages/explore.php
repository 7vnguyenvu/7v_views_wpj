<div class="explore_container">

    <h1>Người dùng bạn có thể biết</h1>

    <div class="explore__users-area">
        <?php
        foreach ($users_list as $us) {
            echo '
                <div class="explore_user">
                    <div class="user__left">
                        <a href="?detail&page=profile&user=' . $us['nick_name'] . '" class="image">
                            <img src="' . $us['avatar'] . '" alt="avatar">
                        </a>
                        <button>Follow</button>
                    </div>

                    <div class="user__right">
                        <a href="?detail&page=profile&user=' . $us['nick_name'] . '" class="info">
                            <p class="name">' . $us['last_name'] . '</p>
                            <p class="page">' . $us['nick_name'] . '</p>
                        </a>
                        <div class="about">
                            <a href="?page=blog&user=' . $us['_id'] . '" class="blogs">Xem bài viết</a>
                        </div>
                    </div>
                </div>
            ';
        }
        ?>
    </div>
</div>