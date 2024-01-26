<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="../../img/logo.png">
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
                <div class="postBig">
                    <?php
                        $id = $_GET['id'];

                        $conn = new mysqli('localhost', 'root', '', 'gameblog');
                        $sql = 'select * from posts where idPosts="'.$id.'"';

                        if($result = $conn->query($sql)){
                            foreach($result as $post){
                                echo '<h1>'.$post['name'].'</h1>';
                                echo '<img src="../../img/'.$post['photo'].'">';
                                echo '<p>'.$post['text'].'</p>';
                            }
                        }
                    ?>
                </div>
            </div>
        </section>

        <!-- подвал -->
        <?php
            require '../php/footer.php';
        ?>
    </div>
</body>
</html>