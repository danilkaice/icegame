<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.png">
    <title>IceGame</title>
</head>
<body>
    <div class="wrapper">
        <!-- шапка -->
        <?php
            require 'php/headerMain.php';
        ?>

        <!-- основная секция -->
        <section>
            <div class="main">
                <div class="posts">
                    <!-- вывод постов -->
                    <?php
                        require 'php/selectPosts.php';
                    ?>
                </div>
            </div>
        </section>

        <!-- подвал -->
        <?php
            require 'php/footerMain.php';
        ?>
    </div>
</body>
</html>