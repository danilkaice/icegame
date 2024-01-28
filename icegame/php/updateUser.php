<?php
    session_start();
    $id = $_SESSION['id'];
    if (!empty($_POST['surname']) and !empty($_POST['name']) and !empty($_POST['patronomic'])) {
        $conn = new mysqli("localhost", "root", "", "gameblog");
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $patronomic = $_POST['patronomic'];
        $query = "UPDATE users SET surname='$surname', name='$name', patronomic='$patronomic' WHERE idUser='$id'";
        $_SESSION['nameUser'] = $name;
        mysqli_query($conn, $query);
        header("Location: ../page/profile.php"); 
    }
?>