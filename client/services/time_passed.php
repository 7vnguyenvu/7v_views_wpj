
<?php

function Get_Time_Passed($time)
{
    $hoursPassed = " giây trước";
    $postTime = DateTime::createFromFormat('Y-m-d H:i:s', "$time");
    $currentTime = new DateTime();
    $timeDiff = $currentTime->diff($postTime);

    if ($timeDiff->days > 0) {
        $hoursPassed = $timeDiff->days . " ngày trước";
    } elseif ($timeDiff->h > 0) {
        $hoursPassed = $timeDiff->h . " giờ trước";
    } elseif ($timeDiff->i > 0) {
        $ioursPassed = $timeDiff->i . " phút trước";
    } else {
        $hoursPassed = $timeDiff->s . " giây trước";
    }

    return $hoursPassed;
}
