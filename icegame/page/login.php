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
                <h1>Авторизуйтесь или если вы у нас впервые, то <a href="register.php">зарегистрируйтесь</a></h1>
                <form action="" method="POST">
                    <h1>Авторизация</h1>
                    <input name="login" placeholder="Логин">
                    <input name="password" type="password" placeholder="Пароль">
                    <input type="submit" value="Вход">
                </form>
                <?php
                    session_start();
                    if (!empty($_POST['password']) and !empty($_POST['login'])) {
                        $conn = new mysqli("localhost", "root", "", "gameblog");
                        $login = $_POST['login'];
                        $query = "SELECT *, role.nameRole as role FROM users LEFT JOIN role ON users.idRole=role.idRole WHERE login='$login'";
                        $result = mysqli_query($conn, $query);
                        $user = mysqli_fetch_assoc($result);
                    if (!empty($user)) {
                            $hash = $user['password'];
                            if(password_verify($_POST['password'],$hash) || $_POST['password'] == $user['password'])
                            {
                                $_SESSION['auth']=true;
                                $_SESSION['id'] = $user['idUser'];
                                $_SESSION['role'] = $user['idRole'];
                                $_SESSION['nameUser'] = $user['name'];
                                header("Location: main.php");
                            }
                            else
                            {
                                // неверно ввел логин или пароль
                                echo "Пароль введен не правильно";
                                $_SESSION['auth']=false;
                            }
                        }
                        else
                        {
                            echo "Логин введен не правильно";
                        }
                    }
                ?>
            </div>
        </section>

        <!-- подвал -->
        <?php
            require '../php/footer.php';
        ?>
    </div>
</body>
</html>