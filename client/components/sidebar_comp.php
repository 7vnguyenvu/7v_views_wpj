<div class="sidebar">
    <nav class="navlink">
        <a href="./" class="
        <?php if ($page == 'home') {
            echo "active";
        } else {
            echo "";
        } ?>">
            <i class="fa-solid fa-house"></i>
            <p>Trang tin</p>
        </a>

        <a href="?page=blog" class="
        <?php if ($page == 'blog') {
            echo "active";
        } else {
            echo "";
        } ?>">
            <i class="fa-solid fa-newspaper"></i>
            <p>Blogs</p>
        </a>

        <a href="?page=explore" class="
        <?php if ($page == 'explore') {
            echo "active";
        } else {
            echo "";
        } ?>">
            <i class="fa-solid fa-compass"></i>
            <p>Khám phá</p>
        </a>
    </nav>

    <?php
    if ($account != null) {
        echo '
        <form class="sign-out" action="./controling/signout.php" method="post" onsubmit="Handle_OnSubmit(event)">
            <nav class="navlink">
                <button type="submit">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <p>Đăng xuất</p>
                </button>
            </nav>
        </form>
        
    <script>
        const Handle_OnSubmit = (e) => {
            if (confirm("Xác nhận đăng xuất") == false)
                e.preventDefault();
        }
    </script>';
    }
    ?>


</div>