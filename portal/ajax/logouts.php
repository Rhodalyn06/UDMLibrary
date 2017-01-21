<?php
    include 'session.php';
    include 'connection.php';
    session_destroy();
    $day = date("Y-m-d G:i:s a");
    $add = "UPDATE log SET logout = '" . date('y-m-d H:i:s') . "'where logID = '$logid'";
    $resultAdd = $conn->query($add);
    header('Location: ../');
?>