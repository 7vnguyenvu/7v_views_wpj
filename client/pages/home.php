<?php
include_once "./configs/dbconfig.php";

$str = "select news._ID as N_ID, news.*, topics.* from news, topics where news.TOPIC_ID = topics._ID order by N_ID desc";
$get_news_and_topics = mysqli_query($connection, $str);
$get_topics = mysqli_query($connection, "select * from topics");
?>

<div class="home">
    <div class="home__content">


    </div>

    <div class="home__action">
        <h2>Danh sách chủ đề</h2>

        <div class="home__action-select">
            <?php
            while ($topic = mysqli_fetch_array($get_topics, 1)) {
                echo '
                    <a href="?news&topic=' . $topic['_ID'] . '">
                        ' . $topic['TOPIC_NAME'] . '
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