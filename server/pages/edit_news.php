<?php
include_once "./configs/dbconfig.php";

$news_id = $_GET['id'];
$get_topics = mysqli_query($connection, "select * from topics");

$got_news = mysqli_fetch_array(mysqli_query($connection, "select * from news where _ID =  $news_id"), 1);

$get_name_topic_of_news = mysqli_query($connection, 'select * from topics where _ID = ' . $got_news['TOPIC_ID'] . '');
$news_topicName = mysqli_fetch_array($get_name_topic_of_news, 1);

?>

<form class="add-form" action="./controling/handle_edit.php" method="post" enctype="multipart/form-data">
    <div class="row_title">
        <p>#> Cập nhật nội dung tin</p>
    </div>

    <div class="cluster visible">
        <div class="row cluster__row">
            <label style="--width: 20%" for="_id">_id</label>
            <input type="text" id="_id" name="_id" value="<?php echo $got_news['_ID'] ?>" placeholder="* -- Mã tin mới | -- Trường này đã được thêm tự động" />
        </div>
        <div class="row cluster__row">
            <label style="--width: 20%" for="typical_image">Ảnh tiêu biểu</label>
            <input type="file" id="typical_image" value="<?php echo $got_news['TYPICAL_IMAGE'] ?>" name="typical_image" accept="image/png, image/gif, image/jpeg" />
        </div>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 20%" for="topic_id">Chủ đề</label>

            <select id="topic_id" name="topic_id">
                <?php
                echo '<option value="' . $news_topicName['_ID'] . '">' . $news_topicName['TOPIC_NAME'] . '</option>'; ?>
                <?php
                while ($topic = mysqli_fetch_array($get_topics, 1)) {
                    echo '<option value="' . $topic['_ID'] . '">' . $topic['TOPIC_NAME'] . '</option>';
                } ?>

            </select>

        </div>
        <div class="row cluster__row">
            <label style="--width: 20%" for="note_image">Chú thích ảnh</label>
            <input required type="text" id="note_image" value="<?php echo $got_news['NOTE_IMAGE'] ?>" name="note_image" placeholder="* -- Chú thích ảnh.." />
        </div>
    </div>

    <div class="row">
        <label style="--width: 10%" for="title">Tiêu đề</label>
        <input required type="text" id="title" value="<?php echo $got_news['TITLE'] ?>" name="title" placeholder="* -- Tiêu đề.." />
    </div>
    <div class="row">
        <label style="--width: 10%" for="sapo">Mở đầu</label>

        <textarea required name="sapo" id="sapo" rows="2" placeholder="* -- Mở đầu.."><?php echo $got_news['SAPO'] ?></textarea>
    </div>
    <div class="row">
        <label style="--width: 10%" for="content">Nội dung chính</label>
        <textarea required name="content" id="content" placeholder="* -- Nội dung chính.."><?php echo $got_news['CONTENT'] ?></textarea>
    </div>


    <input type="hidden" id="user_id" name="user_id" value="<?php echo $user->_id ?>" />
    <input type="hidden" id="created_at" name="created_at" value="<?php echo $got_news['CREATED_AT'] ?>" />

    <br />

    <div class="row">
        <button type="submit" name="<?php echo $page ?>" style="--bgc: #c10061; --clr: #ffffff; --hover: #0000a8">Lưu lại</button>
        <!-- <button type="reset" value="Trở lại" style="--color: #d70000; --hover: #ff0000">Đặt lại</button> -->
    </div>
</form>
<script>
    CKEDITOR.replace('content');
</script>