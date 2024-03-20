<?php 
include './vendor/action/core.php';
include './vendor/action/date.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php"); // если сессии нет, переходим на индекс
}else{
    if($_SESSION['user']['isAdmin'] != 1){
        header("Location: index.php");
    }
}

if (!empty($_GET)){
    if($_GET["sort"] == "accepted"){
        $presents = $link->query("SELECT `statuses`.*, `users`.*, `presents`.*
        FROM `presents` 
            LEFT JOIN `statuses` ON `presents`.`id_status` = `statuses`.`id` 
            LEFT JOIN `users` ON `presents`.`id_user` = `users`.`id` WHERE `presents`.`id_status` = 2");
    }
    if($_GET["sort"] == "new"){
        $presents = $link->query("SELECT `statuses`.*, `users`.*, `presents`.*
        FROM `presents` 
            LEFT JOIN `statuses` ON `presents`.`id_status` = `statuses`.`id` 
            LEFT JOIN `users` ON `presents`.`id_user` = `users`.`id` WHERE `presents`.`id_status` = 1");
    }
    if($_GET["sort"] == "rejected"){
        $presents = $link->query("SELECT `statuses`.*, `users`.*, `presents`.*
        FROM `presents` 
            LEFT JOIN `statuses` ON `presents`.`id_status` = `statuses`.`id` 
            LEFT JOIN `users` ON `presents`.`id_user` = `users`.`id` WHERE `presents`.`id_status` = 3");
    }
}

if(empty($_GET)){
    $presents = $link->query("SELECT `statuses`.*, `users`.*, `presents`.*
    FROM `presents` 
        LEFT JOIN `statuses` ON `presents`.`id_status` = `statuses`.`id` 
        LEFT JOIN `users` ON `presents`.`id_user` = `users`.`id`"); // получаем все заявления вошедшего в профиль

}


if(isset($_POST['accept'])) {
    $id = $_POST['id'];
    mysqli_query($link, "UPDATE `presents` SET `id_status` = 2 WHERE `id` = '$id'");
}

if(isset($_POST['reject'])) {
    $id = $_POST['id'];
    mysqli_query($link, "UPDATE `presents` SET `id_status` = 3 WHERE `id` = '$id'");
}

if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    mysqli_query($link, "DELETE FROM `presents` WHERE `id` = '$id'");
}


include './vendor/components/header.php';
?>

<main>

<div class="main-alignment">
<section class="newssection">
<br>
<div class="sortbygroup">
<a href="./admin.php?sort=new">Новые</a>
<a href="./admin.php?sort=accepted">Подтвержденные</a>
<a href="./admin.php?sort=rejected">Отклоненные</a>
</div>
<br>
<hr>
<br>
<?php //вывод заявлений
    foreach ( $presents as $key => $value) {?>
        <div style="border-bottom: 1px solid #000000; align-items:center; display:flex;justify-content:center; flex-direction:column;">


            <h2>Логин предложившего: <?= $value['login']; ?></h2>
            <h2>Заголовок новости: <?= $value['title']; ?> </h2>
            <h2>Статус новости: <?= $value['status']; ?></h2>
            <p><h2>Текст новости:</h2> <?= $value['text']; ?></p>

                <div class="new-img"><img src="./assets/img/<?php echo $value['img']?>" alt=""></div>
                        <div class="post-time-block">
                        <?php
                        $dateCreate = date_create($value['date']);
                        $dateNow = date_create(date('Y-m-d H:i:s'));
                        $interval = date_diff($dateCreate, $dateNow);
                        formatTime($interval);
                        ?>
                                    </div>
            <?php if($value['id_status'] == 1 || $value['id_status'] == 2 || $value['id_status'] == 3) { ?>
            <form action="./admin.php" method="post">
                <input type="hidden" name="id" value="<?= $value['id']; ?>">
                <?php if($value['id_status'] == 1) { ?>
                <button name="accept">
                    Принять
                </button>
                <button name="reject">
                    Отклонить
                </button>
                <?php } ?>
                <button name="delete">
                    Удалить
                </button>
            </form>
            <?php } ?>
        </div>
        <br>
    <?php } ?>
</section>
</div>
</main>
</body>
</html>
