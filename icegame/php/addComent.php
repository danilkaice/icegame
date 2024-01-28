<?php
session_start();
if (!empty($_POST['text'])) { 
    $conn = new mysqli("localhost", "root", "", "gameblog");
    $text = $_POST['text'];
    $userId = $_SESSION['id'];
    $postId = $_SESSION['idPost'];

    if ($_POST['password'] == $_POST['confirm']) { 
        $query = "INSERT INTO coments SET idUser='$userId', idPosts='$postId', text='$text', approv='0'"; 
        mysqli_query($conn, $query);
        $redicet = $_SERVER['HTTP_REFERER'];
        header("Location: $redicet"); 
    }
}
?>