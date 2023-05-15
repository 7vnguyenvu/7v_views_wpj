<?php
include_once "./configs/dbconfig.php";

$topic_id = $_GET['id'];
$got_topic = mysqli_fetch_array(mysqli_query($connection, "select * from topics where _ID =  $topic_id"), 1);
?>

<form class="add-form" action="./controling/handle_edit.php" method="post" enctype="multipart/form-data">
    <div class="row_title">
        <p>#> Chỉnh sửa chủ đề</p>
    </div>

    <div class="cluster visible">
        <div class="row cluster__row">
            <label style="--width: 20%" for="_id">_id</label>
            <input type="text" id="_id" name="_id" value="<?php echo $got_topic['_ID'] ?>" />
        </div>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 20%" for="topic_name">Chủ đề</label>
            <input required type="text" id="topic_name" name="topic_name" value="<?php echo $got_topic['TOPIC_NAME'] ?>" />
        </div>
    </div>

    <br />

    <div class="row">
        <button type="submit" name="<?php echo $page ?>" style="--bgc: #c10061; --clr: #ffffff; --hover: #0000a8">Lưu lại</button>
    </div>
</form>