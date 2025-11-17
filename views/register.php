<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Регистрация</title>
    <link rel="stylesheet" href="../assets/register.css"/>
</head>
<body>
<div>
    <form action="/register" method="POST">
        <h2>Регистрация</h2>

        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required value="<?php if (isset($_SESSION['name'])) {
            echo $_SESSION['name'];
        } else {
            echo "";
        } ?>">

        <label for="email">Почта:</label>
        <input type="email" id="email" name="email" required value="<?php if (isset($_SESSION['email'])) {
            echo $_SESSION['email'];
        } else {
            echo "";
        } ?>">

        <?php
        if (isset($_SESSION['email-error'])) {
            $msg = $_SESSION['email-error'];
            unset($_SESSION['email-error']); ?>
            <div class="error"><?php echo $msg ?>
            </div>
        <?php } ?>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm-password">Подтвердите пароль:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>
        <?php
        if (isset($_SESSION['password-error'])) {
            $msg = $_SESSION['password-error'];
            unset($_SESSION['password-error']);
            ?>
            <div class="error"><?php echo $msg ?></div>
            <?php
        } elseif (isset($_SESSION['repeated-password-error'])) {
            $msg = $_SESSION['repeated-password-error'];
            unset($_SESSION['repeated-password-error']);
            ?>
            <div class="error"><?php echo $msg ?></div>
        <?php } ?>

        <button type="submit">Зарегистрироваться</button>
    </form>
    <div class="to-login">Уже есть аккаунт? <a href="/login">войти</a></div>
</div>
</body>
</html>
