<?php

session_start();

require_once './connect.php';


if (!empty($_SESSION['auth'])) {

    try {
        $stmt = $pdo->prepare('SELECT * FROM articles WHERE user_id = :id and is_read = :read');

        $stmt->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
        $stmt->bindValue(':read', true);
        $stmt->execute();

        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

}