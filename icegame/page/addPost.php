<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logo.png">
    <title>IceGame</title>
</head>
<body>
    <div class="wrapper">
        <!-- шапка -->
        <?php
            require '../php/header.php';
        ?>

        <!-- основная секция -->
        <section>
            <div class="main">
                <form action="../php/addPost.php" method="POST" enctype="multipart/form-data">
                    <h1>Добавление нового поста</h1>
                    <input name="namePost" placeholder="Название" value="<?php echo isset($_POST['namePost']) ? $_POST['namePost'] : ''; ?>">
                    <div>
                        Фото:<input name="photo" placeholder="Фото" type="file">
                    </div>
                    <input name="text" placeholder="Текст" value="<?php echo isset($_POST['text']) ? $_POST['text'] : ''; ?>">
                    <input type="submit" value="Добавить">
                </form>
            </div>
        </section>

        <!-- подвал -->
        <?php
            require '../php/footer.php';
        ?>
    </div>
</body>
</html>