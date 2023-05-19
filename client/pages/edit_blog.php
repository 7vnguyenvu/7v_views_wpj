<?php

$got_blog = null;
foreach ($blogs_list as $blog) {
    if ($blog['_id'] == $_GET['id']) {
        $got_blog = $blog;
    }
}

?>
<form class="add-form" action="<?php echo $server_path ?>controling/handle_edit.php" method="post" enctype="multipart/form-data">
    <div class="row_title">
        <p>#> Chỉnh sửa bài viết</p>
        <a href="<?php echo $server_path ?>controling/handle_delete.php?del_blog&formclient&id=<?php echo $_GET['id'] ?>&user_id=<?php echo $_GET['user'] ?>" onclick="Handle_OnDel(event, <?php echo $_GET['id'] ?>)" class="delete_blog">Xóa bỏ<i class="fa-solid fa-trash-can"></i></a>
    </div>

    <div class="row">
        <label for="typical_image" id="blog__tyimg-label">
            <img style="width: 101%; height: 101%; object-fit: contain;" src="<?php echo trim($got_blog['typical_image']) != '' ? $got_blog['typical_image'] : $server_path . 'images/no-image.png' ?>" alt="">
        </label>
        <input type="file" id="typical_image" class="blog__tyimg-input" name="typical_image" accept="image/png, image/gif, image/jpeg" />
    </div>
    <div class="typical_image-action">
        <label id="reset_img">Đặt lại</label>
        <label id="del_img">Xóa</label>
    </div>
    <div class="row">
        <input type="text" class="blog__title-input" name="title" placeholder="Tiêu đề" value="<?php echo $got_blog['title'] ?>" />
    </div>

    <div class="row">
        <textarea required name="content" id="content"><?php echo $got_blog['content'] ?></textarea>
    </div>

    <input type="hidden" name="_id" value="<?php echo $got_blog['_id'] ?>" />
    <input type="hidden" name="user_id" value="<?php echo $got_blog['user_id'] ?>" />
    <input type="hidden" id="created_at" name="created_at" value="<?php echo $got_blog['created_at'] ?>" />
    <input type="hidden" name="formclient" />

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
        img_review.src = "<?php echo $server_path ?>images/no-image.png";

        btn_resetIMG.style.display = "block";
        btn_resetIMG.onclick = () => {
            img_review.src = src_tmp;
            btn_resetIMG.style.display = "none";
        }
    }

    const Handle_OnDel = (e, id) => {
        if (confirm(`Xác nhận xóa dữ liệu ${id}`) == false)
            e.preventDefault();
    }
</script>