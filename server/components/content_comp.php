<div class="content">

    <?php
    if ($account && $account->level == 1) {
        include_once "./pages/$page.php";
    } else {
        include_once "./pages/warning.php";
    }
    ?>


</div>