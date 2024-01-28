<?php
$conn = new mysqli("localhost", "root", "", "gameblog");
$id = $_GET['id'];
$query = "DELETE FROM posts WHERE idPosts='$id'";
mysqli_query($conn, $query);
$redicet = $_SERVER['HTTP_REFERER'];
header("Location: $redicet");
?>