<?php session_start();
include "./configs/dbconfig.php";
$account = isset($_SESSION['user_logged']) ? $_SESSION['user_logged'] : null;
$user = null;
if ($account != null) {
    $user = mysqli_fetch_array(mysqli_query($connection, "select * from users where ACCOUNTS_ID = $account->_id"), 1);
}
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7V Server | Views</title>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles/index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
</head>

<body>
    <div class="container">
        <?php include "./components/header_comp.php" ?>

        <div class="main">
            <?php include "./components/sidebar_comp.php" ?>
            <?php include "./components/content_comp.php" ?>
        </div>
    </div>
</body>

</html>