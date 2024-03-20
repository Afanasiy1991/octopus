<?php include './vendor/action/core.php';


if (isset($_POST['presentnews'])) {
    $date = date('Y-m-d H:i:s');
    $text = $_POST['text'];
    $s = ("|\r\n|");
    $d = ("<p>\n</p>");
    $text = "<p>" . preg_replace($s, $d, $text) . "</p>";
    $text = str_replace('<p></p>', '', $text);
    $uploaddir = './assets/img/';
    $uniqname = uniqid() . '.' . substr($_FILES['img']['type'], 6);
    $uploadfile = $uploaddir . $uniqname;
    if ('image' == substr($_FILES['img']['type'], 0, 5)) {
        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
       
    }
    mysqli_query($link, "INSERT INTO `presents` (`id`, `title`, `text`, `id_user`, `id_status`, `img`, `date`) VALUES (NULL, '{$_POST['title']}', '$text', '{$_SESSION['user']['id']}', 1, '$uniqname', '$date')");

    header('Location: ./index.php');
}
include './vendor/components/header.php';
?>
<main>
    <div class="main-alignment">
        <section>
            <form action="./present.php" method="POST" enctype="multipart/form-data">
                <div class="formpresent">
                    <br>
                    <div class="zag">Предложить новость</div>
                    <textarea class="inputtitle" rows="6" cols="100" type="text" name="title" placeholder="Заголовок"
                        required></textarea>
                    <textarea type="text" rows="10" cols="100" name="text" placeholder="Текст" required></textarea>
                    <input type="file" name="img" id="inputimg">
                    <div class="imgpredpocazdiv">
                        <img id="imgpredpocaz">
                    </div>
                    <button name="presentnews">Предложить</button>
                </div>

            </form>
        </section>


    </div>

</main>
</body>

</html>