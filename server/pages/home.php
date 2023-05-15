<?php
include_once "./configs/dbconfig.php";

$str = "select news._ID as N_ID, news.*, topics.* from news, topics where news.TOPIC_ID = topics._ID order by N_ID desc";
$get_news_and_topics = mysqli_query($connection, $str);
$get_topics = mysqli_query($connection, "select * from topics");
?>

<div class="home">
    <div class="home__table">
        <!-- Tab links -->
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'News')" id="defaultOpen">
                <h3>Danh sách tin</h3>
            </button>
            <button class="tablinks" onclick="openCity(event, 'Topics')">
                <h3>Danh sách chủ đề</h3>
            </button>
        </div>
        <!-- Tab content -->
        <div id="News" class="tabcontent">
            <table id="customers">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th width="120px">Chủ đề</th>
                        <th width="200px">Ngày đăng</th>
                        <th width="100px" colspan='2'>Tùy chỉnh</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    while ($news_i = mysqli_fetch_array($get_news_and_topics)) {

                        echo '<tr>
                                <td>' . $news_i['N_ID'] . '</td>
                                <td>' . $news_i['TITLE'] . '</td>
                                <td>' . $news_i['TOPIC_NAME'] . '</td>
                                <td>' . $news_i['CREATED_AT'] . '</td>
                                <td><a href="?page=edit_news&id=' . $news_i['N_ID'] . '">sửa</a></td>
                                <td><a href="./controling/handle_delete.php?del_news&id=' . $news_i['N_ID'] . '" onclick="Handle_OnDel(event, ' . $news_i['N_ID'] . ')">xóa</a></td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="Topics" class="tabcontent">
            <table id="customers">
                <tr>
                    <th>#</th>
                    <th>Tên chủ đề</th>
                    <th colspan='2'>Tùy chỉnh</th>
                </tr>
                <?php
                while ($topic = mysqli_fetch_array($get_topics, 1)) {
                    echo '
                        <tr>
                            <td>' . $topic['_ID'] . '</td>
                            <td>' . $topic['TOPIC_NAME'] . '</td>
                            <td width="50px"><a href="?page=edit_topic&id=' . $topic['_ID'] . '">sửa</a></td>
                            <td width="50px"><a href="./controling/handle_delete.php?del_topic&id=' . $topic['_ID'] . '" onclick="Handle_OnDel(event, ' . $topic['_ID'] . ')">xóa</a></td>
                        </tr>
                    ';
                }
                ?>
            </table>
            <button class="add-user-btn"></button>
        </div>

    </div>

    <div class="home__action">
        <h2>Công cụ</h2>

        <div class="home__action-select">
            <a href="?page=add_news">
                #> Đăng tin
            </a>
            <a href="?page=add_topic">
                #> Thêm chủ đề
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
</script>