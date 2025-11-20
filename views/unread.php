<?php if ($_SESSION['auth']) { ?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ожидают прочтения</title>
        <link rel="stylesheet" href="../assets/account.css">
        <link rel="stylesheet" href="../assets/list.css">
    </head>
    <body>

    <div class="logout">
        <a href="/logout">Выход</a>
    </div>

    <div id="app">
        <header>
            <h1>Ожидают прочтения</h1>
            <nav class="tabs">
                <a href="/account/<?php echo $_SESSION['id'] ?>">На главную</a>
                <a href="/read">Прочитанные</a>
                <a href="/unread">Ожидают прочтения</a>
            </nav>
        </header>
        <main>

            <table class="articles-table">
                <thead>
                <tr>
                    <th>Название статьи</th>
                    <th>Описание</th>
                    <th>Ссылка</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $article) { ?>
                    <tr>
                        <td><strong><?php echo $article['title'] ?></strong></td>
                        <td><?php echo $article['description'] ?></td>
                        <td><a target="_blank" class="action-link" href="<?php echo $article['link'] ?>">Перейти</a>
                        </td>
                        <td class="wrap-link">
                            <a class="action-link" href="/edit/<?php echo $article['id'] ?>">Редактировать</a>
                            <form action="/unread/delete" method="post">
                                <input type="hidden" name="id" value="<?php echo $article['id'] ?>">
                                <input class="action-link delete" type="submit" name="delete" value="Удалить">

                            </form>
                            <form action="/unread/checked" method="post">
                                <input type="hidden" name="id" value="<?php echo $article['id'] ?>">
                                <input class="action-link unread" type="submit" name="delete"
                                       value="Отметить как Прочитанная">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </main>

        <footer>© Библиотека статей</footer>
    </div>

    </body>
    </html>

<?php } else {
    header('Location: /login');
    die();
} ?>