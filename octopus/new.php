<?php include './vendor/action/core.php';
include './vendor/action/date.php';

$posts = mysqli_query($link, "SELECT `presents`.*, `users`.* FROM `presents` LEFT JOIN `users` ON `presents`.`id_user` = `users`.`id` WHERE `presents`.`id` = '{$_GET['id']}'");

if(isset($_GET['id'])){
   mysqli_query($link, "UPDATE `presents` SET `views` = `views` +1 WHERE `id` = '{$_GET['id']}'");
}

include './vendor/components/header.php';
?>
<main>
    <div class="main-alignment">
        <section>
 <?php while ($row = mysqli_fetch_assoc($posts)){
?>
        <form class="new" method="get">
<br>
<div class="new-title"><h2><?php echo $row['title'] ?></h2></div>
<br>
<div class="new-desc"><?php echo $row['text'] ?></div>
<div class="new-img"><img src="./assets/img/<?php echo $row['img']?>" alt=""></div>
         <p>Автор: <?= $row['login']; ?></p>
          <div class="post-time-block">
       <?php
            $dateCreate = date_create($row['date']);
            $dateNow = date_create(date('Y-m-d H:i:s'));
            $interval = date_diff($dateCreate, $dateNow);
            formatTime($interval);
            ?>
         </div>

              </form>
<?php }?>
        </section>
        <section class="communities-section">
    <div class="community-block">
      <div class="social-block">
         ПОДДЕРЖАТЬ
         <br>
         <a href="#" class="support-icon"><img src="./assets/img/support.png" alt="Поддержка"></a>
      </div>
    <div class="social-block">
       <div class="social">НАШИ СОЦСЕТИ</div>
       <div class="social-buttons">
          <a href="#" class="vk"><img src="./assets/img/VK-white.png" alt="ВКонтакте"></a>
          <a href="#" class="tg"><img src="./assets/img/TG-white.png" alt="Телеграм"></a>
          <a href="#" class="yt"><img src="./assets/img/YT-white.png" alt="Ютуб"></a>
       </div>
    </div>
 </section>
    </div>

</main>

</body>

</html>