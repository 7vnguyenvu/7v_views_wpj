<?php
include "./call_api/news.php";
include "./call_api/topics.php";
?>

<div class="home">
    <div class="home__content">
        <h1>Tin mới nhất</h1>
        <hr />
        <div class="home__content-hot">
            <?php
            $topic_tmp = 'Xã hội';
            foreach ($topics_list as $topic) {
                if ($topic['_id'] == $news_list[0]['topic_id']) {
                    $topic_tmp = $topic['topic_name'];
                    break;
                }
            }
            ?>
            <div class="hotitem">
                <div class="text">
                    <a href="?detail&page=news&id=<?php echo $news_list[0]['_id'] ?>" class="title"><?php echo $news_list[0]['title'] ?></a>
                    <p class="sapo"><?php echo $news_list[0]['sapo'] ?></p>
                    <p class="other"><?php echo $topic_tmp ?> | <?php echo $news_list[0]['created_at'] ?></p>
                </div>
                <a href="?detail&page=news&id=<?php echo $news_list[0]['_id'] ?>" class="image">
                    <img src="<?php echo $news_list[0]['typical_image'] ?>" alt="">
                </a>
            </div>
        </div>
        <div class="home__content-items">

            <?php
            for ($i = 1; $i < count($news_list); $i++) {

                $topic_tmp = 'Xã hội';
                foreach ($topics_list as $topic) {
                    if ($topic['_id'] == $news_list[$i]['topic_id']) {
                        $topic_tmp = $topic['topic_name'];
                        break;
                    }
                }

                echo '
                    <div class="item">
                        <a href="?detail&page=news&id=' . $news_list[$i]['_id'] . ' " class="image">
                            <img src="' . $news_list[$i]['typical_image'] . '" alt="">
                        </a>
                        <div class="text">
                            <a href="?detail&page=news&id=' . $news_list[$i]['_id'] . ' " class="title">' . $news_list[$i]['title'] . '</a>
                            <p class="other">' . $topic_tmp . ' | ' . $news_list[$i]['created_at'] . '</p>
                        </div>
                    </div>
                ';
            }
            ?>

        </div>


    </div>

    <div class="home__action">
        <h2>Danh sách chủ đề</h2>

        <div class="home__action-select">
            <?php
            foreach ($topics_list as $topic) {
                echo '
                    <a href="?news&topic=' . $topic['_id'] . '">
                        ' . $topic['topic_name'] . '
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