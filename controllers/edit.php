<?php

session_start();

require_once './connect.php';

if (!empty($_SESSION['auth'])) {
    try {
        $stmt = $pdo->prepare('SELECT * FROM articles where id=:id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $article = $stmt->fetch();

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    if (!empty($_POST)) {

        try {
            $stmt = $pdo->prepare('UPDATE articles SET title=:title,description=:description,
            link=:link WHERE id=:id');

            $stmt->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
            $stmt->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
            $stmt->bindValue(':link', $_POST['link'], PDO::PARAM_STR);
            $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);

            $stmt->execute();

            $_SESSION['edit'] = 'Статья удачно изменена';

            header('Location: /edit/' . $id);
            die();

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}
