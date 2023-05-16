<?php
include_once "./configs/dbconfig.php";

$get_blogs = mysqli_query($connection, "select * from blogs order by _ID desc");
$get_users = mysqli_query($connection, "select * from users, accounts where users.ACCOUNTS_ID = accounts._ID");
$get_accounts = mysqli_query($connection, "select * from accounts where USER_LOCK = 0");
$get_accounts_locked = mysqli_query($connection, "select * from accounts where USER_LOCK = 1");
?>

<div class="home">
    <div class="home__table">
        <!-- Tab links -->
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Blogs')" id="defaultOpen">
                <h3>Danh sách bài viết</h3>
            </button>
            <button class="tablinks" onclick="openCity(event, 'Users')">
                <h3>Danh sách người dùng</h3>
            </button>
            <button class="tablinks" onclick="openCity(event, 'Accounts')">
                <h3>Tài Khoản</h3>
            </button>
            <button class="tablinks" onclick="openCity(event, 'Accounts_Locked')">
                <h3>Tài Khoản đã khóa</h3>
            </button>
        </div>
        <!-- Tab content -->
        <div id="Blogs" class="tabcontent">
            <table id="customers">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th width="150px">Tác giả</th>
                        <th width="180px">Ngày cập nhật</th>
                        <th colspan='2' style="text-align: center;">Tùy chỉnh</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    while ($blog = mysqli_fetch_array($get_blogs)) {

                        $get_user_name_from_userID = mysqli_fetch_array(mysqli_query($connection, "select * from users where _ID = '" . $blog['USER_ID'] . "'"))['NICK_NAME'];

                        echo '<tr>
                                <td>' . $blog['_ID'] . '</td>
                                <td>' . $blog['TITLE'] . '</td>
                                <td>' . $get_user_name_from_userID . '</td>
                                <td>' . $blog['UPDATED_AT'] . '</td>
                                <td width="50px" style="text-align: center;"><a href="?page=edit_blog&id=' . $blog['_ID'] . '">sửa</a></td>
                                <td width="50px" style="text-align: center;"><a href="./controling/handle_delete.php?del_blog&id=' . $blog['_ID'] . '" onclick="Handle_OnDel(event, ' . $blog['_ID'] . ')">xóa</a></td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="Users" class="tabcontent">
            <table id="customers">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tài khoản</th>
                        <th>Tên người dùng</th>
                        <th>Trang cá nhân</th>
                        <th>Lượt theo dõi</th>
                        <th>Người theo dõi</th>
                </thead>
                <tbody>
                    <?php
                    while ($user = mysqli_fetch_array($get_users, 1)) {
                        echo '
                            <tr>
                                <td>' . $user['_ID'] . '</td>
                                <td width="150px">' . $user['USER_NAME'] . '</td>
                                <td width="300px">' . $user['FULL_NAME'] . '</td>
                                <td><a href="?' . $user['NICK_NAME'] . '">' . $user['NICK_NAME'] . '</a></td>
                                <td>' . $user['FOLLOWING'] . '</td>
                                <td>' . $user['FOLLOWER'] . '</td>
                            </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="Accounts" class="tabcontent">
            <table id="customers">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                        <th>Cấp độ</th>
                        <th>Trạng thái khóa</th>
                        <th colspan='2' style="text-align: center;">Tùy chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($accounts = mysqli_fetch_array($get_accounts, 1)) {

                        echo '
                            <tr>
                                <td>' . $accounts['_ID'] . '</td>
                                <td >' . $accounts['USER_NAME'] . '</td>
                                <td >' . $accounts['USER_PASS'] . '</td>
                                <td>' . $accounts['USER_LEVEL'] . '</td>
                                <td>Bình thường</td>
                                <td width="120px" style="text-align: center;"><a href="?page=change_password&id=' . $accounts['_ID'] . '">Đổi mật khẩu</a></td>
                                <td width="50px" style="text-align: center;"><a href="./controling/handle_delete.php?del_account&id=' . $accounts['_ID'] . '" onclick="Handle_OnDel(event, ' . $accounts['_ID'] . ')">xóa</a></td>
                            </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="Accounts_Locked" class="tabcontent">
            <table id="customers">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                        <th>Cấp độ</th>
                        <th>Trạng thái khóa</th>
                        <th colspan='2' style="text-align: center;">Tùy chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($accounts = mysqli_fetch_array($get_accounts_locked, 1)) {
                        echo '
                            <tr>
                                <td>' . $accounts['_ID'] . '</td>
                                <td >' . $accounts['USER_NAME'] . '</td>
                                <td >' . $accounts['USER_PASS'] . '</td>
                                <td>' . $accounts['USER_LEVEL'] . '</td>
                                <td>Đã bị khóa</td>
                                <td width="120px" style="text-align: center;"><a href="./controling/handle_delete.php?unlock&id=' . $accounts['_ID'] . '" onclick="Handle_Unlock(event, ' . $accounts['_ID'] . ')">Mở khóa</a></td>
                                <td width="50px" style="text-align: center;"><a href="./controling/handle_delete.php?des_account&id=' . $accounts['_ID'] . '" onclick="Handle_OnDel(event, ' . $accounts['_ID'] . ')">xóa</a></td>
                            </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="home__action">
        <h2>Công cụ</h2>

        <div class="home__action-select">
            <a href="?page=add_blog">
                #> Viết blog
            </a>
            <a href="?page=add_account">
                #> Thêm tài khoản và người dùng
            </a>
        </div>
    </div>

</div>

<script>
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

<script>
    const Handle_OnDel = (e, id) => {
        if (confirm(`Xác nhận xóa dữ liệu ${id}`) == false)
            e.preventDefault();
    }


    const Handle_Unlock = (e, id) => {
        if (confirm(`Xác nhận mở khóa tài khoản ${id}`) == false)
            e.preventDefault();
    }
</script>