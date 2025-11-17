<?php

session_start();

require_once './connect.php';


if (!empty($_SESSION['auth'])) {

    try {
        $stmt = $pdo->prepare('UPDATE articles SET is_read = is_read ^ 1 WHERE user_id = :user_id and id = :id');

        $stmt->bindValue(':user_id', $_SESSION['id'], PDO::PARAM_INT);
        $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();

        header('Location:/' . $path);
        die();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

}