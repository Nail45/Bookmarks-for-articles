<?php

session_start();

require_once './connect.php';


if (!empty($_SESSION['auth'])) {

    if (!empty($_POST)) {
        try {
            $stmt = $pdo->prepare('INSERT INTO articles(title, description, link, user_id) 
    VALUES (:title,:description,:link,:user_id)');

            $stmt->bindValue(':title', $_POST['title']);
            $stmt->bindValue(':description', $_POST['description']);
            $stmt->bindValue(':link', $_POST['link']);
            $stmt->bindValue(':user_id', $_SESSION['id'], PDO::PARAM_INT);
            $stmt->execute();

            $_SESSION['success'] = 'Статья успешно добавлена';

            header('Location: /account/' . $_SESSION['id']);

            die();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}