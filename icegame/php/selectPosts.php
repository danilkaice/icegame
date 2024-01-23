<?php
    $conn = new mysqli('localhost', 'root', '', 'gameblog');
    $sql = 'select * from posts';

    if($result = $conn->query($sql)){
        foreach($result as $post){
            echo '<div class="post">';
            echo '<h1>'.$post['name'].'</h1>';
            echo '<img src="img/'.$post['photo'].'">';
            echo '<p>'.$post['text'].'</p>';
            echo '<a href="">Подробнее...</a>';
            echo '</div>';
        }
    }
?>