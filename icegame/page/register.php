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
                <form action="" method="POST">
                    <h1>Регистрация</h1>
                    <input name="surname" placeholder="Фамилия" value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : ''; ?>">
                    <input name="name" placeholder="Имя" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                    <input name="patronomic" placeholder="Отчество (если есть)" value="<?php echo isset($_POST['patronomic']) ? $_POST['patronomic'] : ''; ?>">
                    <input name="login" placeholder="Логин" value="<?php echo isset($_POST['login']) ? $_POST['login'] : ''; ?>">
                    <input name="password" type="password" placeholder="Пароль" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                    <input name="confirm" type="password" placeholder="Повторите пароль" value="<?php echo isset($_POST['confirm']) ? $_POST['confirm'] : ''; ?>">
                    <input type="submit" value="Вход">
                </form>
                <?php
                    session_start();
                    if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm']) and !empty($_POST['name']) and !empty($_POST['surname'])) { 
                        $conn = new mysqli("localhost", "root", "", "gameblog");
                        $surname = $_POST['surname'];
                        $name = $_POST['name'];

                        if(isset($_POST['patronomic'])){
                            $patronomic = $_POST['patronomic'];
                        }else{
                            $patronomic = null;
                        }

                        $login = $_POST['login'];
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $query = "SELECT * FROM users WHERE login='$login'"; 
                        $result = mysqli_query($conn,$query);

                        if ($_POST['password'] == $_POST['confirm']) {
                            if(mysqli_num_rows($result)>0){
                                echo "Этот логин уже занят, выбирете другой";
                            }
                            elseif(strlen($_POST['password'])<=1){
                                echo "Ваш пароль слишком короткий";
                            }
                            else{ 
                            $insertquery = "INSERT INTO users SET surname='$surname', name='$name', patronomic='$patronomic', login='$login', password='$password', idRole='2'"; 
                            mysqli_query($conn, $insertquery);
                            $_SESSION['auth']=true;
                            $query = "SELECT *, role.nameRole as role FROM users LEFT JOIN role ON users.idRole=role.idRole WHERE login='$login'";
                            $result = mysqli_query($conn, $query);
                            $user = mysqli_fetch_assoc($result);
                            $_SESSION['id'] = $user['idUser'];
                            $_SESSION['role'] = $user['idRole'];
                            $_SESSION['nameUser'] = $user['name'];
                            header("Location: main.php"); 
                            }
                        } 
                        else {
                            echo 'Пароли не совпадают';
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