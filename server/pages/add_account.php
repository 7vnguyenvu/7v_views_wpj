<form class="add-form" action="./controling/handle_add.php" method="post" enctype="multipart/form-data" onsubmit="Handle_AddAccount(event)">
    <div class="row_title">
        <p>#> Thêm tài khoản và người dùng</p>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 30%" for="name_of_user">Tên người dùng</label>
            <input required type="text" id="name_of_user" name="name_of_user" placeholder="Tên người dùng" />
        </div>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 30%" for="username">Tên đăng nhập</label>
            <input required type="text" id="username" name="username" placeholder="Tên đăng nhập" />
        </div>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 30%" for="password">Mật khẩu</label>
            <input required type="text" id="password" name="password" placeholder="Mật khẩu" />
        </div>
    </div>

    <div class="cluster">
        <div class="row cluster__row">
            <label style="--width: 30%" for="re-password">Nhập lại mật khẩu</label>
            <input required type="text" id="re-password" name="re-password" placeholder="Nhập lại mật khẩu" />
        </div>
    </div>

    <br />

    <div class="row">
        <button type="submit" name="<?php echo $page ?>" style="--bgc: #c10061; --clr: #ffffff; --hover: #0000a8">Thêm mới</button>
    </div>
</form>

<script>
    var pass = document.getElementById('password');
    var repass = document.getElementById('re-password');

    const Handle_AddAccount = (e) => {

        if (repass.value.trim() != pass.value.trim()) {
            alert('Mật khẩu xác nhận không đúng!');
            repass.focus();
            e.preventDefault();
        }
    }
</script>