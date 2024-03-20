<?php include './vendor/action/core.php';
include './vendor/action/date.php';

if(empty($_GET)){
   $posts = mysqli_query($link, "SELECT * FROM `presents` WHERE `id_status` = 2");
   }elseif($_GET['id']==2){
      $posts = mysqli_query($link, "SELECT * FROM `presents` WHERE `id_status` = 2 ORDER BY `views` DESC");
   }elseif($_GET['id']==1){
      $posts = mysqli_query($link, "SELECT * FROM `presents` WHERE `id_status` = 2 ORDER BY `date` DESC");
   }
include './vendor/components/header.php';
?>
<main>
    <div class="main-alignment">
        <section class="section1">
            <br>
            <div class="coursemoney">
                <div id="USD"> USD: 00,00 руб.</div>
                <div id="EUR"> EUR: 00,00 руб.</div>
            </div>

            <?php while ($row = mysqli_fetch_assoc($posts)){
?>
            <form method="get" action="./index.php">
                <a href="new.php?id=<?php echo $row['id'] ?>" class="post">
                    <div class="post-name">
                        <?php echo $row['title'] ?>
                    </div>
                    <div class="post-time-block">
                        <?php
      $dateCreate = date_create($row['date']);
      $dateNow = date_create(date('Y-m-d H:i:s'));
      $interval = date_diff($dateCreate, $dateNow);
       formatTime($interval);
      ?>
                    </div>
                </a>
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
<script>
function CBR_XML_Daily_Ru(rates) {
    function trend(current, previous) {
        if (current > previous) return ' ▲';
        if (current < previous) return ' ▼';
        return '';
    }
    var USDrate = rates.Valute.USD.Value.toFixed(2).replace('.', ',');
    var USD = document.getElementById('USD');
    USD.innerHTML = USD.innerHTML.replace('00,00', USDrate);
    USD.innerHTML += trend(rates.Valute.USD.Value, rates.Valute.USD.Previous);

    var EURrate = rates.Valute.EUR.Value.toFixed(2).replace('.', ',');
    var EUR = document.getElementById('EUR');
    EUR.innerHTML = EUR.innerHTML.replace('00,00', EURrate);
    EUR.innerHTML += trend(rates.Valute.EUR.Value, rates.Valute.EUR.Previous);
}
</script>
<link rel="dns-prefetch" href="https://www.cbr-xml-daily.ru/" />
<script src="//www.cbr-xml-daily.ru/daily_jsonp.js" async></script>
</body>

</html>