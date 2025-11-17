<?php
if ($_SESSION['auth']) {

    ?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Редактирование статьи</title>
        <link rel="stylesheet" href="../assets/account.css">
    </head>
    <body>
    <div id="app">

        <header>
            <h1>Редактирование статьи</h1>
            <nav class="tabs">
                <a href="/account/<?php echo $_SESSION['id'] ?>">На главную</a>
                <a href="/read">Прочитанные</a>
                <a href="/unread">Ожидают прочтения</a>
            </nav>
        </header>

        <main>

            <form action="" method="post">
                <div class="field-group">
                    <label for="title">Название статьи:</label>
                    <input minlength="3" type="text" id="title" name="title" value="<?php echo $article['title'] ?>"
                           placeholder="Введите название вашей статьи..."/>
                </div>

                <div class="field-group">
                    <label for="description">Описание статьи:</label>
                    <input id="description" name="description"
                           placeholder="Напишите короткое описание статьи..."
                           value="<?php echo $article['description'] ?>"
                           minlength="3"
                    >
                </div>

                <div class="field-group">
                    <label for="url">Ссылка на статью:</label>
                    <input type="url" id="url" name="link"
                           placeholder="Вставьте ссылку на вашу статью..."
                           value="<?php echo $article['link'] ?>"
                    />
                </div>

                <div class="submit-btn">
                    <button class="sbt" type="submit">Редактировать статью</button>
                </div>
            </form>

            <?php if (isset($_SESSION['edit'])) {
                $msg = $_SESSION['edit'];
                unset($_SESSION['edit']);
                ?>
                <div class="success"><?php echo $msg ?></div>
            <?php } ?>
        </main>

        <footer>
            <p>© 2025 Идея</p>
        </footer>
    </div>
    </body>
    </html>

<?php } else {
    header('Location: /login');
    die();
} ?>
