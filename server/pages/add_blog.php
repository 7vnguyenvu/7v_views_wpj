<?php
include_once "./configs/dbconfig.php";
$get_topics = mysqli_query($connection, "select * from topics");
?>
<form class="add-form" action="./controling/handle_add.php" method="post" enctype="multipart/form-data">
    <div class="row_title">
        <p>#> Bài viết mới</p>
    </div>


    <div class="row">
        <label for="typical_image" id="blog__tyimg-label">
            <p>THÊM HÌNH ẢNH TIÊU BIỂU<i class="fa-solid fa-plus"></i></p>
        </label>
        <input type="file" id="typical_image" class="blog__tyimg-input" name="typical_image" accept="image/png, image/gif, image/jpeg" />
    </div>
    <div class="typical_image-action">
        <label id="reset_img">Đặt lại</label>
    </div>
    <div class="row">
        <input type="text" class="blog__title-input" name="title" placeholder="Tiêu đề" />
    </div>

    <div class="row">
        <textarea required name="content" id="content"></textarea>
    </div>

    <input type="hidden" name="user_id" value="<?php echo $user['_ID']; ?>" />

    <br />

    <div class="row">
        <button type="submit" name="<?php echo $page ?>" style="--bgc: #c10061; --clr: #ffffff; --hover: #0000a8">Đăng bài</button>
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
    var img_review = document.getElementById('blog__tyimg-label');

    img_input.onchange = () => {

        var img_tmp = document.createElement('img');
        img_tmp.style = "width: 100%; height: 100%; object-fit: contain;";
        img_tmp.src = URL.createObjectURL(img_input.files[0]);

        img_review.innerHTML = "";
        img_review.style.backgroundColor = "#e7e7e7";
        img_review.appendChild(img_tmp);

        var btn_clearIMG = document.getElementById('reset_img');
        btn_clearIMG.style.display = "block";
        btn_clearIMG.onclick = () => {
            URL.revokeObjectURL(img_tmp.src);
            img_input.value = "";
            img_review.innerHTML = '<p>THÊM HÌNH ẢNH TIÊU BIỂU<i class="fa-solid fa-plus"></i></p>';
            img_review.style.backgroundColor = "var(--primary-color)";
            btn_clearIMG.style.display = "none";
        }

    }
</script>