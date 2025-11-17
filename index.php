<?php

ini_set('display_errors', 'off');

session_start();

$url = $_SERVER['REQUEST_URI'];

if (preg_match('#^/$#', $url)) {
    include "./views/main.php";
}

if (preg_match('#^/(account)/(\d+)$#', $url, $match)) {
    $id = $match[2];
    include './controllers/account.php';
    include './views/account.php';
}

if (preg_match('#^/read$#', $url)) {
    include './controllers/read.php';
    include './views/read.php';
}

if (preg_match('#^/unread$#', $url)) {
    include './controllers/unread.php';
    include './views/unread.php';
}

if (preg_match('#^/([A-Za-z]+)/(delete)\?id=(\d+)$#', $url, $match)) {
    $path = $match[1];
    include './controllers/delete.php';
}

if (preg_match('#^/([A-Za-z]+)/(checked)\?id=(\d+)$#', $url, $match)) {
    $path = $match[1];
    include './controllers/checked.php';
}

if (preg_match('#^/(edit)/(\d+)$#', $url, $match)) {
    $id = $match[2];
    include './controllers/edit.php';
    include './views/edit.php';
}

if (preg_match('#^/login$#', $url)) {
    include './controllers/login.php';
    include './views/login.php';
}

if (preg_match('#^/register$#', $url)) {
    include './controllers/register.php';
    include './views/register.php';
}

if (preg_match('#^/logout$#', $url)) {
    include "./controllers/logout.php";
}

