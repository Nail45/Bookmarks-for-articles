<?php
if ($_SESSION['auth'] and $id == $_SESSION['id']) {
    ?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Библиотека статей</title>
        <link rel="stylesheet" href="../assets/account.css">
    </head>
    <body>
    <div class="logout">
        <a href="/logout">Выход</a>
    </div>
    <div id="app">
        <header>
            <h1>Моя библиотека статей</h1>

            <nav class="tabs">
                <a href="/read"> Прочитанные</a>
                <a href="/unread"> Ожидают чтения</a>
            </nav>
        </header>

        <main>
            <div class="add-article">
                <h2>Добавить новую статью</h2>
            </div>

            <form action="" method="post">
                <div class="field-group">
                    <label for="title">Название статьи:</label>
                    <input type="text" id="title" name="title" required placeholder="Введите название вашей статьи..."/>
                </div>

                <div class="field-group">
                    <label for="description">Описание статьи:</label>
                    <textarea id="description" name="description" rows="4" cols="50" required
                              placeholder="Напишите короткое описание статьи..."></textarea>
                </div>

                <div class="field-group">
                    <label for="url">Ссылка на статью:</label>
                    <input type="url" id="url" name="link" required placeholder="Вставьте ссылку на вашу статью..."/>
                </div>

                <div class="submit-btn">
                    <button class="sbt" type="submit">Добавить статью</button>
                </div>
            </form>

            <?php if (isset($_SESSION['success'])) {
                $msg = $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
                <div class="success"><?php echo $msg ?></div>
            <?php } ?>
        </main>

        <footer>
            © Моя библиотека статей
        </footer>
    </div>

    </body>
    </html>

<?php } else {
    header('Location: /login');
    die();
} ?>