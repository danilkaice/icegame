<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../img/logo.png">
    <title>IceGame</title>
</head>
<body>
    <div class="wrapper">
        <!-- шапка -->
        <header>
            <div class="head">
                <!-- логотип -->
                <a href="../main.php">
                    <div class="logo">
                        <img src="../../img/logo.png" alt="">
                        <div class="namelogo">
                            <span id="nameBlog">IceGame</span>
                            <span>by TwentyOneIce Studio</span>
                        </div>
                    </div>
                </a>
                <!-- ссылки -->
                <div class="links">
                    <?php
                    session_start();
                        if (!empty($_SESSION['auth']) && $_SESSION['role'] == 1){
                            echo '<a href="">Администратор '. $_SESSION['nameUser'].'</a>';
                            echo '<a href="logout.php">Выход</a>';
                        }
                        elseif (!empty($_SESSION['auth'])){
                            echo '<a href="">Привет, '. $_SESSION['nameUser'].'</a>';
                            echo '<a href="../logout.php">Выход</a>';
                        }
                        else{
                            echo '<a href=""></a>';
                            echo '<a href="../login.php">Вход</a>';
                        }
                    ?>
                </div>
            </div>
        </header>

        <!-- основная секция -->
        <section>
            <div class="main">
                <div class="postBig">
                    <?php
                        $id = $_GET['id'];
                        $_SESSION['idPost'] = $id;

                        $conn = new mysqli('localhost', 'root', '', 'gameblog');
                        $sql = 'select * from posts where idPosts='.$id;

                        if($result = $conn->query($sql)){
                            foreach($result as $post){
                                echo '<h1>'.$post['namePosts'].'</h1>';
                                echo '<img src="../../img/'.$post['photo'].'">';
                                echo '<p>'.$post['text'].'</p>';
                            }
                        }
                    ?>
                </div>
                <!-- коментарии -->
                <div class="coments">
                        <h1>Коментарии:</h1>
                        <?php
                            $id = $_GET['id'];

                            $conn = new mysqli('localhost', 'root', '', 'gameblog');
                            $sql = 'select *, users.name as nameUser from coments left join users on coments.idUser=users.idUser where idPosts='.$id;

                            if($result = $conn->query($sql)){
                                foreach($result as $coment){
                                    if($coment['approv'] == true || $_SESSION['role'] == 1){
                                        echo '<div class="coment">';
                                        if($_SESSION['role'] == 1 && $coment['approv'] == false){
                                            echo '<div>';
                                            echo '<h2>Не одобренный коментарий</h2>';
                                            echo '<a href="../../php/approvComent.php/?id='.$coment['idComents'].'">Одобрить</a>';
                                            echo '</div>';
                                        }
                                        echo '<div>';
                                        echo '<h4>'.$coment['nameUser'].'</h4>';
                                        echo '<p>'.$coment['text'].'</p>';
                                        echo '</div>';
                                        if($_SESSION['role'] == 1){
                                            echo '<a href="../../php/delComent.php?id='.$coment['idComents'].'">Удалить</a>';
                                        }
                                        echo '</div>';
                                    }
                                }
                            }
                        ?>

                        <?php
                            if (!empty($_SESSION['auth'])) {
                                echo '<form action="../../php/addComent.php" method="POST" class="addComent">';
                                echo '<textarea placeholder="Оставьте свой коментарий" name="text" maxlength="500" required></textarea>';
                                echo '<input type="submit" value="Оставить">';
                                echo '</form>';
                            }
                        ?>
                </div>
            </div>
        </section>

        <!-- подвал -->
        <footer>
            <div class="foot">
                <!-- логотип -->
                <div class="namelogo">
                    <span id="nameBlog">IceGame</span>
                    <span>by TwentyOneIce Studio</span>
                </div>
                <!-- права -->
                <div class="rights">
                    <p>IceGame - блог о играх от разработчиков.</p>
                    <a href="https://t.me/danilkaicejami"><img src="../../img/telegram.png"> Наш телеграм</a>
                    <span>©TwentyOneIce Company</span>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>