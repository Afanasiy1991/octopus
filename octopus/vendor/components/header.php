<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Octopus</title>
    <link rel="stylesheet" href="././assets/styles/style.css">
    <script src="./assets/scripts/jquery-3.7.1.min.js"></script>
    <script src="./assets/scripts/jq-script.js" defer></script>
</head>

<body>
    <header>
        <div class="header-left">
            <a href="index.php">
                <img src="./assets/img/logo.png" alt="Logo" class="logoimg">
                <div class="titlelogo">Octopus</div>
            </a>

        </div>
        <div class="header-center">
            <a href="./index.php?id=1">Свежее</a>
            <a href="./index.php?id=2">Популярное</a>
        </div>
        <div class="header-right">
            <?php if (isset($_SESSION['user'])) { ?>
            <div class="user-login">
                <?php echo $_SESSION['user']['login']; ?>
            </div>
            <a href="present.php">Предложить новость</a>
            <a href="logout.php">Выход</a>
            <?php if ($_SESSION['user']['isAdmin'] == 1) { ?>
            <a href="admin.php">Админ-панель</a>
            <?php } ?>
            <?php } else { ?>
            <a href="login.php">Войти</a>
            <a href="register.php">Зарегистрироваться</a>
            <?php } ?>



        </div>
        <div class="blockhamburger">
            <div class=" hamburger"><span></span><span></span><span></span> </div>
        </div>

        <div class="hiddenlisthamburger">


            <a href="./index.php?id=1">Свежее</a>
            <a href="./index.php?id=2">Популярное</a>


            <?php if (isset($_SESSION['user'])) { ?>
            <div class="user-login" id="user-loginmain">
                <?php echo $_SESSION['user']['login']; ?>
            </div>
            <a href="present.php">Предложить новость</a>
            <a href="logout.php">Выход</a>
            <?php if ($_SESSION['user']['isAdmin'] == 1) { ?>
            <a href="admin.php">Админ-панель</a>
            <?php } ?>
            <?php } else { ?>
            <a href="login.php">Войти</a>
            <a href="register.php">Зарегистрироваться</a>
            <?php } ?>


        </div>
    </header>