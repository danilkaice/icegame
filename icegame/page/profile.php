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
            <?php
                session_start();
                $id = $_SESSION['id'];
                $conn = new mysqli("localhost", "root", "", "gameblog");
                $query = "SELECT * FROM users WHERE idUser='$id'";
                $result = mysqli_query($conn, $query);
                $user = mysqli_fetch_assoc($result);
            ?>
                <form action="../php/updateUser.php" method="POST">
                    <h1>Обновление данных:</h1>
                    <input name="surname" value="<?= $user['surname'] ?>" placeholder="Фамилия">
                    <input name="name" value="<?= $user['name'] ?>" placeholder="Имя">
                    <input name="patronomic" value="<?= $user['patronomic'] ?>" placeholder="Отчество">
                    <input type="submit" value="Обновить">
                </form>

                <form action="" method="POST">
                    <h1>Обновление пароля:</h1>
                    <input type="password" name="oldPassword" placeholder="Старый пароль">
                    <input type="password" name="newPassword" placeholder="Новый пароль">
                    <input type="password" name="newPasswordConfirm" placeholder="Новый пароль ещё раз">
                    <input type="submit" name="submit" value="Обновить">
                </form>
                <?php
                    $hash = $user['password'];
                    $oldPassword = $_POST['oldPassword'];
                    $newPassword = $_POST['newPassword'];
                    if(!empty($_POST['submit'])){
                        if (password_verify($_POST['password'],$hash) || $_POST['oldPassword'] == $user['password']) {
                            if($_POST['newPassword']==$_POST['newPasswordConfirm']){
                                $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                                $query = "UPDATE users SET password='$newPasswordHash' WHERE idUser='$id'";
                                mysqli_query($conn, $query);
                                echo 'Пароль обнавлен успешно';
                            } else{
                                echo "Пароли не совпадают";
                            }
                        } else {
                            echo "Старый пароль введён неверно";
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