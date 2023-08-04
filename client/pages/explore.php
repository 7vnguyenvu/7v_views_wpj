<?php
$handle_follow = "http://localhost/7v_views_wpj/server/controling/handle_follow.php";
?>
<div class="explore_container">

    <h1>Người dùng bạn có thể biết</h1>

    <div class="explore__users-area">
        <?php
        foreach (array_reverse($users_list) as $us) {

            if ($account != null && $us['_id'] == $user->_id) {
                continue;
            }

            echo '
                <div class="explore_user">
                    <div class="user__left">
                        <a href="?detail&page=profile&user=' . $us['nick_name'] . '" class="image">
                            <img src="' . $us['avatar'] . '" alt="avatar">
                        </a> ';

            if ($account != null) {
                $follow_active = false;
                foreach ($follows_list as $follow) {
                    if ($follow['user_ref_id'] == $us['_id'] && $follow['user_id'] == $user->_id) {
                        $follow_active = true;
                        break;
                    }
                }
                $text_flw = $follow_active ? "Đang theo dõi" : "Theo dõi";
                $active_flw_class = $follow_active ? "active" : "";

                echo '
                    <form action="' . $handle_follow . '" method="post">
                        <input type="hidden" name="user_red_id" value="' . $us['_id'] . '">
                        <input type="hidden" name="user_id" value="' . $user->_id . '">
                        <button type="submit" class="' . $active_flw_class . '">' . $text_flw . '</button>
                    </form>
                    ';
            } else {
                echo '<button>Follow</button>';
            }

            $count_flw = json_decode(file_get_contents("http://localhost/7v_views_wpj/server/call_api_server/count.php?flw&id=" . $us['_id'] . ""));


            echo '</div>

                    <div class="user__right">
                        <a href="?detail&page=profile&user=' . $us['nick_name'] . '" class="info">
                            <p class="name">' . $us['last_name'] . '</p>
                            <p class="page">' . $us['nick_name'] . '</p>
                        </a>
                        <div class="about">
                            <p><i class="fa-solid fa-eye"></i> ' . $count_flw . '</p>
                        </div>
                    </div>
                </div>
            ';
        }
        ?>
    </div>
</div>