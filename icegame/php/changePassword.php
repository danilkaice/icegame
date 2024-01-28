<?php
session_start();
$conn = new mysqli("localhost", "root", "", "gameblog");
$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE idUser='$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
$hash = $user['password'];
$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
if(!empty($_POST['submit']))
{
    if (password_verify($_POST['password'],$hash) || $_POST['oldPassword'] == $user['password']) {
        if($_POST['newPassword']==$_POST['newPasswordConfirm'])
        {
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $query = "UPDATE users SET password='$newPasswordHash' WHERE idUser='$id'";
            mysqli_query($conn, $query);
            header("Location: ../page/profile.php");    
        }
        else
        {
            echo "Пароли не совпадают";
        }
    } else {
        echo "Старый пароль введён неверно";
    }
}
?>