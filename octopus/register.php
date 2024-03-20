<?php include './vendor/action/core.php';


if(isset($_POST['registration'])) {
    $password = md5($_POST['password']);
    mysqli_query($link, "INSERT INTO `users` (`id`, `login`, `password`, `email`) VALUES (NULL, '{$_POST['login']}', '$password', '{$_POST['email']}')");
    header('Location: ./index.php');
}
include './vendor/components/header.php';
?>
<main>
<div class="main-alignment">
<section>
    <form action="./register.php" method="POST">
        <br>
        <div class="zag">Регистрация</div>
        <br>
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="email" name="email" placeholder="Email" required>
        <button name="registration">Зарегистрироваться</button>
    </form>
</section>


</div>

</main>
</body>
</html>