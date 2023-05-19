<?php
$topic_filler = isset($_GET['topic']) ? $_GET['topic'] : null;

$new_list_News = $news_list;
$notify = null;
if ($topic_filler) {
    $new_list_News = [];
    foreach ($news_list as $news) {
        if ($news['topic_id'] == $topic_filler) {
            array_push($new_list_News, $news);
        }
    }
    if (count($new_list_News) == 0) {
        $new_list_News = $news_list;
        $notify = "Không có tin nào về chủ đề này!";
    }
}
?>

<div class="home">
    <div class="home__content">
        <?php
        if ($notify) {
            echo "
                <script>
                    alert('$notify');
                    location.href = './';
                </script>
            ";
        }
        ?>
        <h1>Tin mới nhất</h1>
        <div class="home__content-hot">
            <?php
            $topic_tmp = 'Xã hội';
            foreach ($topics_list as $topic) {
                if ($topic['_id'] == $new_list_News[0]['topic_id']) {
                    $topic_tmp = $topic['topic_name'];
                    break;
                }
            }
            ?>
            <div class="hotitem">
                <div class="text">
                    <a href="?detail&page=news&id=<?php echo $new_list_News[0]['_id'] ?>" class="title"><?php echo $new_list_News[0]['title'] ?></a>
                    <p class="sapo"><?php echo $new_list_News[0]['sapo'] ?></p>
                    <p class="other"><?php echo $topic_tmp ?> ● <?php echo Get_Time_Passed($new_list_News[0]['created_at']) ?></p>
                </div>
                <a href="?detail&page=news&id=<?php echo $new_list_News[0]['_id'] ?>" class="image">
                    <img src="<?php echo $new_list_News[0]['typical_image'] ?>" alt="">
                </a>
            </div>
        </div>
        <div class="home__content-items">
            <?php
            for ($i = 1; $i < count($new_list_News); $i++) {
                $topic_tmp = 'Xã hội';
                foreach ($topics_list as $topic) {
                    if ($topic['_id'] == $new_list_News[$i]['topic_id']) {
                        $topic_tmp = $topic['topic_name'];
                        break;
                    }
                }
                echo '
                    <div class="item">
                        <a href="?detail&page=news&id=' . $new_list_News[$i]['_id'] . ' " class="image">
                            <img src="' . $new_list_News[$i]['typical_image'] . '" alt="">
                        </a>
                        <div class="text">
                            <a href="?detail&page=news&id=' . $new_list_News[$i]['_id'] . ' " class="title">' . $new_list_News[$i]['title'] . '</a>
                            <p class="other">' . $topic_tmp . ' ● ' . Get_Time_Passed($new_list_News[$i]['created_at']) . '</p>
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