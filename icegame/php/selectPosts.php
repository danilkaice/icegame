<?php
    $conn = new mysqli('localhost', 'root', '', 'gameblog');
    $sql = 'select * from posts';

    if($result = $conn->query($sql)){
        foreach($result as $post){
            echo '<div class="post">';
            if (!empty($_SESSION['auth']) && $_SESSION['role'] == 1){
                echo '<a href="../php/delPost.php/?id='.$post['idPosts'].'">Удалить</a>';
            }
            echo '<h1>'.$post['namePosts'].'</h1>';
            echo '<img src="../img/'.$post['photo'].'">';
            echo '<p>'.$post['text'].'</p>';
            echo '<a href="post.php/?id='.$post['idPosts'].'">Подробнее...</a>';
            echo '</div>';
        }
    }
?>