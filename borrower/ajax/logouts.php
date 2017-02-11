<?php
    include 'session.php';
    include 'connection.php';
    session_destroy();
    header('Location: ../');
?>
