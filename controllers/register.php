<?php

require_once './connect.php';

$_SESSION['auth'] = null;

if (!empty($_POST)) {

    if ($_POST['password'] === $_POST['confirm-password']) {

        $_SESSION['name'] = $_POST['name'];

        $_SESSION['email'] = $email = $_POST['email'];
        $passwordInitial = $_POST['password'];
        $passwordLength = mb_strlen($passwordInitial);

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if ($passwordLength < 3 or $passwordLength > 10) {
            header('Location: /register');
            $_SESSION['password-error'] = 'Пароль должен быть больше 3 символов и меньше 10';
            die();
        }

        try {

            $stmt = $pdo->prepare('SELECT * FROM users where email=:email');

            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (empty($user)) {
                $stmt = $pdo->prepare('INSERT INTO users(name, email, password) 
                                        VALUES (:name,:email, :password)');

                $stmt->bindValue(':name', $_POST['name']);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':password', $password);

                $stmt->execute();

                $id = $pdo->lastInsertId();

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $id;

                header('location: account/' . $id);
                die();

            } else {
                header('Location: /register');
                $_SESSION['email-error'] = 'Пользователь с таким email уже существует';
                die();
            }


        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        header('Location: /register');
        $_SESSION['repeated-password-error'] = 'Пароли не совпадают';
        die();
    }

}

