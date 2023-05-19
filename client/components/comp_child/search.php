<div class="search">
    <input id="search_input" type="text" class="search__input" placeholder="Search..." />
    <div class="search__bulkhead"></div>
    <i class="fa-solid fa-magnifying-glass search__find-icon"></i>

    <?php
    echo isset($_GET['search']) ?
        '<div id="search__result">
            <div class="cluster">
                <p class="title">Tin tức</p>
                <div id="news_result" class="result"></div>
            </div>
            <div class="cluster">
                <p class="title">Bài viết</p>
                <div id="blogs_result" class="result"></div>
            </div>
            <div class="cluster">
                <p class="title">Người dùng</p>
                <div id="users_result" class="result"></div>
            </div>
        </div>
        
        <script>
            document.getElementById("search_input").onfocus = () => {
                document.getElementById("search__result").style.display = "block";
            }
            document.getElementById("search__result").onmouseleave = () => {
                setTimeout(() => {
                    document.getElementById("search__result").style.display = "none";
                    document.getElementById("search_input").blur();
                }, 200)
            }
        </script>
        ' : '';
    ?>
</div>

<?php

if (isset($_GET['search'])) {

    echo '
        <script>
            var input_tag = document.getElementById("search_input");
            input_tag.value = "' . $_GET['search'] . '";
            input_tag.focus();
        </script>
    ';

    foreach ($news_list as $news) {
        if (str_contains(strtolower($news['title']), strtolower($_GET['search']))) {
            echo '
                <script>
                    var item = document.createElement("a");
                    item.href = "?detail&page=news&id=' . $news['_id'] . '"
                    item.innerHTML = "<i class=\"fa-solid fa-magnifying-glass\"></i> ' . $news['title'] . '";

                    document.getElementById("news_result").append(item)
                </script>
            ';
        }
    }

    foreach ($blogs_list as $blogs) {
        if (str_contains(strtolower($blogs['title']), strtolower($_GET['search']))) {
            echo '
                <script>
                    var item = document.createElement("a");
                    item.href = "?detail&page=blog&id=' . $blogs['_id'] . '"
                    item.innerHTML = "<i class=\"fa-regular fa-newspaper\"></i> ' . $blogs['title'] . '";

                    document.getElementById("blogs_result").append(item)
                </script>
            ';
        }
    }

    foreach ($users_list as $users) {
        if (str_contains(strtolower($users['full_name']), strtolower($_GET['search']))) {
            echo '
                <script>
                    var item = document.createElement("a");
                    item.href = "?detail&page=profile&user=' . $users['nick_name'] . '"
                    item.innerHTML = "<i class=\"fa-regular fa-user\"></i> ' . $users['full_name'] . '";

                    document.getElementById("users_result").append(item)
                </script>
            ';
        }
    }
}

?>
<script>
    var input_tag = document.getElementById("search_input");
    var btn_search = document.querySelector(".search__find-icon");

    btn_search.onclick = () => {
        if (input_tag.value.trim() != "")
            location.href = "?page=<?php echo $page ?>&search=" + input_tag.value;
    }
</script>