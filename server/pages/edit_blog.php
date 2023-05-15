<?php
include_once "./configs/dbconfig.php";
$get_topics = mysqli_query($connection, "select * from topics");


$got_blog = mysqli_fetch_array(mysqli_query($connection, "select * from blogs where _ID =  " . $_GET['id'] . ""), 1);
?>
<form class="add-form" action="./controling/handle_edit.php" method="post" enctype="multipart/form-data">
    <div class="row_title">
        <p>#> Chỉnh sửa bài viết</p>
    </div>

    <div class="row">
        <label for="typical_image" id="blog__tyimg-label">
            <img style="width: 101%; height: 101%; object-fit: contain;" src="<?php echo $got_blog['TYPICAL_IMAGE'] ?>" alt="">
        </label>
        <input type="file" id="typical_image" class="blog__tyimg-input" name="typical_image" accept="image/png, image/gif, image/jpeg" />
    </div>
    <div class="typical_image-action">
        <label id="reset_img">Đặt lại</label>
        <label id="del_img">Xóa</label>
    </div>
    <div class="row">
        <input type="text" class="blog__title-input" name="title" placeholder="Tiêu đề" value="<?php echo $got_blog['TITLE'] ?>" />
    </div>

    <div class="row">
        <textarea required name="content" id="content"><?php echo $got_blog['CONTENT'] ?></textarea>
    </div>

    <input type="hidden" name="_id" value="<?php echo $got_blog['_ID'] ?>" />
    <input type="hidden" name="user_id" value="<?php echo $got_blog['USER_ID'] ?>" />
    <input type="hidden" id="created_at" name="created_at" value="<?php echo $got_blog['CREATED_AT'] ?>" />

    <br />

    <div class="row">
        <button type="submit" name="<?php echo $page ?>" style="--bgc: #c10061; --clr: #ffffff; --hover: #0000a8">Lưu lại</button>
        <!-- <button type="reset" value="Trở lại" style="--color: #d70000; --hover: #ff0000">Đặt lại</button> -->
    </div>
</form>
<script>
    var editor = CKEDITOR.replace('content', {
        extraPlugins: 'editorplaceholder',
        editorplaceholder: 'Viết nội dung ở đây...'
    });

    editor.on('required', function(evt) {
        editor.showNotification('This field is required.', 'warning');
        evt.cancel();
    });


    var img_input = document.getElementById('typical_image');
    var img_review = document.querySelector('#blog__tyimg-label img');
    var btn_resetIMG = document.getElementById('reset_img');
    var btn_deleteIMG = document.getElementById('del_img');

    var src_tmp = img_review.src;

    img_input.onchange = () => {
        img_review.src = URL.createObjectURL(img_input.files[0]);

        btn_resetIMG.style.display = "block";
        btn_resetIMG.onclick = () => {
            URL.revokeObjectURL(img_review.src);
            img_review.src = src_tmp;
            btn_resetIMG.style.display = "none";
        }
    }

    btn_deleteIMG.onclick = () => {
        img_review.src = "./images/no-image.png";

        btn_resetIMG.style.display = "block";
        btn_resetIMG.onclick = () => {
            img_review.src = src_tmp;
            btn_resetIMG.style.display = "none";
        }
    }
</script>