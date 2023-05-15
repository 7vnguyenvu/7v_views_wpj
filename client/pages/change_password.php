<?php
include_once "./configs/dbconfig.php";

$got_account = mysqli_fetch_array(mysqli_query($connection, "select * from accounts where _ID =  " . $_GET['id'] . ""), 1);
?>

<form class="add-form" action="./controling/handle_edit.php" method="post" enctype="multipart/form-data" onsubmit="Handle_ChangePass(event)">
    <div class="row_title">
        <p>#> Đổi mật khẩu</p>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 30%" for="username">Tên đăng nhập</label>
            <input disabled type="text" id="username" placeholder="Tên đăng nhập" value="<?php echo $got_account['USER_NAME'] ?>" />
        </div>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 30%" for="old-password">Mật khẩu cũ</label>
            <input required type="text" id="old-password" name="old-password" placeholder="Mật khẩu cũ" />
        </div>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 30%" for="new-password">Mật khẩu mới</label>
            <input required type="text" id="new-password" name="new-password" placeholder="Mật khẩu mới" />
        </div>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 30%" for="re-password">Nhập lại mật khẩu mới</label>
            <input required type="text" id="re-password" name="re-password" placeholder="Nhập lại mật khẩu" />
        </div>
    </div>

    <input type="hidden" name="_id" value="<?php echo $got_account['_ID'] ?>" />
    <input type="hidden" name="username" value="<?php echo $got_account['USER_NAME'] ?>" />

    <br />

    <div class="row">
        <button type="submit" name="<?php echo $page ?>" style="--bgc: #c10061; --clr: #ffffff; --hover: #0000a8">Lưu thay đổi</button>
    </div>
</form>

<script>
    var newpass = document.getElementById('new-password');
    var repass = document.getElementById('re-password');

    const Handle_ChangePass = (e) => {

        if (repass.value.trim() != newpass.value.trim()) {
            alert('Mật khẩu xác nhận không đúng!');
            repass.focus();
            e.preventDefault();
        }
    }
</script>