<?php
include_once "./configs/dbconfig.php";
$get_topics = mysqli_query($connection, "select * from topics");
?>
<form class="add-form" action="./controling/handle_add.php" method="post" enctype="multipart/form-data">
    <div class="row_title">
        <p>#> Đăng tin mới</p>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 20%" for="_id">_id</label>
            <input disabled type="text" id="_id" name="_id" placeholder="* -- Mã tin mới | -- Trường này đã được thêm tự động" />
        </div>
        <div class="row cluster__row">
            <label style="--width: 20%" for="typical_image">Ảnh tiêu biểu</label>
            <input required type="file" id="typical_image" name="typical_image" accept="image/png, image/gif, image/jpeg" />
        </div>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 20%" for="topic_id">Chủ đề</label>

            <select id="topic_id" name="topic_id">
                <?php while ($topic = mysqli_fetch_array($get_topics, 1)) {
                    echo '<option value="' . $topic['_ID'] . '">' . $topic['TOPIC_NAME'] . '</option>';
                } ?>

            </select>

        </div>
        <div class="row cluster__row">
            <label style="--width: 20%" for="note_image">Chú thích ảnh</label>
            <input required type="text" id="note_image" name="note_image" placeholder="* -- Chú thích ảnh.." />
        </div>
    </div>

    <div class="row">
        <label style="--width: 10%" for="title">Tiêu đề</label>
        <input required type="text" id="title" name="title" placeholder="* -- Tiêu đề.." />
    </div>
    <div class="row">
        <label style="--width: 10%" for="sapo">Mở đầu</label>

        <textarea required name="sapo" id="sapo" rows="2" placeholder="* -- Mở đầu.."></textarea>
    </div>
    <div class="row">
        <label style="--width: 10%" for="content">Nội dung chính</label>
        <textarea required name="content" id="content" placeholder="* -- Nội dung chính.."></textarea>
    </div>


    <input type="hidden" id="user_id" name="user_id" value="<?php echo $user['_ID'] ?>" />

    <br />

    <div class="row">
        <button type="submit" name="<?php echo $page ?>" style="--bgc: #c10061; --clr: #ffffff; --hover: #0000a8">Đăng tin</button>
        <!-- <button type="reset" value="Trở lại" style="--color: #d70000; --hover: #ff0000">Đặt lại</button> -->
    </div>
</form>
<script>
    CKEDITOR.replace('content', {
        extraPlugins: 'editorplaceholder',
        editorplaceholder: 'Viết nội dung ở đây...'
    });
</script>