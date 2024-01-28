<?php
    if(!empty($_POST['namePost']) and !empty($_POST['text']) and !empty($_FILES['photo'])) { 
        $conn = new mysqli("localhost", "root", "", "gameblog");
        $namePost = $_POST['namePost'];
        $text = $_POST['text'];
        $photo = $_FILES['photo']['name'];
        $path = $_FILES['photo']['tmp_name'];

        if(move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$photo)) { 
            $query = "INSERT INTO posts SET namePosts='$namePost', photo='$photo', text='$text'"; 
            mysqli_query($conn, $query);
            header("Location: ../main.php"); 
        } 
        else {
            echo 'Ошибка загрузки файла';
        }
    }
?>