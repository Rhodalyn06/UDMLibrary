<?php
    require_once 'connection.php';

    if (!isset($_SESSION['id']) || $_SESSION['id'] == " " || !$_SESSION['id']) {
        echo "<script language='javascript'>";
        echo "window.location='../'";
        echo "</script> ";
        exit;
    }

    if ($_SESSION['type'] != "LIBRARIAN") {
        header('HTTP/1.1 401 Forbidden');
        echo '<h1>Access Denied</h1>';
        echo '<a href="javascript:window.history.go(-1)">Go back</a>';
        exit;
    }

    $_SESSION['start'] = time(); // taking now logged in time

    if (!isset($_SESSION['expire'])) {
        $_SESSION['expire'] = $_SESSION['start'] + (60 * 60) ; // ending a session in 30 seconds
    }

    $now = time(); // checking the time now when home page starts

    if ($now > $_SESSION['expire']) {
        $day = date("Y-m-d G:i:s a");
        session_destroy();
        header('Location: ../');
    }
