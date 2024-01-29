<?php
    session_start();
    $_SESSION['auth'] = null;
    $_SESSION['id'] = null;
    $_SESSION['role'] = null;
    $_SESSION['nameUser'] = null;
    header("Location: ../main.php");
?>