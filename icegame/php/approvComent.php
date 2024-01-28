<?php
$conn = new mysqli("localhost", "root", "", "gameblog");
$id = $_GET['id'];
$query = "UPDATE coments SET approv='1' WHERE idComents='$id'";
mysqli_query($conn, $query);
$redicet = $_SERVER['HTTP_REFERER'];
header("Location: $redicet");
?>