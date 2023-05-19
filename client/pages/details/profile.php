<?php


$user_profile = null;
foreach ($users_list as $obj) {
    if ($_GET['user'] == $obj['nick_name']) {
        $user_profile = $obj;
        break;
    }
}
?>

<div class="profile-container">
    <a onclick="history.back()" class="detail__back">&lt;# Trở lại</a>
    <div class="profile__header">
        <div class="cover-img" style="background: url('<?php echo $user_profile['cover_img'] ?>') no-repeat center / 100% 100%;">
            <div class="custom-link">
                <?php
                echo $user_profile['face_url'] != "" ? "
                <a href=\"" . $user_profile['face_url'] . "\" style=\"background-image: url('./images/logos_social/logo_fb.png'); --i-color: #0011df\" target='_blank'></a>
                " : "";

                echo $user_profile['tiktok_url'] != "" ? "
                <a href=\"" . $user_profile['tiktok_url'] . "\" style=\"background-image: url('./images/logos_social/logo_tik.png'); --i-color: #ce009b\" target='_blank'></a>
                " : "";

                echo $user_profile['youtube_url'] != "" ? "
                <a href=\"" . $user_profile['youtube_url'] . "\" style=\"background-image: url('./images/logos_social/logo_yt_2.png'); --i-color: #d20005\" target='_blank'></a>
                " : "";

                echo $user_profile['instagram_url'] != "" ? "
                <a href=\"" . $user_profile['instagram_url'] . "\" style=\"background-image: url('./images/logos_social/logo_is.png'); --i-color: #eec917\" target='_blank'></a>
                " : "";
                ?>
            </div>
        </div>
        <div class="custom-avatar">
            <div class="avatar">
                <img src="<?php echo $user_profile['avatar'] ?>" alt="">
            </div>
            <div class="name"><?php echo $user_profile['full_name'] ?></div>
        </div>
    </div>

    <div class="profile__body">
        <div class="my-activity"></div>
        <div class="my-blogs"></div>
    </div>

</div>