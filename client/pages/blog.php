<?php
include_once "./configs/dbconfig.php";

$get_blogs = mysqli_query($connection, "select * from blogs order by _ID desc");
$get_users = mysqli_query($connection, "select * from users, accounts where users.ACCOUNTS_ID = accounts._ID");
$get_accounts = mysqli_query($connection, "select * from accounts where USER_LOCK = 0");
$get_accounts_locked = mysqli_query($connection, "select * from accounts where USER_LOCK = 1");
?>

<div class="home">
    <div class="home__content">


    </div>

    <div class="home__action">
        <h2>Người dùng nổi bật</h2>

        <div class="home__action-select">
            <?php
            while ($user_tmp = mysqli_fetch_array($get_users, 1)) {
                echo '
                    <a href="?user&' . $user_tmp['NICK_NAME'] . '">
                        ' . $user_tmp['FULL_NAME'] . '
                    </a>
                ';
            }
            ?>
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
</script>