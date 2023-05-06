<form class="add-form" action="./controling/handle_add.php" method="post" enctype="multipart/form-data">
    <div class="row_title">
        <p>#> Thêm mới chủ đề</p>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 20%" for="_id">_id</label>
            <input disabled type="text" id="_id" name="_id" placeholder="* -- Mã chủ đề mới | -- Trường này đã được thêm tự động" />
        </div>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 20%" for="topic_name">Chủ đề</label>
            <input required type="text" id="topic_name" name="topic_name" placeholder="* -- Tên chủ đề.." />
        </div>
    </div>

    <br />

    <div class="row">
        <button type="submit" name="<?php echo $page ?>" style="--bgc: #c10061; --clr: #ffffff; --hover: #0000a8">Lưu lại</button>
    </div>
</form>