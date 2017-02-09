<?php
include 'connection.php';
        if(!isset($_SESSION['id']) || $_SESSION['id'] == " " || !isset($_SESSION['id']) || $_SESSION['id'] == " ")
        {
            echo "<script language='javascript'>";
            echo "window.location='../'";
            echo "</script> ";
            exit;
        }

        $_SESSION['start'] = time(); // taking now logged in time

        if(!isset($_SESSION['expire'])){
            $_SESSION['expire'] = $_SESSION['start'] + (60 * 60) ; // ending a session in 30 seconds
        }
        $now = time(); // checking the time now when home page starts

        if($now > $_SESSION['expire'])
        {
            $day = date("Y-m-d G:i:s a");
            //$add = "UPDATE log SET logout = '" . date('y-m-d H:i:s') . "'where logID = '$logid'";
            //$resultAdd = $conn->query($add);
            session_destroy();
            header('Location: ../');
        }
?>