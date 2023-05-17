<?php
include "./call_api/news.php";
include "./call_api/topics.php";
$curr_news = null;

foreach ($news_list as $news) {
    $curr_news = $news['_id'] == $_GET['id'] ? $news : null;
    if ($curr_news != null) {
        break;
    }
}

$curr_news_topic = 'Xã hội';
foreach ($topics_list as $topic) {
    if ($topic['_id'] == $curr_news['topic_id']) {
        $curr_news_topic = $topic['topic_name'];
        break;
    }
}
?>

<div class="detail__container">
    <a href="./" class="detail__back">&lt;# Trở lại</a>

    <div class="detail__content">
        <div class="topic-timecreated">
            <h4 class="topic"><?php echo $curr_news_topic ?></h4>
            <p class="timecreated"><?php echo $curr_news['created_at'] ?></p>
        </div>
        <div class="title">
            <h1><?php echo $curr_news['title'] ?></h1>
        </div>
        <div class="image">
            <img src="<?php echo $curr_news['typical_image'] ?>" alt="">
            <p><?php echo $curr_news['note_image'] ?></p>
        </div>
        <div class="sapo"><?php echo $curr_news['sapo'] ?></div>
        <div class="main-content"><?php echo $curr_news['content'] ?></div>
    </div>
    <h1 class="title_bulkhead">Tin khác</h1>
    <hr />
    <div class="other-news">
        <?php
        $count_item = 0;

        foreach ($news_list as $news) {
            if ($news['_id'] == $curr_news['_id']) {
                continue;
            } else {
                if ($count_item < 4) {
                    $topic_tmp = 'Xã hội';
                    foreach ($topics_list as $topic) {
                        if ($topic['_id'] == $news['topic_id']) {
                            $topic_tmp = $topic['topic_name'];
                            break;
                        }
                    }

                    echo '
                    <div class="item">
                        <a href="?detail&page=news&id=' . $news['_id'] . ' " class="image">
                            <img src="' . $news['typical_image'] . '" alt="">
                        </a>
                        <div class="text">
                            <a href="?detail&page=news&id=' . $news['_id'] . ' " class="title">' . $news['title'] . '</a>
                            <p class="other">' . $topic_tmp . ' | ' . $news['created_at'] . '</p>
                        </div>
                    </div>
                ';

                    $count_item++;
                } else {
                    break;
                }
            }
        }
        ?>
    </div>
</div>