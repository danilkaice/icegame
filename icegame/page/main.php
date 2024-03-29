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
                <div class="posts">
                    <!-- вывод постов -->
                    <?php
                        require '../php/selectPosts.php';
                    ?>
                    <?php
                        if (!empty($_SESSION['auth']) && $_SESSION['role'] == 1){
                            echo '<a href="addPost.php">';
                            echo '<div class="post">';
                            echo '<h1>Добавить новый пост</h1>';
                            echo '<img src="../img/plus.png">';
                            echo '</div>';
                            echo '</a>';
                        }
                    ?>
                </div>
            </div>
        </section>

        <!-- подвал -->
        <?php
            require '../php/footer.php';
        ?>
    </div>
</body>
</html>