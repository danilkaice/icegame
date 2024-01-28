<header>
    <div class="head">
        <!-- логотип -->
        <a href="main.php">
            <div class="logo">
                <img src="../img/logo.png" alt="">
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
                    echo '<a href="profile.php">Администратор '. $_SESSION['nameUser'].'</a>';
                    echo '<a href="logout.php">Выход</a>';
                }
                elseif (!empty($_SESSION['auth']) && $_SESSION['role'] == 2){
                    echo '<a href="profile.php">Привет, '. $_SESSION['nameUser'].'</a>';
                    echo '<a href="logout.php">Выход</a>';
                }
                else{
                    echo '<a href=""></a>';
                    echo '<a href="login.php">Вход</a>';
                }
            ?>
        </div>
    </div>
</header>